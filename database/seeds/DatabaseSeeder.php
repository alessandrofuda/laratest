<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;  //aggiunto manualmente

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        // $this->call(PostTableSeeder::class);

        //modo Laravel official site (utilizza helper "factory")

        //factory(\App\User::class, 50)->create()->each(function($u) {
        //	$u->post()->save(factory(\App\Post::class)->make());
        //});

        
        /*
        $authors = factory(App\Author::class, 5)->create();

        $authors->each(function ($author) {
            $author
                ->profile()
                ->save(factory(App\Profile::class)->make());
                
            $author
                ->posts()
                ->saveMany(
                    factory(App\Post::class, rand(20,30))->make()
                );
        });
        */




        $this->call(ArticlesTableSeeder::class);
        $this->call(UsersTableSeeder::class);


    }
}
