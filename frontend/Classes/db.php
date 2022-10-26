<?php
include_once ('../Database/database.php');

class frontend extends database
{
    public function pageIndexing(){

        $page = $_GET['page'] ?? '';

        switch ($page) {

            case 'products':
                include('products.php');
                break;

            case 'categories':
                include('categories.php');
                break;

            case 'abouts':
                include('abouts.php');
                break;

            case 'home':
                include_once ('home.php');
                break;
        }
    }

}