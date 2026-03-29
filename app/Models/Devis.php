<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model {
    protected $fillable = [
        'commande_id', 'montant_estime', 'details',
        'date_debut_prevue', 'date_fin_prevue', 'statut'
    ];

    public function commande() {
        return $this->belongsTo(Commande::class);
    }
}