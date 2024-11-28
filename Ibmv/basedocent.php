<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta DB</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg, #ff00003a, #f2ff0053, #ff00ff53);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 200vh;
            margin: 0;
        }
        table {
            border: solid 5px #ffffff;
        }
        th, h1 {
            color: rgb(255, 255, 255);
        }
        td, th {
            background-color: rgb(250, 188, 227);
            border: solid 4px #f8326a;
            padding: 2px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Lista de Carreras</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO PATERNO</th>
                <th>APELLIDO MATERNO</th>
                <th>MATERIA</th>
                <th>CORREO</th>
                <th>NUMERO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Validamos datos del servidor
            $user = "root";
            $pass = "";
            $host = "localhost";
            $datab = "ibmv";

            // Conectamos a la base de datos
            $connection = new mysqli($host, $user, $pass, $datab);

            // Verificamos la conexión a la base de datos
            if ($connection->connect_error) {
                die("No se ha podido conectar con el servidor: " . $connection->connect_error);
            } else {
                echo "<b><h3>Hemos conectado al servidor :)</h3></b>";
            }

            // Hacemos llamado al input de formulario
            $nombrec = $_POST['Nombre'];
            $apellidop = $_POST['Apellidop'];
            $apellidom = $_POST['Apellidom'];
            $asignatura = $_POST['Asignatura'];
            $coreo = $_POST['correo'];
            $telefono = $_POST['Telefono'];


            // Insertamos datos de registro al MySQL, indicando nombre de la tabla y sus atributos
            $instruccion_SQL = "INSERT INTO registrodocentes (Nombre, Apellidop, Apellidom, signatura, correo, Telefono) VALUES ('$nombrec', '$apellidop', '$apellidom', '$asignatura', '$coreo', '$telefono')";
            $resultado = mysqli_query($connection, $instruccion_SQL);

            // Consultamos todos los registros
            $consulta = "SELECT * FROM registrodocentes";
            $result = mysqli_query($connection, $consulta);

            if (!$result) {
                echo "No se ha podido realizar la consulta";
            } else {
                while ($colum = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $colum['id'] . "</td>";
                    echo "<td>" . $colum['Nombre'] . "</td>";
                    echo "<td>" . $colum['Apellidop'] . "</td>";
                    echo "<td>" . $colum['Apellidom'] . "</td>";
                    echo "<td>" . $colum['Asignatura'] . "</td>";
                    echo "<td>" . $colum['correo'] . "</td>";
                    echo "<td>" . $colum['Telefono'] . "</td>";
                    echo "</tr>";
                }
            }
    
            // Cerramos la conexión
            mysqli_close($connection);
            ?>
        </tbody>
    </table>
    <a href="index.html">Inicio</a>
    <a href="carreras.html">Registrar Nueva Aula</a>
</body>
</html>