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
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id');
            $table->text('body')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('user_id','body');
        });

                   Schema::connection('sqlite2')->create('users', function(Blueprint $table) {
               $table->id();
               $table->string('name');
               $table->string('username', '100');
               $table->timestamps();
           });
   
    }
};
