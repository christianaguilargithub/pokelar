<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $client = new Client();
        $response = $client->get('https://pokeapi.co/api/v2/pokemon-species', [
            'query' => [
                'limit' => 151,
                'offset' => 0,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        $pokemonNames = array_column($data['results'], 'name');

        return view('welcome', compact('pokemonNames'));
    }
    //     return view('home');
    // }
}
