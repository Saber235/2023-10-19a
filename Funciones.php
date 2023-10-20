<?php
//Este es un mesage que se va a mostrar en la pantalla"__________"
//echo "Hola";

function consulta(){
    //CODIGO PARA CONECTAR A LA BASE DE DATOS"______"
    $conexion = mysqli_connect('localhost', 'root', 'root', 'Janflasmusic');

    //palabra reservada traida de mysql concatenado en php para ahorrar poder leer sin deslizar"_______"
    $sql ="select 2+1 ";
    $sql .="as suma";
    
    //Este codigo ejecuta una consulta que hemos traido de la base de datos"________"
    $r = $conexion->query($sql);

    //Esta es la inicialización de la variable que debe inicarse en 0 porque lo que se va a retornar o mostrar es un numero"________"
    $salida = 0;

    //Calcula el area del triangulo"______"
    $salida = 10 * 2/2;

    //recorre el recordsef"_________"
    while($fila = mysqli_fetch_assoc($r)){
        //incremento de variable o acumulación"_________"
        $salida += $fila['suma'];

    }
    //Retorna la operación"__________"
    return $salida;
}
function Calcular(){
    //CODIGO PARA CONECTAR A LA BASE DE DATOS"______"
    $conexion = mysqli_connect('localhost', 'root', 'root', 'Janflasmusic');
    //Esta es la inicialización de la variable que debe inicarse en 0 porque lo que se va a retornar o mostrar es un numero"__________"
    $salida = 0;
    //palabra reservada traida de mysql concatenado en php para haorrar poder leer sin deslisar"_______"
    $sql ="select 10 as n1, ";
    $sql .="  20 as n2";
    //Este codigo egecuta una consulta que hemos traido de la base de datos"________"
    $s = $conexion->query($sql);

    //recorre el recordsef"_________"
    while($fila = mysqli_fetch_assoc($s)){
        //sumar las 2 variables"_________"
        $salida += $fila['n1'];
        $salida += $fila['n2'];

    }
    

     //Retorna la operación"__________"
     return $salida;
}
function insertarPersonas($Documento, $Nombre, $Clave){
    $salida = "";
    //CODIGO PARA CONECTAR A LA BASE DE DATOS"______"
    $conexion = mysqli_connect('localhost', 'root', 'root', 'JanflashMusic');
    $sq = "INSERT INTO Personas (documento, nombre, clave)"; 
    $sq .= "VALUES ('$Documento', '$Nombre', '$Clave')";

    // Ejecutar la consulta
    $resultado = $conexion->query($sq);

    if ($resultado) {
        $salida = "Registro exitoso";
    } else {
        $salida = "Error en el registro: " . $conexion->error;
    }
    $conexion->close();
    return $salida;
}
function eliminarPersonas($Documento){
    $salida = "";
    $conexion = mysqli_connect('localhost', 'root', 'root', 'JanflashMusic');
    $sq = "DELETE FROM Personas WHERE Documento = '$Documento'";

    // Ejecutar la consulta
    $resultado = $conexion->query($sq);

    if ($resultado) {
        $salida = 'Se Ha eliminado correctamente';
    } else {
        $salida = "Error en la eliminación: " . $conexion->error;
    }
    return $salida;
    $conexion->close();
}
function actualizarSitio($Documento, $Sitio){
    $salida = "";
    $conexion = mysqli_connect('localhost', 'root', 'root', 'JanflashMusic');
    $sq = "UPDATE Personas SET Sitio = '$Sitio' WHERE Documento = '$Documento'";

    // Ejecutar la consulta
    $resultado = $conexion->query($sq);

    if ($resultado) {
        $salida = "Sitio  actualizado";
    } else {
        $salida = "Error en la actualización: " . $conexion->error;
    }
    return $salida;
    $conexion->close();
}
function mostrarSitio($Documento,$Frase){
    $salida = "";
    $conexion = mysqli_connect('localhost', 'root', 'root', 'JanflashMusic');
    $sq = "SELECT Sitio FROM Personas WHERE Documento = '$Documento'";
    // Ejecutar la consulta
    $r = $conexion->query($sq);

   //recorre el recordsef"_________"
    while($fila = mysqli_fetch_assoc($r)){
        $salida .="<a href= '".$fila['Sitio']."'>";
        $salida .= $Frase;
        $salida .="</a>";


    }
    $conexion->close();
    return $salida;
}
/**
 * Realiza una consulta a la base de datos y devuelve los resultados formateados como una cadena de texto.
 * Autor: Jhonny Alexander Gonsalez Torres
 *
 * @param string $u Documento para buscar datos en la tabla usuarios. (Opcional, por defecto es null).
 * @param string $c Contraseña para buscar datos en la tabla usuarios. (Opcional, por defecto es null).
 * @param int $n Número para controlar el tipo de consulta. (Opcional, por defecto es 1).
 * @return string Devuelve una cadena con los valores de la tabla 'usuarios' separados por saltos de línea.
 */
function consultaPersonas($u = null, $c = null, $n = 1)
{
    // Se inicializa una variable para acumular los resultados"______"
    $salida = "";

    // Se establece la conexión a la base de datos con el servidor, nombre de usuario, contraseña y nombre de la base de datos.
    $conexion = mysqli_connect('localhost', 'root', 'root', 'JanflashMusic');

    // Se define la consulta SQL según el valor de $n.
    if ($n == 1) {
        // Consulta principal para seleccionar todos los registros de la tabla 'usuarios'.
        $sql = "SELECT * FROM Personas";
        // Si se proporciona un documento, se agrega una condición WHERE a la consulta.
        if ($u != null) {
            $sql .= " WHERE Documento='$u'";
        }
        // Si se proporcionan tanto el documento como la contraseña, se realiza una consulta adicional con ambas condiciones.
        if ($u != null && $c != null) {
            $sql = "SELECT * FROM Personas WHERE Documento='$u' AND Clave='$c'";
        }
    } elseif ($n != 1) {
        // Consulta de recuento para obtener el número total de registros en la tabla 'Personas'.
        $sql = "SELECT count(*) FROM Personas";
    } else {
        // Si $n no es 1 ni diferente de 1, se considera un valor incorrecto y se agrega un mensaje.
        $salida .= "Valor incorrecto para el parámetro \$n";
    }
    if ($y != null && $z != null) {
        $sqlw = "SELECT Documento,Nombre from Personas where Documento='$y' AND Nombre='$z';";
    }
    // Se ejecuta la consulta y se obtiene el conjunto de resultados.
    $resultado = $conexion->query($sql);

    // Se verifica si se encontraron resultados.
    if ($resultado) {
        if ($n == 1) {
            // Se recorren las filas de resultados y se concatenan las columnas a la variable de salida.
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $salida .= $fila['Documento'] . "<br>"; // Concatenación del primer campo
                $salida .= $fila['Nombre'] . "<br>"; // Concatenación del segundo campo
                $salida .= $fila['Clave'] . "<br>";
            }
        } elseif ($n != 1) {
            // Se obtiene el resultado del recuento"____"
            $count = mysqli_fetch_row($resultado)[0];
            // Se verifica si el número de resultados es mayor que el límite
            if ($count > $n) {
                // Se recorren los primeros 2 resultados y se concatenan las columnas a la variable de salida.
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $salida .= $fila['Documento'] . "<br>"; // Concatenación del primer campo
                    $salida .= $fila['Nombre'] . "<br>"; // Concatenación del segundo campo
                }
            } else {
                // Se muestra el número total de resultados
                $salida .= "Número total de registros: $count";
            }
        }
    } else {
        // No se encontraron resultados o hubo un error en la consulta"_____"
        $salida .= "Error en la consulta";
    }

    // Se cierra la conexión a la base de datos"_____"
    $conexion->close();

    // Se devuelve la cadena acumulada con los resultados de la consulta"______2
    return $salida;
}