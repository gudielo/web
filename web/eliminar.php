<?php 
    if(!isset($_GET['Id_empleados'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $Id_empleadosL = $_GET['Id_empleados'];

    $sentencia = $bd->prepare("DELETE FROM Empleados where Id_empleados = ?;");
    $resultado = $sentencia->execute([$Id_empleadosL]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>