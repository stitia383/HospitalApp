<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_histories', function(Blueprint $table){
            $table->integer('id_inpatients')->unsigned()->change();
            $table->foreign('id_inpatients')->references('id')->on('inpatients')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('inpatients', function(Blueprint $table){
            $table->integer('id_treatment_statues')->unsigned()->change();
            $table->foreign('id_treatment_statues')->references('id')->on('treatment_statuses')
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
        Schema::table('patient_histories', function (Blueprint $table) {
            $table->dropForeign('patient_histories_id_inpatients_foreign');
        });

        Schema::table('patient_histories', function (Blueprint $table){
            $table->dropIndex('patient_histories_id_inpatients_foreign');
        });

        Schema::table('patient_histories', function (Blueprint $table){
            $table->integer('id_inpatients')->change();
        });

        Schema::table('inpatients', function (Blueprint $table) {
            $table->dropForeign('inpatients_id_treatment_statues_foreign');
        });

        Schema::table('inpatients', function (Blueprint $table){
            $table->dropIndex('inpatients_id_treatment_statues_foreign');
        });

        Schema::table('inpatients', function (Blueprint $table){
            $table->integer('id_treatment_statues')->change();
        });
    }
}
