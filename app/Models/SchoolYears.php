<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolYears extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
