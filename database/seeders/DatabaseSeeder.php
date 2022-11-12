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

        DB::table('users')->insert([
            'userName'=>'2740933763',
            'name'=>'پدرام',
            'last_name'=>'اخلاقی',
            'email'=>'pedram@gmail.com',
            'password'=>Hash::make('MJamshidi73@')
        ]);

        DB::table('users')->insert([
            'userName'=>'2740933764',
            'name'=>'مرتضی',
            'last_name'=>'ایمانی',
            'email'=>'morteza@gmail.com',
            'password'=>Hash::make('MJamshidi73@')
        ]);

        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'student_login']);
        Permission::create(['name' => 'teacher_login']);

        $admin= Role::create(['name' => 'admin']);
        $teacher=Role::create(['name' => 'teacher']);
        $student=Role::create(['name' => 'student']);

        $admin->givePermissionTo('manage_users');
        $teacher->givePermissionTo('teacher_login');
        $student->givePermissionTo('student_login');

        User::query()->findOrFail(1)->assignRole($admin);
        User::query()->findOrFail(2)->assignRole($teacher);
        User::query()->findOrFail(3)->assignRole($student);

    }
}
