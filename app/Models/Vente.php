<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;
    protected $fillable=[
        'qteTotal',
        'nomClient',
        'numeroClient',
        'montantTotal',
        'montantVerse',
        'statut',
        'date',
        'impot',
        'auteur'
    ] ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
