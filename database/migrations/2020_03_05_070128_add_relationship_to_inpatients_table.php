<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToInpatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inpatients', function (Blueprint $table) {
            $table->integer('id_nurse')->unsigned()->change();
            $table->foreign('id_nurse')->references('id')->on('nurses')
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
        Schema::table('inpatients', function (Blueprint $table) {
                $table->dropForeign('inpatients_id_nurse_foreign');
            });
    
            Schema::table('inpatients', function (Blueprint $table){
                $table->dropIndex('inpatients_id_nurse_foreign');
            });
    
            Schema::table('inpatients', function (Blueprint $table){
                $table->integer('id_nurse')->change();
            });
    }
}
