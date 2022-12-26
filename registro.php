<?php
//Validamos datos del Servidor

$user = "root";
$pass = "";
$host = "localhost";
 
//conectamos a la ase de datos

$conection = mysqli_connect($host, $user, $pass);

//hacemos un llamado al input del formulario

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$Mensaje = $_POST["Mensaje"];

// VERIFICAMOS LA BASE DE DATOS
if(!$conection)
    {
        echo "NO SE HA PODIDO CONECTAR CON EL SERVIDOR".msql_error();
    }
 else
    {
        echo "HEMOS PODIDO CONECTAR CON EL SERVIDOR"; 
    }

//INDICAMOS EL NOMBE DE LA BASE DE DATOS

 $datab = "formulario";

//INDICAMOS SELECCIONAR A LA BASE DE DATOS

 $db = mysqli_select_db($conection,$datab);
 if(!$db)
 {
    echo "No SE HA PODIDO CONECTAR A LA TABLA";
 }
 else
 {
    echo "TABLA SELECCIONADA";
 }

 $instruccion_SQL = "INSERT INTO tabla (name, email, subject, Mensaje)
                     VALUES ('$name','$email','$subject','$Mensaje')";
 
 $resultado = mysqli_query($conection,$instruccion_SQL);

 header("Location:index.html");