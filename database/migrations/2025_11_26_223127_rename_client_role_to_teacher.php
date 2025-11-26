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
        \DB::table('roles')->where('name', 'client')->update([
            'name' => 'teacher',
            'description' => 'Teacher'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::table('roles')->where('name', 'teacher')->update([
            'name' => 'client',
            'description' => 'Student/Client'
        ]);
    }
};
