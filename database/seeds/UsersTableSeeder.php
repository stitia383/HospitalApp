<?php

use Illuminate\Database\Seeder;
 use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'stitia',
            'email' => 'stitia@gmail.com',
            'id_roles' => '1',
            'password' => bcrypt('stitia'),
            'status' => true
            ]);
        
            User::create([
                'name' => 'amanda',
                'email' => 'amanda@gmail.com',
                'id_roles' => '2',
                'password' => bcrypt('amanda'),
                'status' => true
                ]);

                User::create([
                    'name' => 'ranti',
                    'email' => 'ranti@gmail.com',
                    'id_roles' => '3',
                    'password' => bcrypt('ranti'),
                    'status' => true
                    ]);
        
    

    }
}
