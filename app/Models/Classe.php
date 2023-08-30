<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classe extends Model
{
    use HasFactory;
    protected $guarded = [];

    //1 classe n'appartient pas a plusieurs niveau
    //1 niveau peut avoir plusieurs classe

    public function level():BelongsTo
    {
        return $this->belongsTo(Level::class);
    }
}
