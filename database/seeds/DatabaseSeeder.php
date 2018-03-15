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
        // $this->call(UsersTableSeeder::class);
         $this->call(CitiesSeeder::class);
         $this->call(ExperienceTypesSeeder::class);
         $this->call(SkillsSeeder::class);
         $this->call(SocialNetworksSeeder::class);
         $this->call(AddProjectToExperienceType::class);

    }
}
