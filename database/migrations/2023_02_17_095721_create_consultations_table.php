<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(\App\Models\Patient::class);
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->string('bmi')->nullable();
            $table->decimal('temperature',5,2)->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('pulse_rate')->nullable();
            $table->string('oxygen_saturation')->nullable();
            $table->integer('pain_score')->nullable();
            $table->text('complaints_history')->nullable();
            $table->text('review_of_systems')->nullable();
            $table->text('medical_and_surgical_history')->nullable();
            $table->text('drug_and_allergy_history')->nullable();
            $table->text('obstetrics_and_gynecological_history')->nullable();
            $table->text('developmental_history')->nullable();
            $table->text('immunization_history')->nullable();
            $table->text('nutritional_history')->nullable();
            $table->text('family_and_social_history')->nullable();
            $table->string('spirituality')->nullable();
            $table->text('general_physical_examination');
            $table->text('central_nervous_system_examination')->nullable();
            $table->text('cardiovascular_system_examination')->nullable();
            $table->text('respiratory_system_examination')->nullable();
            $table->text('digestive_system_examination')->nullable();
            $table->text('ear_nose_and_throat_examination')->nullable();
            $table->text('musculoskeletal_system_examination')->nullable();
            $table->text('skin_examination')->nullable();
            $table->text('findings');
            $table->text('provisional_diagnosis');
            $table->text('treatment_plan');
            $table->date('follow_up_appointment')->nullable();
            $table->text('comment')->nullable();
            $table->text('others')->nullable();
            $table->decimal('cost_of_consultation',10,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
};
