<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_technology', function (Blueprint $table) {

            //questa è la relazione con la tabella projects
            $table->unsignedBigInteger('project_id');

            //creo la fk
            $table->foreign('project_id')
                    ->references('id')
                    ->on('projects')
                    //eliminando un project, viene eliminata anche la relazione
                    ->cascadeOnDelete();


            //questa è la relazione con la tabella technologies
            $table->unsignedBigInteger('technology_id');

            //creo la fk
            $table->foreign('technology_id')
                    ->references('id')
                    ->on('technologies')
                    //eliminando un technology, viene eliminata anche la relazione
                    ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_technology');
    }
};
