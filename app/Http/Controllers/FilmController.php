<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Movie;
use App\movieGenres;
use Illuminate\Http\Request;
use Response;
use Symfony\Component\HttpKernel\Client;
class FilmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_films=$this->getFilms();
        
        return view('films.index',compact('all_films'));

    }
    public function singleFilm($film_name)
    {

        $all_films=Movie::with('genres:genre_id,movie_id')->where('name',$film_name)->get();
        if(sizeof($all_films)>0){
            return view('films.index',compact('all_films'));

        }else{
            return Response::json('No Film Found');
        }

    }
    public function create(Request $request)
    {

        if(isset($_POST)){
            $new_movie=new Movie();
            $new_movie->name=$_POST['film_name'];
            $new_movie->description=$_POST['film_desc'];
            $new_movie->release_date=$_POST['film_release_date'];
            $new_movie->rating=$_POST['film_rating'];
            $new_movie->country=$_POST['film_country'];
            $new_movie->ticket_price=$_POST['film_ticket_price'];

            //code for uploading image
            $name = $_FILES['film_phot']['name'];
            if(strlen($name)) {
                        $image_name = time().'_'.".".$name;
                        $tmp = $_FILES['film_phot']['tmp_name'];
                        if(move_uploaded_file($tmp, 'uploads/'.$image_name)){

                            $new_movie->photo=$image_name;
                            $new_movie->save();
                            $movie_id=$new_movie->id;
                            $movie_genres=explode(',',$_POST['film_genre']);
                            foreach($movie_genres as $genre){
                                $movie_genre_obj=new movieGenres();
                                $movie_genre_obj->genre_id=$genre;
                                $movie_genre_obj->movie_id=$movie_id;
                                $movie_genre_obj->save();
                            }
                            return Response::json("success");
                        }



            exit;
            //end of code for uploading image
        }

    }
        return Response::json("failed");
    }
    public function getFilms(){
        $all_films=Movie::with('genres:genre_id,movie_id')->paginate(1);
        return $all_films;
    }


    //functions for handling comments
    public function addComments(){

        $new_comment=new Comments();
        $new_comment->movie_id=$_POST['movie_id'];
        $new_comment->name=$_POST['c_name'];
        $new_comment->comment=$_POST['comment'];
        $new_comment->save();
        return redirect()->back();
    }

    //end of comments functions
}
