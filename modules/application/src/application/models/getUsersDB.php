<?php
function getUsersDB($config)
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
    $query =  "SELECT iduser, name, email, genders_idgender, group_concat(hobbies.hobby)
                FROM users 
                LEFT JOIN users_has_hobbies 
                ON users_iduser = users.iduser 
                LEFT JOIN hobbies 
                ON hobbies_idhobby = hobbies.idhobby
                GROUP BY iduser";

    // Probar la consulta en el WB
    // Enviar la consulta
    $result = mysqli_query($link, $query);
    
    // (SELECT) Recorrer el recordset
    while($row = mysqli_fetch_assoc($result))
    {
        // Mostrar fila a fila        
        $usuarios[]=implode("|", $row);
    }    
        
    // Cerrar la conexión
    mysqli_close($link);
    
    // Retornar valores
    return $usuarios;
}