<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;
    protected $fillable  = ['enquete_id', 'titulo', 'posicao', 'votos'];

    public function enquete()
    {
        return $this->belongsTo(Enquete::class);
    }

}
