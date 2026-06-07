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
            $table->string('role')->default('admin')->after('id');
            $table->string('username')->unique()->nullable()->after('name');
            $table->string('gender')->nullable()->after('username');
            $table->date('birthdate')->nullable()->after('gender');
            $table->string('phone')->nullable()->after('birthdate');
            $table->boolean('is_active')->default(true)->after('password');
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'username', 'gender', 'birthdate', 'phone', 'is_active']);
            $table->string('email')->nullable(false)->change();
        });
    }
};
