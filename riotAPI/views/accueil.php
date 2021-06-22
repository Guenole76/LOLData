<?php
var_dump(BASE_PATH);
?>
<link rel="stylesheet" type="text/css" href="theme/css/style.css">

<h1>Rechercher un invocateur</h1>
<form action="" method="GET">
    <input type="hidden" class="champ" name="page" id="research" value="searchSummoner">

    <input type="text" name="username" placeholder="Nom d'invocateur...">

    <button>Search</button>

</form>

<h1>Rechercher un champion</h1>

    <div class="container mb-2">
            
            
            
                <div class="input-group">
                    <input type="text" class="form-control" id="search" placeholder="Search champions..."></input>
                    <button onclick="getChampion()" class="btn btn-primary">Search</button>
                </div> 
                <br>

            
            
                <p id="cool"></p>

            <div class="row mt-2 text-center" id="backdrop">
                <div class="container-fluid col mt-3 mb-2" id="root">
                    
                </div>
            </div>
            <footer class="text-center">
                <p>Application developed by Guénolé LEGRAND.  Info pulled from Riot Games API.</p>
            </footer>


    </div>
