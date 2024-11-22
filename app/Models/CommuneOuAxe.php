<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommuneOuAxe extends Model
{
    use HasFactory;
    protected $table = 'CommuneOuAxe';
    protected $fillable = ['region', 'departement', 'nom_commune'];

}
