<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('psychics', function (Blueprint $table) {
            $table->string('meta_title')->nullable()->after('profile_description');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('meta_keywords')->nullable()->after('meta_description');
            $table->string('website')->nullable()->after('tagline');
        });
    }
    public function down()
    {
        Schema::table('psychics', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_description', 'meta_keywords', 'website']);
        });
    }
}; 