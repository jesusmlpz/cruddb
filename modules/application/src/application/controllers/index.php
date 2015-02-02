<?php





switch($request['action'])
{        
    default:
    case 'index':  
        include('../modules/application/src/application/views/index/index.phtml');
        $content = "Hola mundo";
    break;
}

include('../modules/application/src/application/layouts/dashboard.phtml');











