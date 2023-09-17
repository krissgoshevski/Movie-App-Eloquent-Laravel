<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Type;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Image;
use App\Http\Requests\MovieRequest;



class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all(); // Ги зема сите филмови
       

        return view('movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // kako ovie varijabli se pisuvaat taka treba da se pratat i vo compact 
        $ratings = Rating::all();
        $types = Type::all();
        $actors = Actor::all();
        $directors = Director::all();
        $genres = Genre::all();


        return view('movie.create', compact('ratings', 'types', 'actors', 'directors', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
    {
        //
    //    echo "<pre>";
    //    print_r($request->all());

        $movie = new Movie;

        $movie->title = $request->title;
        $movie->start_date = $request->start_date;
        $movie->end_date = $request->end_date;
        $movie->length = $request->length;
        $movie->year = $request->year;
        $movie->description = $request->description;
        $movie->rating_id = $request->rating_id;
        $movie->type_id = $request->type_id;

        $movie->save();

        // nizata so ja dobivame odnosno preku HTTP requestot odnosno koi ke gi stiklirame od aktorite tie ke ni bidat ovde vo $asctor 
        // attaciraj ni go toa id 
        foreach($request->actors as $actor)
        {
            // actors ni e vrska koja ja imame vo Movie modelot so Actor modelot 
            $movie->actors()->attach($actor);
        }


        foreach($request->directors as $director)
        {
            // directors ni e vrska koja ja imame vo Movie modelot so Director modelot 
            $movie->directors()->attach($director);
        }


        foreach($request->genres as $genre)
        {
 
            $movie->genres()->attach($genre);
        }


        foreach($request->images as $image)
        {
            $img = new Image;
            $img->url = $image;
            $img->movie_id = $movie->id;
            $img->save();
        }

        return redirect()->route('movie.show', ['id' => $movie->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) // ovde se prima toa id od web rutata /show/{id}
    {
        // // names of methods-relationships within Movie model 
        // find --> sekogas bara po primarniot kluc vo baza 
        /**Dakle, funkcijata find može da se koristi za pronaоѓање zapisi spored bilo koja jedinstvena vrednost vo tabelata, ne samo spored ID.
         * no default e po id 
         */
        $movie = Movie::with('actors', 'directors', 'genres', 'images', 'rating', 'type')->find($id);

        // with se koristi za eloquent relacii za dane se pravi SELECT querinja 

        return view('movie.show', compact('movie')); 
        // ova compact movie kako ke se napise taka ke se koristi samo so $movie vo HTML-delot 
        // no i varijablata mora da bide ista $f i lm 
    }


    

        public function search(Request $request)
        {
            $searchQuery = $request->input('search');
            $movies = Movie::where('title', 'like', '%' . $searchQuery . '%')->get();       
            return response()->json($movies, 200);
        }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
