<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->foreignId('client_id')->constrained('clients');
            $table->string('type_service');
            $table->text('description');
            $table->string('localisation')->nullable();
            $table->decimal('budget', 15, 2)->nullable();
            $table->enum('type', ['devis', 'commande']);
            $table->enum('statut', ['en_attente', 'en_cours', 'termine', 'annule'])->default('en_attente');
            $table->enum('paiement', ['non_paye', 'partiel', 'paye'])->default('non_paye');
            $table->decimal('montant_paye', 15, 2)->default(0);
            $table->text('notes_admin')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('commandes');
    }
};