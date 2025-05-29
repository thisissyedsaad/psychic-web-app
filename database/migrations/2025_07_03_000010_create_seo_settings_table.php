<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();
            $table->string('page')->unique(); // e.g., 'homepage', 'psychic_services', etc.
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seo_settings');
    }
}; 