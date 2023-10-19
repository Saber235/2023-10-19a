<?php
//Este es un mesage que se va a mostrar en la pantalla"__________"
echo "Hola";

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