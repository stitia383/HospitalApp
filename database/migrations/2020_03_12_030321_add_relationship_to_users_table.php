<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id_roles')->unsigned()->change();
            $table->foreign('id_roles')->references('id')->on('roles')
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
        Schema::table('users', function (Blueprint $table) {

                $table->dropForeign('users_id_roles_foreign');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropIndex('users_id_roles_foreign');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->integer('id_roles')->change();
                });
    }
}
