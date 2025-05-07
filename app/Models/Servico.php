<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Servico extends Model
{
    use HasFactory;

    protected  $fillable = ["nome", "description", "preco", "categoria_id"];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
