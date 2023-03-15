<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use UuidTrait, HasFactory;

    protected function has_uuid(): bool
    {
        return true;
    }

    protected $casts = [
        'dob'   =>  'datetime:Y-m-d',
    ];

    protected $guarded = ['id'];

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
