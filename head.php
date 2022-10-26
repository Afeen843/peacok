<?php
 include_once ('config.php');


/**
 * Constants
 */

const BASE_DIR = __DIR__;
const BASE_DIR_Admin = BASE_DIR . '/admin';
const BASE_DIR__ADMIN_CONTROLLER= BASE_DIR_Admin .'/controller';
const BASE_DIR_Frontend = BASE_DIR . '/frontend';
const BASE_DIR_Database = BASE_DIR . '/Database';

/**
 * URLS
 */

const BASE_URL= 'http://localhost/peakcok';

/**
 * Page Indexing
 */


     $page=$_GET['page'] ?? '';
     if(count($pageIndexing)>0){
         foreach ($pageIndexing as $key=>$pageIndexing){
        if($key==$page) {
            include_once (BASE_DIR__ADMIN_CONTROLLER.'/'. $pageIndexing);
        }
    }
}




?>
