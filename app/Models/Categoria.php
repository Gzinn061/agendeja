<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;

class Categoria extends Model
{
    use HasFactory;

    // Relação com os serviços
    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }
}
