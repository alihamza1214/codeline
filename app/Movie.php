<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
class Movie extends Model
{
    protected $table = 'movies';
    public function genres()
    {
        return $this->hasMany('App\movieGenres','movie_id','id');
    }
    public function getComments()
    {
        return $this->hasMany('App\Comments','movie_id','id');
    }
    public function genreDetail($genre_id)
    {
        $data=Genres::select('genre')->where('genre_id',$genre_id)->first();
        if($data){
            return $data->genre;
        }

    }
}
