<?php

use App\SocialNetwork;
use Illuminate\Database\Seeder;

class SocialNetworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socialNetworks = ['facebook','twitter','dribbble','linkedin','github'];

        for ($i=0;$i<count($socialNetworks);$i++){
            $socialNetwork = new SocialNetwork();
            $socialNetwork->name = $socialNetworks[$i];
            $socialNetwork->save();
        }
    }
}
