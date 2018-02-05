<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'id'            => '1',
            'name'          => 'Víctor Castillo',
            'username'      => 'viktorfkr',
            'email'         => 'viktorfkr@gmail.com>',
            'password'      => bcrypt('123456'),
            'rol'           => 1,
            'path'          => 'viktorfkr.jpg',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);
    }
}
