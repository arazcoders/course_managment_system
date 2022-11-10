<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'userName'=>'2740933762',
            'name'=>'محمد',
            'last_name'=>'جمشیدی',
            'email'=>'arazcoders@gmail.com',
            'password'=>Hash::make('MJamshidi73@')
        ]);

        Permission::create(['name' => 'manage_users']);

        $admin= Role::create(['name' => 'admin']);
        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'student']);

        $admin->givePermissionTo('manage_users');

        User::query()->findOrFail(1)->assignRole($admin);

    }
}
