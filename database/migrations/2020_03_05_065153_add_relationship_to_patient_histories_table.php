<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToPatientHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_histories', function (Blueprint $table) {
            $table->integer('id_patient')->unsigned()->change();
            $table->foreign('id_patient')->references('id')->on('patients')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_doctor')->unsigned()->change();
            $table->foreign('id_doctor')->references('id')->on('doctors')
            ->onUpdate('cascade')->onDelete('cascade');

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
                $table->dropForeign('patient_histories_id_patient_foreign');
            });
    
            Schema::table('patient_histories', function (Blueprint $table){
                $table->dropIndex('patient_histories_id_patient_foreign');
            });
    
            Schema::table('patient_histories', function (Blueprint $table){
                $table->integer('id_patient')->change();
            });
    
            Schema::table('patient_histories', function (Blueprint $table) {
                $table->dropForeign('patient_histories_id_doctor_foreign');
            });
    
            Schema::table('patient_histories', function (Blueprint $table){
                $table->dropIndex('patient_histories_id_doctor_foreign');
            });
    
            Schema::table('patient_histories', function (Blueprint $table){
                $table->integer('id_doctor')->change();
            });
    
            Schema::table('patient_histories', function (Blueprint $table) {
                $table->dropForeign('patient_histories_id_treatment_statues_foreign');
            });
    
            Schema::table('patient_histories', function (Blueprint $table){
                $table->dropIndex('patient_histories_id_treatment_statues_foreign');
            });
    
            Schema::table('patient_histories', function (Blueprint $table){
                $table->integer('id_treatment_statues')->change();
            });
    }
}
