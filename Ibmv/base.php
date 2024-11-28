<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
    body { font-family: Arial, sans-serif;
      background: linear-gradient(45deg, #ff00003a, #f2ff0053, #ff00ff53);
       display: flex;
      flex-direction: column;
      align-items: center; 
      justify-content: center; 
      height: 100vh; margin: 0; }
      table {
        border: solid 5px #ffffff;
     
                     
      }
     
      th, h1 {
        color: rgb(255, 255, 255);
        
      }

      td,
      th {
        background-color: rgb(250, 188, 227);
        border: solid 4px #f8326a;
        padding: 2px;
        text-align: center;
      }


    </style>
</head>
<body>
    
</body>
</html>


<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";
$datab = "sistem";


//conetamos al base datos
$connection = new mysqli($host, $user, $pass, $datab);

//hacemos llamado al imput de formuario
$numeroaul = $_POST['Numaulas'];
$capacida = $_POST['Capacidad'];
$ubicacio = $_POST['Ubicacion'];
$equipamiento = $_POST['Equipamiento'];

//verificamos la conexion a base datos
if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . new mysqli();
        }
  else
        {
            echo "<b><h3>Hemos conectado al servidor :)</h3></b>" ;
        }
        //indicamos el nombre de la base datos
        $datab = "ibmv";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
        echo "<h3>Tabla seleccionada:</h3>" ;
        }
        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        $instruccion_SQL = "INSERT INTO registroaula (Numaulas, Capacidad, Ubicacion, Equipamiento) VALUES ('$numeroaul', '$capacida', '$ubicacio', '$equipamiento')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM registroaula";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
echo "<table>";
echo "<tr>";
echo "<th><h1>ID</th></h1>";
echo "<th><h1>Nº AULAS</th></h1>";
echo "<th><h1>CAPACIDAD</th></h1>";
echo "<th><h1>UBICACION</th></h1>";
echo "<th><h1>EQUIPAMIENTO</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id']. "</td></h2>";
    echo "<td><h2>" . $colum['Numaulas']. "</td></h2>";
    echo "<td><h2>" . $colum['Capacidad'] . "</td></h2>";
    echo "<td><h2>" . $colum['Ubicacion'] . "</td></h2>";
    echo "<td><h2>" . $colum['Equipamiento'] . "</td></h2>";
    echo "</tr>";
}


mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="index.html">Inicio</a>';
   echo'<a href="unos.html"> Registrar Nueva aula</a>';


?>