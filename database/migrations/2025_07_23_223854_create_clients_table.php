<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('clients');
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['psychic', 'customer'])->default('customer');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('profile_picture')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('firebase_uid')->nullable();
            $table->rememberToken();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
