<?php


    include_once('Classes/db.php');
    include('header.php');
    include('footer.php');
    global $frontend;
    $frontend=new frontend('peakcok','localhost','root','');
    $frontend->pageIndexing();



?>