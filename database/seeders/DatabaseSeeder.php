<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;
use Termwind\Components\Li;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(5)->create();

         //Listing::factory(6)->create();

         Listing::create([
             'title'=>'Laravel Senior Developer',
             'tag'=>'laravel , javascript',
             'company'=>'ACME CROP',
             'location'=>'Boston,MA',
             'email'=>'email@email.com',
             'website'=> 'https://www.example1.com',
             'description'=>'mnjhrpfjbipjibhteibgvre'
         ]);
         Listing::create([
             'title'=>'Laravel junior Developer',
             'tag'=>'laravel , php',
             'company'=>'ACME CROP',
             'location'=>'Boston,MA',
             'email'=>'email@example.com',
             'website'=> 'https://www.example2.com',
             'description'=>'mnjhrpfjbipjibhteibgvre'
         ]);


    }
}
