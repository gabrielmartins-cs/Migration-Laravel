<?php

namespace App\Models; 


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Adicione esta linha abaixo para permitir o cadastro desses campos:
    protected $fillable = ['nome', 'descricao']; 
    
}