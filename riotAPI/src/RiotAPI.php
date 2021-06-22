<?php

class RiotAPI {
    protected $consts;
    protected $lang;
    protected $region;




    public function __construct() {
        $this->lang = 'fr';
        $this->region = 'EUW';

        $this->consts = json_decode(file_get_contents(DATA_PATH . '/consts.json'));
    }





    // raccourcis vers le JSON

    protected function VERSIONS() {
        return $this->consts->VERSIONS;
    }

    protected function REGIONS() {
        return $this->consts->REGIONS;
    }

    protected function LANGS() {
        return $this->consts->LANGS;
    }

    protected function API() {
        return $this->consts->api;
    }

    protected function DDRAGON() {
        return $this->consts->ddragon;
    }

    protected function API_KEY() {
        return $this->consts->API_KEY->key . $this->consts->API_KEY->value;
    }

    //


    //fonction pour récupérer l'ID du compte du joueur à partir de son pseudo
    public function getSummoner($username, $region=NULL) {
        if($region === NULL) {
            $region = $this->region;
        }

        $url = $this->format(
            $this->API()->base . $this->API()->url->summonerByName . $this->API_KEY(),
            [
                'region' => $this->REGIONS()->{$region},
                'version' => $this->VERSIONS()->summoner,
                'name' => $username
            ]
        );

    

        $player = json_decode(file_get_contents($url));

        return (object)array(
            "name" => $player->name,
            "level" => $player->summonerLevel,
            "id" => $player->id
        );
    }



    protected function format($string, $match=[]) {
        foreach($match as $arg => $value) {
            $rgx = '/{'. preg_quote($arg, '/') .'}/';
            $string = preg_replace($rgx, $value, $string);
        }

        return $string;
    }

    //fonction pour obtenir l'ID du champion le plus jouer par le joueur a partir de l'ID du compte du joueur
    public function getMasteries($summonerId, $region=NULL) {
        if($region === NULL) {
            $region = $this->region;
        }
        
        $url = $this->format(
            $this->API()->base . $this->API()->url->summonerMasteries . $this->API_KEY(),
            [
                'summonerId' => $summonerId,
                'region' => $this->REGIONS()->{$region},
                'version' => $this->VERSIONS()->championmastery,
                'masteries' => $summonerId,
            ]
            
        );

      

        $player = json_decode(file_get_contents($url));
        
        return (
             $player[0]
            
        );
        
    }


    //fonction pour obtenir le nom du champion à partir de son ID
    public function getChampName($championId, $lang=NULL) {
        if($lang === NULL) {
            $lang = $this->lang;
            //$username->{$summonerId->id}->key;
        }
        
        $url = $this->format(
            $this->DDRAGON()->base . $this->DDRAGON()->url->champions,
            [
                'lang' => $this->LANGS()->{$lang},
                'version' =>'10.13.1',
            ]   
        );
        
      

        $champions = json_decode(file_get_contents($url));
        $champions = (array)$champions ->data;
        foreach( $champions as $champ)
        {
            if($championId == $champ->key)
            {
                return (
                    $champ->name
                    
                );
            }
        }
        

    }
    

}