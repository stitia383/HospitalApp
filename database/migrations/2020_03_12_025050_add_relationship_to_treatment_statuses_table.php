<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToTreatmentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treatment_statuses', function (Blueprint $table) {
            $table->integer('id_inpatients')->unsigned()->change();
            $table->foreign('id_inpatients')->references('id')->on('inpatients')
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
        Schema::table('treatment_statuses', function (Blueprint $table) {
            $table->dropForeign('treatment_statuses_id_inpatients_foreign');
            });

            Schema::table('treatment_statuses', function(Blueprint $table) {
                $table->dropIndex('treatment_statuses_id_inpatients_foreign');
            });

            Schema::table('treatment_statuses', function(Blueprint $table) {
                $table->integer('id_inpatients')->change();
            });
    }
}
