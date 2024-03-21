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
        Schema::table('rolepermission', function (Blueprint $table) {
            $table->dropForeign('rolepermission_userrolemapping_mapping_id_foreign');
            $table->dropColumn('mapping_id');
            $table->dropColumn('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rolepermission', function (Blueprint $table) {
            //
        });
    }
};
