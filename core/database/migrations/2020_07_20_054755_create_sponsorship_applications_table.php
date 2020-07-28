<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorshipApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsorship_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sponsor_type_id');
            $table->string('name');
            $table->string('company')->unique();
            $table->string('Email')->unique();
            $table->string('website');
            $table->string('image');
            $table->boolean('status');
            $table->timestamps();


            $table->foreign('sponsor_type_id')->references('id')->on('sponsor_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsorship_applications');
    }
}
