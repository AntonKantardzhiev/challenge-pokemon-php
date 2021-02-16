<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const API_URL = "https://pokeapi.co/api/v2/pokemon/";

if (isset($_GET['search'])){
    $id = htmlspecialchars($_GET["search"],ENT_NOQUOTES, "UTF-8");
    $poke = json_decode(file_get_contents(API_URL . $id), true);
    $pokemon = [
        "name" => $poke["name"],
        "image" => $poke["sprites"]["front_default"],
        "id" => $poke["id"],
        "moves" => array_slice($poke["moves"],0 , 4),
        "move1" => "moves"[0]["move"]["name"],
        "move2" => "moves"[1]["move"]["name"] ? true : null,
        "move3" => "moves"[2]["move"]["name"] ? true : null,
        "move4" => "moves"[3]["move"]["name"] ? true : null

    ];



}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pokemon</title>
    <meta name="description" content="Pokedex">
    <meta name="author" content="Anton Kantartzhiuev & Mark Hoogkamer">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="Pokedex">
    <meta property="og:type" content="Pokedex for pokemons">
    <meta property="og:url" content="../img/logo.jpeg">
    <meta property="og:image" content="img/logo.jpeg">

    <link rel="icon" type="imgage/png" href="img/logo.png">
    <link rel="apple-touch-icon" href="img/logo.png">


    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <meta name="theme-col p-2or" content="#fafafa">

</head>
<body class="container-fluid main">


<header>
    <div class="row " id="title">
        <h1 class="mx-auto titlecaption ">Pokemon <img src="img/logo.png" alt="Logo Pokedex "> Database</h1>
    </div>

</header>


<main class="container">5
    <section class="row container-fluid" id="pokedex-tpl">

        <div class="col-md-6">
            <div class="row search">
                <form action="index.php" method="get">
                    <label for="search"><input id="search" name="search" placeholder="Pokémon name or ID" type="text">
                        <button type="submit" class="btn btn-warning btn-outline-dark" id="pressSearch">Search</button></label>
                </form>
            </div>
            <div class="row evolution">

                <div class="col-md-3" id="evolution1"><span id="first"></span></div>
                <div class="col-md-3" id="evolution2"><span id="second"></span></div>
                <div class="col-md-3" id="evolution3"><span id="third"></span></div>
            </div>
        </div>
        <div class="col-md-6 " id="pokemons">
            <div class="row pokemon-img" id="pokemon-img"><?php echo "<img src='".$pokemon["image"]."'>"; ?></div>
            <div class="row data2" id="name"><?php echo $pokemon["name"]; ?></div>
            <div class="row data2" id="id"><?php echo $pokemon["id"]; ?></div>

            <table id="movestable">
                <tr>
                    <td>
                        <div class="row data2" id="move1"><?php echo $pokemon["move1"]; ?></div>
                    </td>
                    <td>
                        <div class="row data2" id="move2"><?php echo $pokemon["move2"]; ?></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row data2" id="move3"><?php echo $pokemon["move3"]; ?></div>
                    </td>
                    <td>
                        <div class="row data2" id="move4"><?php echo $pokemon["move4"]; ?></div>
                    </td>
                </tr>
            </table>
        </div>

    </section>


</main>
<footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

<!--bootstrap scripts-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>

<!--parallax scripts-->
<!--so this one doesn't work either, ffs-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<!--<script src="/path/to/parallax.js"></script>-->

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID.-->
<script>
    window.ga = function () {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'anonymizeIp', true);
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
<!--<script src="javascript/script.js"></script>-->
</body>

</html>