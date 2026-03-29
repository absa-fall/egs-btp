<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model {
    protected $fillable = [
        'reference', 'client_id', 'type_service', 'description',
        'localisation', 'budget', 'type', 'statut', 'paiement',
        'montant_paye', 'notes_admin'
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function devis() {
        return $this->hasOne(Devis::class);
    }

    public function statutLabel() {
        return match($this->statut) {
            'en_attente' => 'En attente',
            'en_cours'   => 'En cours',
            'termine'    => 'Terminé',
            'annule'     => 'Annulé',
        };
    }

    public function paiementLabel() {
        return match($this->paiement) {
            'non_paye' => 'Non payé',
            'partiel'  => 'Partiel',
            'paye'     => 'Payé',
        };
    }
}