<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('psychics', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('profile_name')->unique();
            $table->string('email')->unique();
            $table->string('profile_photo')->nullable();
            $table->string('tagline', 50)->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->text('profile_description')->nullable();
            $table->timestamps();
        });

        Schema::create('psychic_app_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psychic_id')->constrained()->onDelete('cascade');
            $table->foreignId('app_link_id')->constrained('app_links')->onDelete('cascade');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('psychic_payment_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psychic_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_link_id')->constrained('payment_links')->onDelete('cascade');
            $table->string('value');
            $table->string('qr_code')->nullable();
            $table->timestamps();
        });

        Schema::create('psychic_social_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psychic_id')->constrained()->onDelete('cascade');
            $table->foreignId('social_media_link_id')->constrained('social_media_links')->onDelete('cascade');
            $table->string('value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('psychic_social_links');
        Schema::dropIfExists('psychic_payment_links');
        Schema::dropIfExists('psychic_app_links');
        Schema::dropIfExists('psychics');
    }
}; 