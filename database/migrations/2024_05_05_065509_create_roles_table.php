<?php

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleSeeder;
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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->timestamps();
        });

        $seeder = new RoleSeeder();
        $seeder->run();

         // Create default admin user
        User::insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password@123'),
            'role_id' => Role::where('role', 'ADMIN')->first()->id ?? User::ADMIN, // Assuming 'admin' role has id = 1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        User::where('email', 'admin@example.com')->delete();
        Schema::dropIfExists('roles');
    }
};
