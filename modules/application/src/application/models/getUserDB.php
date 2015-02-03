<?php

function getUserDB($config, $iduser)
{
    // Conectar al DBMS
    $link = mysqli_connect($config['db']['host'],
                             $config['db']['user'],
                             $config['db']['password']);
							 
    // Seleccionar la DB
    mysqli_select_db($link, $config['db']['database']);
    
    // $query = "SELECT * FROM users WHERE iduser = ".$iduser;
    $query =  "SELECT iduser, name, email, genders_idgender, group_concat(hobbies.hobby)
                FROM users
                LEFT JOIN users_has_hobbies
                ON users_iduser = users.iduser
                LEFT JOIN hobbies
                ON hobbies_idhobby = hobbies.idhobby
                WHERE iduser = ".$iduser;
    
    
    $result = mysqli_query($link, $query);
    
    // (SELECT) Recorrer el recordset
    while($row = mysqli_fetch_assoc($result))
    {
        // Mostrar fila a fila
        $usuario=implode("|", $row);
    }
    
    mysqli_close($link);
     
    return $usuario;
}