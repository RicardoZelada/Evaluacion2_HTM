<?php

/*$conexion = new mysqli();
$conexion->connect("localhost","root","12345678","ZcapGames_BD");
    if($conexion->connect_error){
         die("No Hubo Conexion: ".$conexion->connect_error);
    }*/

function conectar(){
    $servidor = "127.0.0.1";
    $usuario = "root";
    $clave = "12345678";
    $bd = "Ev2_DB_HTM";

    $con = mysqli_connect($servidor, $usuario, $clave, $bd);
    if(mysqli_connect_errno()){
        return false;
    }else{
        return $con;
    }
}

function ingresarReserva($reserva){
    $nombre = $reserva->nombre;
    $fecha_in = $reserva->fecha_in;
    $fecha_end = $reserva->fecha_end;
    $hora_in = $reserva->hora_in;
    $hora_end = $reserva->hora_end;
    $sql = "INSERT INTO Reservas(nombre,fecha_Inicio,fecha_Fin,hora_Inicio,hora_Fin) VALUES('$nombre','$fecha_in','$fecha_end','$hora_in','$hora_end')";
        $con = conectar();
        mysqli_query($con,$sql);
}

function obtenerReserva(){
    $sql = "SELECT idReservas, nombre, fecha_Inicio, fecha_Fin, hora_Inicio, hora_Fin FROM Reservas";
    $con = conectar();
    $query = mysqli_query($con, $sql);
    $lista = array();
    //Recorre la fila como un arreglo
    while($rs = mysqli_fetch_array($query)){
        $reserva = new stdClass();
        $reserva->id = $rs["idReservas"];
        $reserva->nombre = $rs["nombre"];
        $reserva->fecha_in = $rs["fecha_Inicio"];
        $reserva->fecha_end = $rs["fecha_Fin"];
        $reserva->hora_in = $rs["hora_Inicio"];
        $reserva->hora_end = $rs["hora_Fin"];
        $lista[] = $reserva;
    }    
    return $lista;
    }

    function eliminarReserva($id){
        $sql = "DELETE FROM Reservas WHERE idReservas=$id";
        $con = conectar();
        mysqli_query($con, $sql);
    }    

    function ingresar($user){
        $name = $user->name;
        $password = $user->password;
        $sql = "SELECT * FROM Usuarios WHERE nombre = '$name'";
        $con = conectar();
        $query = mysqli_query($con, $sql);
        $lista = array();
            while($rs = mysqli_fetch_array($query)){
                $user = new stdClass();
                $user->idusuarios = $rs["idUsuarios"];
                $user->name = $rs["nombre"];
                $user->password = $rs["password"];
              $lista[]=$user;
        }
        return $lista;
    }