<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'heure',
        'nomClient',
        'numeroClient',
        'type',
        'moi',
        'impot',
        'modePaiement',
        'montantVerse',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
