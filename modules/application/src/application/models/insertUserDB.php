<?php

function insertUser($config, $data)
{
    foreach ($data as $key => $value)
    {
        if(is_array($value))
            $data[$key]=implode(",", $value);
    }
    
    move_uploaded_file($_FILES['photo']['tmp_name'],
    $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
    
    file_put_contents($filename,"\n".implode("|",$data),FILE_APPEND);
    
    return $data;
}