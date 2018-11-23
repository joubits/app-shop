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
        $this->call(ProductsTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'jou',
            'email' => 'jou@joubits.com',
            'password' => bcrypt('jou'),
            'admin' => true
        ]);

    }
}
