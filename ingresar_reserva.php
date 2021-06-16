<?php

require_once "DB/operaciones.php";

if(count($_POST)>0){
    $nombre = $_POST["nombre-txt"];
    $fecha_in = $_POST["fecha-ingreso"];
    $fecha_end = $_POST["fecha-termino"];
    $hora_in = $_POST["hora-ingreso"];
    $hora_end = $_POST["hora-termino"];

    //comprobacion si resivo los datos del formulario
    //echo "Nombre: ".$nombre;
    //echo "Fecha ingreso: ".$fecha_in;
    //echo "Fecha fin: ".$fecha_end;
    //echo "Hora ingreso: ".$hora_in;
    //echo "Hora fin: ".$hora_end;
    if(!empty($nombre) && !empty($fecha_in) && !empty($fecha_end) && !empty($hora_in) && !empty($hora_end)){
        $reserva =  new stdClass();
        $reserva->nombre = $nombre;
        $reserva->fecha_in = $fecha_in;
        $reserva->fecha_end = $fecha_end;
        $reserva->hora_in = $hora_in;
        $reserva->hora_end = $hora_end;
        ingresarReserva($reserva);
        $alerta_exito = "Su Reserva a sido agendada con exito";
        header("Refresh: 4; url=ver_reserva.php");
    }else{
        $alerta_fracaso = "Su Reserva no fue agendada, intente de nuevo";              
        //header("Refresh: 4; url=index.php");                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
    }
    }
//var_dump($reserva);



$pagina = "ingresar_reserva"; // mostrar en que pagina esta posicionado equivalente a CSS
require_once "Templates/header.php";

?>




<main class="container-fluid">
    <div class="row mt-5">
        <div class="col-12 col-md-6 col-lg-4 mx-auto">
            <?php  if(isset($alerta_exito)){
            ?>
                <div class="alert alert-success p-3">
                    <?php echo $alerta_exito;?>
                </div>
                    <?php }?>
        <form method="POST" action="">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <span>Ingresar Reserva</span>
                </div>
                <div class="card-body">
                <div id="divErrores">

                </div>      
                    <div>
                        <label for="nombre-txt" class="form-label">Nombre</label>
                        <input type="text" Required name="nombre-txt" id="nombre-txt" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fecha-ingreso" class="form-label">Fecha de Ingreso</label>
                        <input type="text" required  name="fecha-ingreso" id="fecha-ingreso" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fecha-termino" class="form-label">Fecha de Termino</label>
                        <input type="text" required  name="fecha-termino" id="fecha-termino" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="hora-ingreso" class="form-label">Hora de Ingreso</label>
                        <input type="text" required  name="hora-ingreso" id="hora-ingreso" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fecha-termino" class="form-label">Hora de Termino</label>
                        <input type="text" required  name="hora-termino" id="hora-termino" class="form-control">
                    </div>

                </div>
                <div class="card-footer">
                    <div class="d-grid gap-1">
                        <button type="submit" class="btn btn-secundary" id="btnEnviar">Registrar</button>
                    </div>
                </div>
            </div>
        </form>
        </div>        
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="Js/index.js"></script>
</body>
</html>