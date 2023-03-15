//UPDATED TO WORK AT NON EXISTING DOM
// March 21, 2016

(function($){
    "use strict";
    $.fn.extend({
        ajaxtab : function (options){
            let opt, url, href, $this, content = {};

            opt = $.extend({
                loader:'<h3 class="text-muted text-center">Please wait. Now loading.....</h3>',
                targetChild:'.tab-pane > .panel-body',
                followHash: false,
                parentElem: ''
            }, options);

            let hashTab = $.trim(window.location.hash);

            //Load first page if hash is not active
            $(opt.targetChild).ready(function() {
                //console.log(!hashTab);
                //console.log(!$.trim($(opt.targetChild).text()));
                //console.log($(opt.targetChild).prop('id'));

                if(!hashTab && !$.trim($(opt.targetChild).text())) {
                    //console.log($(opt.targetChild).prop('id'));
                    $('body').find('[href="#'+ $(opt.targetChild).prop('id') +'"]').trigger('click');
                }
            });

            if(opt.followHash) {
                //Lets check for #url for default page

                //console.log(hashTab);
                if(hashTab) {
                    $(opt.targetChild).ready(function() {
                        $('body').find('[href="'+hashTab+'"]').trigger('click');
                    })
                }
            }

            return this.each(function(){
                $('body').on('click', '[data-bs-toggle="tab"]', function (e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    $this = $(this);

                    href = $this.attr('href'); // We get the hash of the href link

                    if(opt.parentElem) {
                        //Lets update the tab-pane id
                        $this.closest(opt.parentElem)
                            .find('.tab-pane')
                            .prop('id', href.substr(1));
                    } else {
                        //Lets update the tab-pane id
                        $this.closest('.nav-tabs')
                            .next('.tab-content')
                            .find('.tab-pane')
                            .prop('id', href.substr(1));
                    }





                    //Ajax load on
                    $(href + opt.targetChild).html(opt.loader);

                    url = $(this).attr('data-url'); // Get the ajax url on the link

                    if( url === '#' || url === undefined){
                        $(href + opt.targetChild).html('<h1 class="text-center"> DEMO CONTENT IS HERE '+href.substr(1)+'... </h1>');
                        $this.tab('show');
                    }else{
                        let jqxhr = $.get(url, content, function(data, statusText, xhr){

                            $(href + opt.targetChild).html(data);
                            $this.tab('show');

                            if(opt.followHash) {
                                window.location.hash=href;
                            }
                        });

                        jqxhr.fail(function(response){
                            console.log(response);
                        })
                    }

                    return $this;
                });
            });

        }
    });
})(jQuery);
