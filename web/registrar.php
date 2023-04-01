<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtEdad"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtFecha_ingreso"])|| empty($_POST["txtPuesto"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $edad = $_POST["txtEdad"];
    $telefono = $_POST["txttelefono"];
    $direccion = $_POST["txtDireccion"];
    $fecha_ingreso = $_POST["txtFecha_ingreso"];
    $puesto = $_POST["txtPuesto"];
    
    $sentencia = $bd->prepare("INSERT INTO Empleados(nombre,apellido,edad,telefono,direccion,fecha_ingreso,puesto) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre, $apellido, $edad, $telefono, $direccion, $fecha_ingreso, $puesto]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>