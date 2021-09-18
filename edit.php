<?php
    session_start();
    include('db.php');
    $id=$_GET['id'];
    

    if (isset($_POST['update_task'])) {
        $alias= $_POST['aliasUpdate'];
        $id_banco= $_POST['id_bancoUpdate'];
        $ultimos_digitos= $_POST['ultimos_digitosUpdate'];
        // echo $alias;
        // echo '<br>';
        // echo $id_banco;
        // echo '<br>';
        // echo $ultimos_digitos;
        // echo $id;
        $query="UPDATE c_cuentas_bancarias set alias='$alias', id_banco='$id_banco',ultimos_digitos='$ultimos_digitos' WHERE id = $id";
        $resultado=mysqli_query($conectar,$query);
        if(!$resultado){
            die("Consulta fallida");
        }else{
            $_SESSION['message']='TASK UPDATE';
            header("Location:index.php");   
        }
    }else{ 
        echo 'algo anda mal';
    }

?>