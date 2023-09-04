<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Classe;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function classe():BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }

    public function level():BelongsTo
    {
        return $this->belongsTo(Level::class);
    }
}
