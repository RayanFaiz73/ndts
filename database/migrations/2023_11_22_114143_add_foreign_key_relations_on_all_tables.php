<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            $table
                ->bigInteger('state_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade');
        });
        Schema::table('states', function (Blueprint $table) {
            $table
                ->bigInteger('country_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table
                ->unsignedBigInteger('created_by')
                ->nullable()
                ->unsigned();
            $table
                ->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table
                ->bigInteger('role_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table
                ->bigInteger('parent_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('parent_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table
                ->bigInteger('country_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
            $table
                ->bigInteger('state_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade');
            $table
                ->bigInteger('city_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
        });
        Schema::table('patients', function (Blueprint $table) {
            $table
                ->bigInteger('hospital_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('hospital_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table
                ->bigInteger('staff_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('staff_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table
                ->bigInteger('diagnoses_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('diagnoses_id')
                ->references('id')
                ->on('diagnoses')
                ->onDelete('cascade');
        });
        Schema::table('menus', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_id')->nullable();
            $table
                ->foreign('menu_id')
                ->references('id')
                ->on('menus');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_id')->unsigned();
            $table
                ->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');
            $table->unsignedBigInteger('role_id')->unsigned();
            $table
                ->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
