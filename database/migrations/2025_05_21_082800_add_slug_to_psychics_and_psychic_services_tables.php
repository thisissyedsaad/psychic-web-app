<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('psychics', function (Blueprint $table) {
            $table->string('slug')->after('profile_name')->nullable()->unique();
        });
        Schema::table('psychic_services', function (Blueprint $table) {
            $table->string('slug')->after('service')->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('psychics', function (Blueprint $table) {
            if (Schema::hasColumn('psychics', 'slug')) {
                $table->dropColumn('slug');
            }
        });

        Schema::table('psychic_services', function (Blueprint $table) {
            if (Schema::hasColumn('psychic_services', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};
