<?php

namespace App\Models;

use App\Models\Student;
use App\Models\SchoolYears;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function school_yeard(): BelongsTo
    {
        return $this->belongsTo(SchoolYears::class);
    }
}
