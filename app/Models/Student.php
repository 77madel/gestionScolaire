<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

     protected $guarded = [];

    // public function iscriptions():HasMany
    // {
    //     return $this->hasMany(Inscription::class);
    // }

    public function payment():HasMany
    {
         return $this->hasMany(Payment::class);
     }

}
