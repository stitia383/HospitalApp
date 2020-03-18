<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToNurseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nurses', function (Blueprint $table) {
            $table->integer('id_doctor')->unsigned()->change();
            $table->foreign('id_doctor')->references('id')->on('doctors')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nurses', function (Blueprint $table) {
                $table->dropForeign('nurses_id_doctor_foreign');
            });
    
            Schema::table('nurses', function(Blueprint $table) {
                $table->dropIndex('nurses_id_doctor_foreign');
            });
    
            Schema::table('nurses', function(Blueprint $table) {
                $table->integer('id_doctor')->change();
            });
    }
}
