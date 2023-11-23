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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('create')->default('0')->comment('1 = allow; 0 = reject;');
            $table->tinyInteger('read')->default('0')->comment('1 = allow; 0 = reject;');
            $table->tinyInteger('update')->default('0')->comment('1 = allow; 0 = reject;');
            $table->tinyInteger('delete')->default('0')->comment('1 = allow; 0 = reject;');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
