<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('preferences', function (Blueprint $table) {
            $table->json('authors')->nullable(); 
        });
    }
    
    public function down()
    {
        Schema::table('preferences', function (Blueprint $table) {
            $table->dropColumn('authors');
        });
    }
};
