<?php

include ("includes/autoload.php");

/*
$rsClientes = new Cliente($_POST,$_GET,$db);
$cliente=$rsClientes->getObject();



if($cliente['success'])
{
    echo $mustache->render(readTemplate("clientes/list.html"),array("clientes"=>$cliente["info"]));

}
else
{
    echo "ERROR";
}*/



?>
<script
    src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>
<form >
    <div>
        <label>Nombre</label>
        <input name="name">
    </div>

    <div>
        <label>Apellido</label>
        <input name="surname">
    </div>


    <button type="submit">Aceptar</button>
</form>

<script>
    $(document).on("submit","form",function (e) {

        var data =$(this).serialize();

        $.ajax(
            {
                method:"post",
                url:"action.php?type=movies&act=add",
                data:data,
                dataType:"json",
                success:function (data) {

                    console.log(data);

                },
                error:function (data) {

                    console.log(data);
                }
            }
        );


        e.preventDefault();
    });
</script>