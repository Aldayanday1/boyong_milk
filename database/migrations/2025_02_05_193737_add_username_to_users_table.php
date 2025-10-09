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
            $table->string('username')->unique()->nullable()->after('name');
        });

        // Update existing users to have a default username (jika belum ada username)
        DB::statement("UPDATE users SET username = email WHERE username IS NULL");
    }

    /**
     * Reverse the migrations.
     */

    //  php artisan migrate:rollback
    //  Rollback (migrate:rollback) hanya membatalkan perubahan struktur tabel (ex : menghapus column 'username')
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
