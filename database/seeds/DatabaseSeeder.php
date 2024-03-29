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
        //$this->call('SexesTableSeeder');
		//$this->command->info('Sexes table seeded with Female and Male');
        //$this->call('UserStatusesSeeder');
        //$this->command->info('UserStatuses table seeded');
        $this->call('ApplicationsSeeder');
        $this->command->info('tapplications table seeded');
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

class UserStatusesSeeder extends Seeder
{
    /**
     * Run the sexes table seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('user_statuses')->delete();

        App\Models\UserStatus::create(['status' => 'Registration failed', 'active' => '0']);
        App\Models\UserStatus::create(['status' => 'Registration email verification pending', 'active' => '0']);
        App\Models\UserStatus::create(['status' => 'Registration mobile verification pending', 'active' => '0']);
        App\Models\UserStatus::create(['status' => 'Registration confirmation pending', 'active' => '0']);
        App\Models\UserStatus::create(['status' => 'Registration payment pending', 'active' => '0']);
        App\Models\UserStatus::create(['status' => 'Registration active', 'active' => '1']);
        App\Models\UserStatus::create(['status' => 'User account confirmation expired', 'active' => '0']);
        App\Models\UserStatus::create(['status' => 'User account payment expired', 'active' => '0']);
        App\Models\UserStatus::create(['status' => 'Client account confirmation expired', 'active' => '0']);
        App\Models\UserStatus::create(['status' => 'Client account payment expired', 'active' => '0']);
    }
}

class ApplicationsSeeder extends Seeder
{
    /**
     * Run the applications table seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('applications')->delete();

        App\Models\Applications\Application::create(['short_name' => 'AfA', 'long_name' => 'The Aid for AIDS Clinical Guidelines']);
        App\Models\Applications\Application::create(['short_name' => 'SAASP', 'long_name' => 'South African Antibiotic Stewardship Programme']);
        App\Models\Applications\Application::create(['short_name' => 'ENT', 'long_name' => 'ENT Surgery Atlas']);
        App\Models\Applications\Application::create(['short_name' => 'PACK', 'long_name' => 'PACK']);
    }
}