<?php 
//$pagina = "ingreso_sesion";
//require_once "Templates/header.php";
require_once "DB/operaciones.php";

if(count($_POST)>0){
    $usuario = trim($_POST["nombre-txt"]);//trim elimina los espacios al inicio y final
    $password = trim($_POST["pass-txt"]);
    //echo $usuario;
    //echo $password;
    //var_dump($usuario);
    //var_dump($password);
    
    if(!empty($usuario) && !empty($password)){
        $user = new stdClass();
        $user->name = $usuario;
        $user->password = $password;
        $c = ingresar($user);
        //var_dump($c);

        if(count($c)>0){ 
            foreach($c as $p){
                $passwordBD = $p->password;
                $idusuario = $p->idusuarios;

            }
            if($passwordBD == $password){
                session_start();
                $_SESSION['logeado'] = true;
                $_SESSION['id'] = $idusuario;
                $_SESSION['usuario'] = $user->name;//si pongo $name solo, no me muestra el nombre
                
                //$alerta_exito = "Datos ingresados correctamente, redireccinando al Home... ";
                //header("Refresh:4; url=index.php");
                header('Location: index.php');
                //echo("contraseña correcta");
            }else{
                $alerta_fracaso  = "Contraseña Incorrecta";
            }
         }else{ 
         $alerta_fracaso  = "El usuario no existe";
         }
         }else{
             $alerta_fracaso = "Ingrese los datos correspondientes";
             
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Reserva | Hotel Terra Mia</title>
</head>
  <body>

<main class="container-fluid">
    <div class="row mt-5">
        <div class="col-12 col-md-6 col-lg-4 mx-auto">
    
            <?php  if(isset($alerta_fracaso)){ ?>
                <div class="alert alert-danger p-3">
                    <?php echo $alerta_fracaso;?>
                </div>
                <?php }?>    

                <?php  if(isset($alerta_exito)){ ?>
                <div class="alert alert-success p-3">
                    <?php echo $alerta_exito;?>
                </div>
                <?php }?>    
                
                
        <form method="POST" action="">     
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <span>Autenticacion</span>
                </div>
                <div class="card-body">   
                <div id="divError">

                </div> 
                    <div>
                        <label for="nombre-txt" class="form-label">Nombre</label>
                        <input type="text" required autocomplete="off" name="nombre-txt"  id="nombre-txt" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pass-txt" class="form-label">Contraseña</label>
                        <input type="password" required autocomplete="off" name="pass-txt" id="pass-txt" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-1">
                        <button type="submit" class="btn btn-secundary" id="btnEnviar-Login">Log in</button>
                    </div>
                </div>
            </div>
        </form>
        </div>        
    </div>
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script> 
<script src="Js/index.js"></script>
</body>
</html>