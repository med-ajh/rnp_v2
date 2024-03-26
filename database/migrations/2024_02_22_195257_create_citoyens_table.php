<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitoyensTable extends Migration
{
    public function up()
    {
        Schema::create('citoyens', function (Blueprint $table) {
            $table->id();
            $table->string('email_insc')->unique();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('Cnie')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('age')->nullable();
            $table->string('genre')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('status_de_residence')->nullable();
            $table->string('ne_au_maroc')->nullable();
            $table->foreignId('region_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('province_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('pachalik_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('quartier_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('avenue_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('commune_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('type_dhabitat')->nullable();
            $table->string('n_de_porte')->nullable();
            $table->string('adresse')->nullable();
            $table->integer('code_postal')->nullable();
            $table->string('je_dipose_idcs')->nullable();
            $table->string('telephone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('type_de_tuteur')->nullable();
            $table->string('prenom_du_tuteur')->nullable();
            $table->string('nom_du_tuteur')->nullable();
            $table->integer('ide_digital_civil')->nullable();
            $table->integer('ide_rnp_rid')->nullable();
            $table->date('date_expiration')->nullable();
            $table->string('n_identite')->nullable();
            $table->string('lien_parente')->nullable();
            $table->float('score')->nullable();
            $table->integer('nidcs')->unique()->nullable();
            $table->integer('idcs')->unique()->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('citoyens');
    }
}
