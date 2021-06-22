<?php

if($_GET['username'] && !empty($_GET['username'])) {

    $oRiotApi = new RiotAPI();
    $player = $oRiotApi->getSummoner($_GET['username']);
    $playermasteries = $oRiotApi->getMasteries($player->id);
    $championId = $playermasteries->championId;
    $championName = $oRiotApi->getChampName($championId);
    var_dump($player);
    
    var_dump($championId);

    var_dump($championName);


}

