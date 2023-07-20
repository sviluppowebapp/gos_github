<?php
function data_inizio($datainiziocontratto){

    //Eseguo l'explode perchè mktime ha bisogno di ricere i parametri in un
    //determinato modo
    list($dd, $mm, $yyyy) = explode('/', $datainiziocontratto);

    //Tramite questa istruzione ricavo il numero del giorno della settimana
    $numbrdayweek = date("w",mktime(0,0,0,$mm, $dd, $yyyy));

    $days = array ("Domenica", "Lunedi", "Martedi", "Mercoledi", "Giovedi",
    "Venerdi","Sabato");
    $nameday=$days[$numbrdayweek];

    return $nameday."<br>".$datainiziocontratto;   

}
?>