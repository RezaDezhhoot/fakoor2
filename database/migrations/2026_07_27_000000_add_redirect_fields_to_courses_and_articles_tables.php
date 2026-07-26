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
        Schema::table('courses', function (Blueprint $table) {
            $table->boolean('redirect')->default(false)->after('sellable');
            $table->text('redirect_url')->nullable()->after('redirect');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->boolean('redirect')->default(false)->after('driver');
            $table->text('redirect_url')->nullable()->after('redirect');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['redirect', 'redirect_url']);
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['redirect', 'redirect_url']);
        });
    }
};
