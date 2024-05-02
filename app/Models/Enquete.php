<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    use HasFactory;
    protected $fillable  = ['titulo', 'dtInicio', 'dtFim', 'totalvotos'];

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }

}
