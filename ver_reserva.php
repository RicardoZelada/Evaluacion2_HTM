<?php 
$pagina = "ver_reserva";

require_once "Templates/header.php";
require_once "DB/operaciones.php";


if(count($_POST)>0){
    $idEliminar = $_POST["id-eliminar"];
    //var_dump($idEliminar);
    eliminarReserva($idEliminar);
  }

$reserva = obtenerReserva();

?>

<main class="container-fluid"> 
    <div class="row mt-5">
        <div class="col-12 col-md-8 col-lg-6  mx-auto">
        <table class="table table-heovered table-bordered table-striped">
            <thead class="bg-dark bg-gradient">
              <tr class="text-center text-white">
                <th scope="col">Folio</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de Ingreso</th>
                <th scope="col">Fecha de Retiro</th>
                <th scope="col">Hora de Ingreso</th>
                <th scope="col">Hora de Retiro</th>
                <th scope="col">Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($reserva as $item){ ?>
              <tr>
                <td class="text-center"><?php echo $item->id ?></td>
                <td class="text-center"><?php echo $item->nombre ?></td>
                <td class="text-center"><?php echo $item->fecha_in ?></td>
                <td class="text-center"><?php echo $item->fecha_end ?></td>
                <td class="text-center"><?php echo $item->hora_in ?></td>
                <td class="text-center"><?php echo $item->hora_end ?></td>
                <td class="text-center">
                  <form method="POST" action="">
                    <button type="submit" value="<?php echo $item->id;?>"
                    name="id-eliminar" class="btn btn-link text-danger">Eliminar</button>
                  </form>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>        
    </div>
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  </body>
</html>