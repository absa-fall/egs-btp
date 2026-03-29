<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index() {
        $stats = [
            'total'      => Commande::count(),
            'en_attente' => Commande::where('statut', 'en_attente')->count(),
            'en_cours'   => Commande::where('statut', 'en_cours')->count(),
            'termines'   => Commande::where('statut', 'termine')->count(),
        ];
        $recentes = Commande::with('client')->latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentes'));
    }

    public function commandes() {
        $commandes = Commande::with('client')->latest()->paginate(15);
        return view('admin.commandes', compact('commandes'));
    }

    public function show($id) {
        $commande = Commande::with('client', 'devis')->findOrFail($id);
        return view('admin.commande-detail', compact('commande'));
    }

    public function updateStatut(Request $request, $id) {
        $commande = Commande::findOrFail($id);
        $commande->update([
            'statut'      => $request->statut ?? $commande->statut,
            'paiement'    => $request->paiement ?? $commande->paiement,
            'notes_admin' => $request->notes_admin ?? $commande->notes_admin,
        ]);
        return back()->with('success', 'Commande mise à jour.');
    }
}