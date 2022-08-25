<?php

/**
 * Object Advanced Print.
 * Returns JSON with the object's Variables and Methods names.
 */
function objectAdvPrint($obj)
{
    $arr = [];

    $vars = get_object_vars($obj);
    if($vars) $arr['vars'] = $vars;
    
    $methods = get_class_methods($obj);
    if($methods) $arr['methods'] = $methods;
    
    if(in_array('toArray', $methods)) $arr['toArray'] = $obj->toArray();
    
    return $arr;
}

function getParams($paramArr)
{
    $arr = [];
    foreach( $paramArr as $param)
    {
        if(isset($_POST[$param]) && $_POST[$param] != '') $arr[$param] = $_POST[$param];
    }
    return $arr;
}


?>