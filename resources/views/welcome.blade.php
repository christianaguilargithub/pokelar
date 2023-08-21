<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Generation I Pokémon</title>
    <style>
        .card {
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
          transition: 0.3s;
          width: 40%;
          margin: 10px;
        }
        
        .card:hover {
          box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
          transform: scale(1.5);
        }
        
        .container {
          padding: 2px 16px;
        }
        
        .row {
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
          align-items: center;
        }
    </style>
</head>
<body>

    <h1>Generation I Pokémon</h1>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <div class="row">
        @foreach ($pokemonNames as $key => $pokemonName)
            <div class="card" style="width: 200px; height: 200px; display:flex; flex-direction:column; justify-content:center; align-items:center;">
                <img src="{{ $spriteImageUrls[$key] }}" alt="{{ $pokemonName }} Sprite" style="width: 120px; height: 120px">
                <div class="container">
                    <h4><b>{{ $pokemonName }}</b></h4> 
                </div>
            </div>
        @endforeach
    </div>

    <h1>Generation II Pokémon</h1>

    <div class="row">
      @foreach ($pokemonNames as $key => $pokemonName2)
          <div class="card" style="width: 200px; height: 200px; display:flex; flex-direction:column; justify-content:center; align-items:center;">
              <img src="{{ $spriteImageUrls[$key] }}" alt="{{ $pokemonName2 }} Sprite" style="width: 120px; height: 120px">
              <div class="container">
                  <h4><b>{{ $pokemonName2 }}</b></h4> 
              </div>
          </div>
      @endforeach
  </div>

</body>
</html>
