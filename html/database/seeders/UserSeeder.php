<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@citruse.co.za'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('secret')
            ]
        );
        $admin->assignRole('admin');

        $manager = User::firstOrCreate(
            ['email' => 'manager@citruse.co.za'],
            [
                'name' => 'Purchasing Manager',
                'password' => bcrypt('secret')
            ]
        );
        $manager->assignRole('purchasing_manager');

        $sales = User::firstOrCreate(
            ['email' => 'sales@citruse.co.za'],
            [
                'name' => 'Field Sales',
                'password' => bcrypt('secret')
            ]
        );
        $sales->assignRole('field_sales');
    }
}
