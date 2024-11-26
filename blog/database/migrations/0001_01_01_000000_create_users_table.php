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
            $table->id(); // Création de la clé primaire 'id' auto-incrémentée
            $table->string('name');// Champ 'name', type string, pour le nom de l'utilisateur
            $table->string('email')->unique();// Champ 'email', type string, avec contrainte d'unicité
            $table->timestamp('email_verified_at')->nullable();// Champ 'email_verified_at', type timestamp, pour la vérification de l'email, nullable
            $table->string('password');// Champ 'password', type string, pour stocker le mot de passe
            $table->rememberToken();// Champ 'remember_token', utilisé pour le système de "remember me" lors de la connexion
            $table->timestamps();// Champs 'created_at' et 'updated_at', de type timestamp, qui sont gérés automatiquement par Eloquent
            $table->boolean('admin')->default(false);
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // 'email' comme clé primaire
            $table->string('token'); // Champ 'token' pour stocker le token de réinitialisation
            $table->timestamp('created_at')->nullable(); // Champ 'created_at' de type timestamp, nullable, pour indiquer la date de création du token
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Champ 'id' comme clé primaire
            $table->foreignId('user_id')->nullable()->index(); // Champ 'user_id' qui est une clé étrangère vers la table 'users'
            $table->string('ip_address', 45)->nullable(); // Champ 'ip_address' pour stocker l'adresse IP de l'utilisateur
            $table->text('user_agent')->nullable(); // Champ 'user_agent' pour stocker les informations sur le navigateur de l'utilisateur
            $table->longText('payload'); // Champ 'payload' pour stocker des données supplémentaires relatives à la session
            $table->integer('last_activity')->index(); // Champ 'last_activity' pour stocker le dernier moment d'activité de la session
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
