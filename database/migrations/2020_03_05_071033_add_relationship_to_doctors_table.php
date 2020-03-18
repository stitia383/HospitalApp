<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->integer('id_doctor_type')->unsigned()->change();
            $table->foreign('id_doctor_type')->references('id')->on('doctor_types')
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
        Schema::table('doctors', function (Blueprint $table) {
                $table->dropForeign('doctors_id_doctor_type_foreign');
            });
    
            Schema::table('doctors', function (Blueprint $table) {
                $table->dropIndex('doctors_id_doctor_type_foreign');
            });
    
            Schema::table('doctors', function (Blueprint $table) {
                $table->integer('id_doctor_type');
            });
    }
}
