<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }
}
