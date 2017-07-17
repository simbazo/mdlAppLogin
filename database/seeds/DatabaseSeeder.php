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
        $this->call('SexesTableSeeder');
		$this->command->info('Sexes table seeded with Female and Male');

    }
}

class SexesTableSeeder extends Seeder
{
    /**
     * Run the sexes table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexes')->delete();

        App\Models\Sex::create(['sex' => 'Female']);
        App\Models\Sex::create(['sex' => 'Male']);
    }
}
