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
        Schema::table('posts_2', function (Blueprint $table) {
            
            $table->unique('username');
            // $table->string('title', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts_2', function (Blueprint $table) {
            
            // $table->renameColumn('tit', 'title');
        });
    }
};
