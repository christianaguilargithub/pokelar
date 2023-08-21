<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PokemonController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index()
    {
        // Send GET request to PokéAPI
        $response = $this->client->get('https://pokeapi.co/api/v2/pokemon-species', [
            'query' => [
                'limit' => 400,
                'offset' => 0,
            ],
            'verify' => false, // Disable SSL certificate verification
        ]);

        // Decode the JSON response
        $data = json_decode($response->getBody()->getContents(), true);

        // Extract Pokémon names and URLs
        $pokemonNames = array_column($data['results'], 'name');
        $pokemonUrls = array_map(function ($pokemon) {
            return 'https://pokeapi.co/api/v2/pokemon/' . $pokemon['name'];
        }, $data['results']);

        // Construct the sprite image URLs
        $spriteImageUrls = array_map(function ($pokemon) {
            $pokemonNumber = explode('/', rtrim($pokemon['url'], '/'))[6];
            return 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/dream-world/' . $pokemonNumber . '.svg';
        }, $data['results']);

        return view('welcome', compact('pokemonNames', 'pokemonUrls', 'spriteImageUrls'));
    }
}
