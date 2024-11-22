<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concess extends Model
{
    use HasFactory;
    public function materielLourds()
    {
        return $this->hasMany(Materiel_lourd::class, 'idConcess', 'id');
    }
    
    protected $primaryKey = 'idConcess';
    protected $table = 'concessionaires'; // Nom de la table
    protected $fillable = ['nomConcess', 'image'];

}
