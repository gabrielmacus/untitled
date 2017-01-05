<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 04/01/2017
 * Time: 21:06
 */

include ("includes/autoload.php");

$clientes = new Cliente($_POST,array("act"=>"list"),$db);
$result=$clientes->getObject();

if($result["success"])
{
    $clientes= array("clientes"=>$result["data"]);


    echo $mustache->render(readTemplate("clientes/list.html"),$clientes);

}


