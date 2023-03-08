<?php
//configuraciones
error_reporting(E_ALL ^ E_NOTICE);
require_once 'database.php';
header('Content-type: application/json');
extract($_POST);


    try{
            $db=new Database();
            $db->conectarBD();

          

        switch($accion){
            case 'seleccionar':
                $video['peliculas'] = $db->seleccionar("USE bd_cursoweb");
                $video['peliculas'] = $db->seleccionar("SELECT * FROM peliculas");
                break;
        }

        echo ($video!= null) ? json_encode($video) : "{}";

        $db->desconectarBD();

        } catch (Exception $e){
        echo $e->getMessage();
        }

?>