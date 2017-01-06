<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 06/01/2017
 * Time: 13:46
 */

function isInvalidData()
{
    return false;
}


try
{

    include("includes/autoload.php");
$id= $_GET["id"];

$act = $_GET["act"]  ;

$type=$_GET["type"]  ;

$data = $_POST;

$result["success"]=false;
$result["error"]=false;


if(( (!isset($id) ||empty($id)) && $act!='list' && $act!='add' ) || (!isset($act) ||empty($act) )||(!isset($type) ||empty($type)))
{
    $result["error"]=true;
    $result["info"]=array("err"=>1000,"errmsg"=>"Faltan parametros");
    echo json_encode($result);
    exit();


}

if($result["info"]=isInvalidData($data))
{

    $result["error"]=true;
    $result["info"]=array("err"=>1100,"errmsg"=>"Parametros invalidos");
        echo json_encode($result);
        exit();


        //hay error

    }



     $collection =$db->selectCollection($type);

        switch($act)
        {
            case 'add':

                if($opResult=$collection->insert($data))
                {
                    $result["success"]=true;
                }
                else
                {
                    $result["error"]=true;
                }

                break;
            case 'edit':

                if($opResult=$collection->update(array("_id"=>new MongoId($id)),array('$set' => $data)))
                {
                    $result["success"]=true;
                }
                else
                {
                    $result["error"]=true;


                }

                break;

            case 'delete':
                if($opResult=$collection->remove(array("_id"=>new MongoId($id))))
                {
                    $result["success"]=true;
                }
                else
                {
                    $result["error"]=true;

                }


                break;

            case 'list':



                $opResult= ($id)?$collection->find(array("_id"=>new MongoId($id))):$collection->find(array());



                if($opResult)
                {
                    $result["success"]=true;

                    $result["data"]=iterator_to_array($opResult,false);
                }
                else
                {
                    $result["error"]=true;
                }




                break;

        }


        $result["info"]=$opResult;










}
catch (Exception $e)
        {
            $result["error"]=true;
            $result["info"]=array("err"=>$e->getCode(),"errmsg"=>$e->getMessage());
        }

echo json_encode($result);

