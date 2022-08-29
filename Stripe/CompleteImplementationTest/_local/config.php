<?php
/*
 * Authenty AE - Bom Princípio-RS  |  github.com/authentyAE
 * by: will.i.am                   |  github.com/williampilger
 *
 * 2022.08.29 - Bom Princípio - RS
 * ♪ - / -
 *  
 * General system configurations .
 * 
 */

const AUTO_LOAD = __DIR__.'/../vendor/autoload.php';

if( !is_file(__DIR__.'/cred.php') || !is_file(AUTO_LOAD) )
{
    echo json_encode([
        'err_code' => '2208290647',
        'description' => 'It wasn\'t possible include the Stripe credentials or SDK.'
    ]);
    http_response_code(500);
    die();
}

require __DIR__.'/cred.php';



?>