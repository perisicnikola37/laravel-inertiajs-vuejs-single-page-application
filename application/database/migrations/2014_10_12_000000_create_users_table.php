<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->text('description')->nullable();
            $table->string('avatar', 255)->default('placeholder');
            $table->string('password', 255);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->foreignId('role_id')->default(2);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
