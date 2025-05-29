<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sitemaps', function (Blueprint $table) {
            $table->id();
            $table->string('home_frequency');
            $table->decimal('home_priority', 2, 1);
            $table->string('static_frequency');
            $table->decimal('static_priority', 2, 1);
            $table->json('engines')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sitemaps');
    }
}; 