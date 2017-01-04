<?php

include ("includes/autoload.php");
$data = new Usuario($_POST,$_GET,$db);

echo $mustache->render(readTemplate("home/index.html"),array(
    "usuarios"=>array(0=>array(
        "nombre"=>"gabriel"
    ),
        1=>array(
            "nombre"=>"robertto"
        )



    )


));

