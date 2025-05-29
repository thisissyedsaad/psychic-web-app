<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('domain');
            $table->string('logo')->nullable();
            $table->boolean('maintenance_mode')->default(false);
            $table->text('maintenance_message')->nullable();
            $table->boolean('registration_disabled')->default(false);
            $table->text('registration_message')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sites');
    }
}; 