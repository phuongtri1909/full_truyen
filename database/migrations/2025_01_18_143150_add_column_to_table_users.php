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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('ban_login')->default(false);
            $table->boolean('ban_comment')->default(false);
            $table->boolean('ban_rate')->default(false);
            $table->boolean('ban_read')->default(false);
            $table->string('ip_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ban_login');
            $table->dropColumn('ban_comment');
            $table->dropColumn('ban_rate');
            $table->dropColumn('ban_read');
            $table->dropColumn('ip_address');
        });
    }
};
