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
            'admin' => rand(0, 1)
        ]);

        DB::table('users')->insert([
            'name' => 'Junior',
            'email' => 'junior@gmail.com',
            'password' => bcrypt('junior'),
            'admin' => rand(0, 1)
        ]);
    }
}
