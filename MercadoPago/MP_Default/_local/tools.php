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

?>