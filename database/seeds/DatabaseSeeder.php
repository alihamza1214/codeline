<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('MoviesTableSeeder');
        $this->command->info('Movies table seeded!');

        $this->call('GenresTableSeeder');
        $this->command->info('Genres table seeded!');

        $this->call('moviesgenresTableSeeder');
        $this->command->info('Movies_Genres table seeded!');
        $this->call('commentsTableSeeder');
        $this->command->info('Comments table seeded!');
    }
}
class MoviesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('movies')->delete();

        \App\Movie::create(['name' => 'Harry Potter','description'=>'Magical Movie','ticket_price'=>'500',
            'rating'=>'4','country'=>'United Kingdom','release_date'=>'2001-11-04','photo'=>'harry.jpg']);
        \App\Movie::create(['name' => 'Tomb Raider','description'=>'Fantastic Movie','ticket_price'=>'500',
                'rating'=>'5','country'=>'Germany','release_date'=>'2018-03-07','photo'=>'tomb.jpg']);
        \App\Movie::create(['name' => 'The Founder','description'=>'Real world story','ticket_price'=>'500',
            'rating'=>'3','country'=>'America','release_date'=>'2016-03-07','photo'=>'founder.jpg']);
    }

}
class GenresTableSeeder extends Seeder {

    public function run()
    {
        DB::table('genres')->delete();

        \App\Genres::create(array('genre' => 'Mystery'));
        \App\Genres::create(array('genre'=>'Thriller'));
        \App\Genres::create(array('genre'=>'Fantasy Fiction'));
        \App\Genres::create(array('genre'=>'History'));
    }

}
class moviesgenresTableSeeder extends Seeder {

    public function run()
    {
        DB::table('movies_genres')->delete();

        \App\movieGenres::create(array('genre_id' => '1','movie_id'=>1));
        \App\movieGenres::create(array('genre_id' => '2','movie_id'=>1));
        \App\movieGenres::create(array('genre_id' => '1','movie_id'=>2));
        \App\movieGenres::create(array('genre_id' => '2','movie_id'=>2));
        \App\movieGenres::create(array('genre_id' => '3','movie_id'=>3));
    }

}
class commentsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('comments')->delete();

        \App\Comments::create(array('movie_id' => '1','name'=>'Codeline','comment'=>'Fantastic Movie!'));
        \App\Comments::create(array('movie_id' => '2','name'=>'Ali Hamza','comment'=>'Ending is not good!'));
        \App\Comments::create(array('movie_id' => '3','name'=>'Viran','comment'=>'True Story!'));
    }

}