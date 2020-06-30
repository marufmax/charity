<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('causes_id');
            $table->integer('amount');
            $table->unsignedBigInteger('donated_by')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->enum('type', ['money', 'physical_equipments']);

            $table->foreign('donated_by')
                ->references('id')
                ->on('users');
            $table->foreign('causes_id')
                ->references('id')
                ->on('causes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('causes_donations');
    }
}
