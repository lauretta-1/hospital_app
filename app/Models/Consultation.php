<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use UuidTrait, HasFactory;

    protected function has_uuid(): bool
    {
        return true;
    }

    protected $guarded = ['id'];

    public function Patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
