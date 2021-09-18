<?php
    session_start();

    include('db.php');
    // echo 'hola';

    if (isset($_POST['save_task'])) {
        $alias= $_POST['alias'];
        $id_banco= $_POST['id_banco'];
        $ultimos_digitos= $_POST['ultimos_digitos'];
        // generamos la consulta en este caso es el metodo POST que inserta los datos 
        $query = "INSERT INTO c_cuentas_bancarias(alias, id_banco, ultimos_digitos) VALUES ('$alias','$id_banco','$ultimos_digitos')";
        $result= mysqli_query($conectar, $query);
        
        $_SESSION['message']="Guardado";
        $_SESSION['message_type']='success';
        header("Location:index.php");
    
    }else{ 
        echo 'algo anda mal';
    }

?>