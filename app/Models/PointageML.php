<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PointageML extends Model
{

    use SoftDeletes;

    // Ajoutez cette propriété  pour indiquer la colonne utilisée :
    protected $dates = ['deleted_at'];

    use HasFactory;

    // Déclaration de la relation vers le modèle MaterielLourd
    public function materielLourd()
    {
        return $this->belongsTo(Materiel_lourd::class, 'idML','idML'); // 'idML' correspond à la clé étrangère
    }

    // Déclaration de la relation vers le modèle CommuneOuAxe
    public function communeOuAxe()
    {
        return $this->belongsTo(CommuneOuAxe::class, 'idCommune'); // 'idCommune' correspond à la clé étrangère
    }

    

    protected $table = 'pointageML';
    protected $fillable = ['Date', 'Fonctionnel', 'Rotation','idCommune', 'idML'];

    // Définissez la clé primaire de la table
    protected $primaryKey = 'idPointage';

}
