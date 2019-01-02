<?php

use Illuminate\Database\Seeder;

class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app')->insert([
            'name' => 'Amaxila',
            'description' => 'The Ultimate Link Management Platform',
            'disqus' => 'amaxila',
            'ad' => 'Amaxila | The Ultimate Link Management Platform',
        ]);
    }
}
