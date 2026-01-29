<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    use HasFactory;

    protected $table = 'startups';

    protected $fillable = [
        'nome',
        'setor',
        'email_contato',
        'data_cadastro',
    ];

    public $timestamps = false;
}
