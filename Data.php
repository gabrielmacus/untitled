<?php

include "includes/autoload.php";



function isInvalidData($data)
{
    return false;

}


$id= $_GET["id"];

$act = $_GET["act"]  ;
$type=$_GET["type"]  ;


$result["success"]=false;
$result["error"]=false;

if(( (!isset($id) ||empty($id)|| !is_numeric($id)) && $act!='list' && $act!='add' ) || (!isset($act) ||empty($act) )||(!isset($type) ||empty($type)))
{
    $result["error"]=true;
    echo json_encode($result);
    exit();
}

if( $result["info"]=isInvalidData($_POST))
{
    $result["error"]=true;
    //hay error

    echo json_encode($result);
    exit();
}

$collection =$db->selectCollection("movies");

switch($act)
{
    case 'add':

       if($opResult=$collection->insert($_POST))
       {
           $result["success"]=true;
       }
       else
       {
           $result["error"]=true;
       }

        break;
    case 'edit':
        if($opResult=$collection->update(array("_id"=>$id),array('$set' => array($_POST))))
        {
            $result["success"]=true;
        }
        else
        {
            $result["error"]=true;
        }

        break;

    case 'delete':
        if($opResult=$collection->remove(array("_id"=>$id)))
        {
            $result["success"]=true;
        }
        else
        {
            $result["error"]=true;
        }

        break;

    case 'list':

        $opResult= ($id)?$collection->find(array("_id"=>$id)):$collection->find(array());

        var_dump(iterator_to_array($opResult));
        if($opResult)
        {
            $result["success"]=true;
            $result["info"]=iterator_to_array($opResult);
        }
        else
        {
            $result["error"]=true;
        }




        break;

}





echo json_encode($result);








$mongoClient = new MongoClient();

$db = $mongoClient->selectDB("db");

