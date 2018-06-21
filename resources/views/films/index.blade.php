<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Films Web APP</title>

        <!-- Fonts -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                margin: 0;
            }

            .full-height {
                height: 10vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .rating {
                float:left;
            }

            /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t
               follow these rules. Every browser that supports :checked also supports :not(), so
               it doesn’t make the test unnecessarily selective */
            .rating:not(:checked) > input {
                position:absolute;
                top:-9999px;
                clip:rect(0,0,0,0);
            }

            .rating:not(:checked) > label {
                float:right;
                width:1em;
                padding:0 .1em;
                overflow:hidden;
                white-space:nowrap;
                cursor:pointer;
                font-size:200%;
                line-height:1.2;
                color:#ddd;
                text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
            }

            .rating:not(:checked) > label:before {
                content: '★ ';
            }

            .rating > input:checked ~ label {
                color: #f70;
                text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
            }

            .rating:not(:checked) > label:hover,
            .rating:not(:checked) > label:hover ~ label {
                color: gold;
                text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
            }

            .rating > input:checked + label:hover,
            .rating > input:checked + label:hover ~ label,
            .rating > input:checked ~ label:hover,
            .rating > input:checked ~ label:hover ~ label,
            .rating > label:hover ~ input:checked ~ label {
                color: #ea0;
                text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
            }

            .rating > label:active {
                position:relative;
                top:2px;
                left:2px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ url('/logout') }}">Logout</a>

                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif


        </div>
        <div class="row">
            <div class="content">
                @foreach($all_films as $film)
                    <div class="content">



                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-6">
                                    <a href="/film/{{$film->name}}" style="float: left">{{$film->name}}</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-6">
                                    <input class="form-control" value="{{$film->description}}" type="text" name="film_description" id="film_description" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Release Date</label>
                                <div class="col-sm-6">
                                    <input class="form-control" value="{{$film->release_date}}" type="date" name="film_release_data" id="film_release_data" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Rating</label>
                                <div class="col-sm-6">
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="rating" value="5" @if($film->rating==5)checked @endif/><label for="star5" >5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" @if($film->rating==4)checked @endif/><label for="star4" >4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" @if($film->rating==3)checked @endif/><label for="star3" >3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" @if($film->rating==2)checked @endif/><label for="star2" >2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" @if($film->rating==1)checked @endif/><label for="star1" >1 star</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Ticket Price</label>
                                <div class="col-sm-6">
                                    <input class="form-control" value="{{$film->ticket_price}}" type="text" name="film_ticket_price" id="film_ticket_price" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-6">
                                    <input class="form-control" value="{{$film->country}}" type="text" name="film_country" id="film_country" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Genre</label>
                                <div class="col-sm-6">
                                    <select class="form-control film_genre"  name="film_genre" id="film_genre" required="true" multiple required>
                                       @foreach($film->genres as $genre)
                                        <option value="{{$genre->genre_id}}" selected>{{$film->genreDetail($genre->genre_id)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-6">
                                    <img src="/uploads/{{$film->photo}}" class="img img-responsive"/>

                                </div>
                            </div>

                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Comments</label>
                            <div class="col-sm-6">
                              @foreach($film->getComments as $comment)
                                    <li> {{$comment->comment}}
                                        <p>By: ({{$comment->name}})</p>
                                    </li>


                              @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Add Comment</label>
                            <div class="col-sm-6">
                                @auth
                                    <form action="/comments/create" method="post">
                                        <input  type="hidden" name="movie_id" value="{{$film->id}}">

                                        <div class="form-group row">
                                            <label  class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" type="text" name="c_name" id="c_name" required >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label  class="col-sm-2 col-form-label">Comment</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" name="comment" id="comment" required ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <input type="hidden"  id="_token" name="_token" value="{{csrf_token()}}" />
                                                <input type="submit" class="btn btn-sm btn-primary" id="comment_add" value="Post" />
                                            </div>
                                        </div>
                                    </form>

                                @else
                                    Login to comment!
                                @endauth
                            </div>
                        </div>



                    </div>

                @endforeach
                @if($all_films instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div id="pagination">
                    {{$all_films->links()}}
                </div>
                @endif
            </div>
        </div>
    </body>
</html>

<script>
    $(document).ready(function () {
        $('#film_genre').select2();
    });
</script>