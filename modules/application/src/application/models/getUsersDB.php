<?php
function getUsers($config)
{
    //$usuarios = [];
    $usuarios = array();
    
    //conectart al DBMS
    $link = mysqli_connect($config['db']['host'],
                             $config['db']['user'],
                             $config['db']['password']);
    
    // Seleccionar la BD
    mysqli_select_db($link, $config['db']['database']);
    
    // Escribir la consulta a mano
    $query = "";
    
    // Probar la consulta en el WB
    // Enviar la consulta
    $result = mysqli_query($link, $query);
    
    // (SELECT) Recorrer el recordset
        
        // Mostrar fila a fila
        $row = mysqli_fetch_assoc($result);
        
        // Retornar valores
    
    // Cerrar la conexión
    mysqli_close($link);
    
    return $usuarios;
}