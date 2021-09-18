<?php
    session_start();
    include ('db.php');
    include ('includes/header.php');
    include ('includes/body.php');
?>
<!-- <?php if($_SESSION['message']=='TASK UPDATE'){?> -->
<html>
    <script>    
    alertify.success('Actualizado');
    <?php
    session_unset(); 
    session_destroy(); 
    ?>
    </script>
</html>
        
<?php } ?> 
<?php if(isset($_SESSION['message'])){?>
<html>
    <script>    
    alertify.success('Guardado');
    <?php
    session_unset(); 
    session_destroy(); 
    ?>
    </script>
</html>
        
<?php } ?> 

    
