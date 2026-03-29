<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Commande;

class CommandeController extends Controller {

    public function index() {
        return view('commande');
    }

    public function store(Request $request) {
        $request->validate([
            'nom'          => 'required',
            'prenom'       => 'required',
            'telephone'    => 'required',
            'type_service' => 'required',
            'description'  => 'required',
            'type'         => 'required|in:devis,commande',
        ]);

        $client = Client::create([
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'telephone' => $request->telephone,
            'email'     => $request->email,
            'ville'     => $request->ville,
        ]);

        $reference = 'EGS-' . strtoupper(uniqid());

        $commande = Commande::create([
            'reference'    => $reference,
            'client_id'    => $client->id,
            'type_service' => $request->type_service,
            'description'  => $request->description,
            'localisation' => $request->localisation,
            'budget'       => $request->budget,
            'type'         => $request->type,
            'statut'       => 'en_attente',
            'paiement'     => 'non_paye',
        ]);

        return redirect()->route('commande.confirmation', $reference);
    }

    public function confirmation($ref) {
        $commande = Commande::where('reference', $ref)->with('client')->firstOrFail();
        return view('confirmation', compact('commande'));
    }

    public function suivi() {
        return view('suivi');
    }

    public function rechercher(Request $request) {
        $request->validate(['reference' => 'required']);
        $commande = Commande::where('reference', $request->reference)
                            ->with('client', 'devis')->first();
        return view('suivi', compact('commande'));
    }
}