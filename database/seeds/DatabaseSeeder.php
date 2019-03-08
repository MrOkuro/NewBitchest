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
        $this->call(CotationsTableSeeder::class);
        $this->call(CryptosTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'admin' => '1',
            'ville' => 'PARIS', 
            'adresse' =>'Rue de l\'administration', 
            'code_postal' => '75000'
        ]);

        DB::table('users')->insert([
            'name' => 'Junior',
            'email' => 'junior@gmail.com',
            'password' => bcrypt('junior'),
            'admin' => '0',
            'ville' => 'TOULOUSE', 
            'adresse' =>'Rue du Capitole', 
            'code_postal' => '31000'
        ]);

        DB::table('users')->insert([
            'name' => 'ごく',
            'email' => 'goku@gmail.com',
            'password' => bcrypt('goku'),
            'admin' =>'0',
            'ville' => 'Rouen', 
            'adresse' =>'Rue du Rond Point des Vaches', 
            'code_postal' => '76000'
        ]);
    }
}
