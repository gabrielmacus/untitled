<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 04/01/2017
 * Time: 22:03
 */


include ("includes/autoload.php");

$clientes = new Cliente($_POST,$_GET,$db);


$clientes= array("clientes"=>$clientes->getObject()["data"],"edit"=>$_GET["act"]?$_GET["act"]:null);




echo $mustache->render(readTemplate("clientes/add.html"),$clientes);
