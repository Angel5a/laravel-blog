<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Admin',
            'email' => 'root@localhost.localdomain',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'admin',
            'info' => 'This is admin almighty',
        ]);
        App\User::create([
            'name' => 'Moderator',
            'email' => 'sudo@localhost.localdomain',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'moderator',
            'info' => 'This is moderator',
        ]);
        App\User::create([
            'name' => 'User',
            'email' => 'user@localhost.localdomain',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'Usual user',
        ]);
        App\User::create([
            'name' => 'Banned User',
            'email' => 'banned@localhost.localdomain',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'banned',
            'info' => 'This user is banned',
        ]);
        factory(App\User::class, 20)->create();
    }
}
