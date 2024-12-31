<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materiel_lourd extends Model
{
    use HasFactory;
    // // Déclaration de la relation vers le modèle concess
    public function concessionnaire()
{
    return $this->belongsTo(Concess::class, 'idConcess', );
}


    
    protected $primaryKey = 'idML';
    // Spécifier le nom de la table si différent de la convention par défaut
    protected $table = 'materiel_lourd';
    protected $fillable = ['matricule', 'typeml', 'capacite','idConcess'];
}
