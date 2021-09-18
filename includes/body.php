
<body>
<!-- navar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="index.php" class="navbar-brand">
            CONCRAD - EVALUACION TECNICA
        </a>
    </div>
</nav>

<!-- contenedor principal -->

<main class="container mt-4 shadow-lg p-3 mb-5 rounded bg-white rounded-3 table-responsive">
    <button id="btnCrear" type="button" class="btn btn-primary" data-bs-toggle="modal">Agregar</button>
    <table id="tablaArticulos" class="table mt-2 table-bordered table-striped ">
        <thead>
            <tr class="text-center ">
                <th>ID</th>
                <th>Alias</th>
                <th>id_Banco</th>
                <th>ultimos_Digitos</th>
            </tr>
        </thead>
        <tbody>
        <?php
                include ('db.php');
                $query="SELECT * FROM c_cuentas_bancarias";
                $result_tasks = mysqli_query($conectar, $query);
                while ($row = mysqli_fetch_array($result_tasks)) { ?>
                   <tr class="text-center align-middle">
                        <td>
                            <?php echo $row['id'] ?> 
                        </td>
                        <td>
                            <?php echo $row['alias'] ?> 
                        </td>
                        <td>
                            <?php echo $row['id_banco'] ?>
                        </td>
                        <td>
                            <?php echo $row['ultimos_digitos'] ?>
                        </td>
                        <td>
                            <a class='btn btn-secondary m-1 btneditar' href="">
                                <i  class="fas fa-edit"></i>
                            </a>
                            <a class='btn btn-danger btneliminar'  href="">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>

                    </tr>
            <?php } ?>
        </tbody>
        
    </table>
</main>
<div id='modalArticulo' class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Cuenta Bancaria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="save_task.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="alias" class="col-form-label">Alias</label>
                        <input type="text" class="form-control" id="alias" name="alias">
                    </div>
                    <div class="mb-3">
                        <label for="id_banco" class="col-form-label">id_Banco <span class="fw-lighter fs-6">(maximo 5 caracters)</span></label>
                        <input type="number"  class="form-control" id="id_banco" name="id_banco" onKeyDown="if(this.value.length==5 && event.keyCode!=8) return false;">
                    </div>
                    <div class="mb-3">
                        <label for="ultimos_digitos" class="col-form-label">ultimos_Digitos </label>
                        <input type='text' class='form-control' name="ultimos_digitos" id="ultimos_digitos">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id='closeAccion'>Cerrrar</button>
                    <input type="submit" class="btn btn-primary"  id="btnAccion" name="save_task" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- formulario para Actualizar La informacion -->
<div id='modalUpdate' class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="formModalUpdate">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="aliasUpdate" class="col-form-label">Alias</label>
                        <input type="text" class="form-control" id="aliasUpdate" name="aliasUpdate">
                    </div>
                    <div class="mb-3">
                        <label for="id_bancoUpdate" class="col-form-label">id_Banco <span class="fw-lighter fs-6">(maximo 5 caracters)</span></label>
                        <input type="number" class="form-control" id="id_bancoUpdate" name="id_bancoUpdate" onKeyDown="if(this.value.length>=5&& event.keyCode!=8) return false;">
                    </div>
                    <div class="mb-3">
                        <label for="ultimos_digitosUpdate" class="col-form-label">Ultimos_Digitos</label>
                        <input  type='text' class="form-control" id="ultimos_digitosUpdate" name="ultimos_digitosUpdate">
                    </div>
                </div>
                <div class="modal-footer"> 
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrrar Actualizacion</button> -->
                     <input type="submit" class="btn btn-primary"  id="btnUpadate" name="update_task" value="Actualizar">
                </div>
            </form>
        </div>
    </div>
</div> 

    

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<!-- alertify -->
<script src="code.js"></script>
   
</body>

</html>