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
        Schema::create('rolepermission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mapping_id');
            $table->foreign('mapping_id')->references('id')->on('userrolemapping');
            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('permission');
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
        Schema::dropIfExists('rolepermission');
    }
};
