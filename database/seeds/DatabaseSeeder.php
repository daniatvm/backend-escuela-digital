<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function access()
    {
        DB::table('access_type')->insert([
            'id_access_type'=> 1,
            'name' => "Administrador"
        ]);
        DB::table('access_type')->insert([
            'id_access_type'=> 2,
            'name' => "Profesor"       
        ]);
        DB::table('access_type')->insert([
            'id_access_type'=> 3,
            'name' => "Supervisor"
        ]);
        DB::table('access_type')->insert([
            'id_access_type'=> 4,
            'name' => "Supervi_Prof"
        ]);
        DB::table('access_type')->insert([
            'id_access_type'=> 5,
            'name' => "Sin acceso"
        ]);    
    }
    
    public function adminDefault()
    {
        DB::table('user')->insert([
            'id_access_type'=> 1,
            'username' => "admin",
            'password' => password_hash("admin",PASSWORD_DEFAULT),
            'status' => 1
        ]);
    }

    public function school(){
        DB::table('school')->insert([
            'id_school' => 1,
            "name" => "Repuplica Dominicana",
            "description" => ".",
            "address" => ".",
            "image" => "https://www.bellinghames.org/ourpages/auto/2018/9/6/63182583/school.jpg",
            "email" => "escuela@escuela.com",
            "telephone" => "88884444",
            "lat" => 9.9112463,
            "lng" => -84.0569227
        ]);
    }

    public function run()
    {
        $this->access();
        $this->school();
        $this->adminDefault();
    }
}
