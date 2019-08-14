<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call('principalSeeder');
        $this->call('seederJubilaciones');
    }
}

class principalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
        $roles = array(
            'Administrador', 
            'Básico'
        );

        foreach($roles as $r){
            DB::table('roles')->insert([
            'opcion' => $r,
            ]);    
        }
        $users = array(

            array('1', 'srarteaga', '1')
        );

        foreach($users as $r){
            DB::table('users')->insert([
            'id' => $r[0],
            'user' => $r[1],
            'rol' => $r[2],
            ]);    
        }
    }
}
