<?php

use Illuminate\Database\Seeder;
use App\ExperienceType;

class ExperienceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expetrienceTypes = ['Education','Work'];



        foreach ($expetrienceTypes as $type){
            $expetrienceType = new ExperienceType();
            $expetrienceType->name = $type;
            $expetrienceType->save();
        }
    }
}
