<?php

include ("includes/autoload.php");


$rsClientes = new Cliente($_POST,$_GET,$db);
$cliente=$rsClientes->getObject();



if($cliente['success'])
{
    echo $mustache->render(readTemplate("clientes/list.html"),array("clientes"=>$cliente["info"]));

}
else
{
    echo "ERROR";
}

