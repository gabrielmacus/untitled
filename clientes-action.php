<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 04/01/2017
 * Time: 22:12
 */

include ("includes/autoload.php");

$clientes = new Cliente($_POST,$_GET,$db);

$result=$clientes->getObject();

if($result["success"])
{
    $clientes= $result["data"];

   echo json_encode($clientes);

}
else
{
    echo json_encode($result);
}
