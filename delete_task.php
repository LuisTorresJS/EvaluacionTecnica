<?php
    include("db.php");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query="DELETE FROM c_cuentas_bancarias WHERE id = $id";
        $resultado=mysqli_query($conectar,$query);
        if(!$resultado){
            die("Consulta fallida");
        }else{
            $_SESSION['message']='TASK REMOVED';
            header("Location:index.php");   
        }
    }else{
        echo "error...";
    }
    // $conectar
    
?>