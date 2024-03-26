<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentreInscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('centre_inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('region_id')->constrained();
            $table->foreignId('province_id')->constrained();
            $table->foreignId('pachalik_id')->constrained();
            $table->foreignId('quartier_id')->constrained();
            $table->foreignId('avenue_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('centre_inscriptions');
    }
}
