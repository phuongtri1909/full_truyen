<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        // Temporarily change enum to string to modify values
        DB::statement("ALTER TABLE users MODIFY COLUMN role VARCHAR(255)");
        
        // Update enum with new values
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'mod', 'vip', 'user') NOT NULL DEFAULT 'user'");
    }

    public function down()
    {
        // Revert back to original enum values
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'user') NOT NULL DEFAULT 'user'");
    }
};
