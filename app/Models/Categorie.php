<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'libelle',
    ];

    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }

}
