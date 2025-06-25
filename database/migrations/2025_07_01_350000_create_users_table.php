<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('nom_jeune_fille')->nullable();
            $table->string('matricule')->nullable();
            $table->string('photo')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('telephone')->nullable();
            $table->date('date_naiss')->nullable();
            $table->string('lieu_naiss')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('situation_matrimoniale')->nullable();
            $table->string('adresse')->nullable();
            $table->string('domicile')->nullable();
            $table->string('num_rccm')->nullable();
            $table->string('lieu_exercice')->nullable();
            $table->string('responsabilite')->nullable();

            $table->string('statut')->nullable();
            $table->string('file')->nullable();

            $table->foreignId('role_id')->nullable()->constrained('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('section_id')->nullable()->constrained('sections')->onDelete()->onUpdate('cascade');
            $table->foreignId('region_ordinal_id')->nullable()->constrained('region_ordinals')->onDelete()->onUpdate('cascade');
            $table->foreignId('region_id')->nullable()->constrained('regions')->onDelete()->onUpdate('cascade');
            $table->foreignId('ville_id')->nullable()->constrained('villes')->onDelete()->onUpdate('cascade');
            $table->foreignId('diplome_id')->nullable()->constrained('diplomes')->onDelete()->onUpdate('cascade');
            $table->foreignId('autre_diplome_id')->nullable()->constrained('autre_diplomes')->onDelete()->onUpdate('cascade');
            $table->foreignId('fonction_id')->nullable()->constrained('fonctions')->onDelete()->onUpdate('cascade');

            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
