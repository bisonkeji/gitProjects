<?php

$raw_post_data = file_get_contents('php://input', 'r');

$method = $_SERVER['REQUEST_METHOD'];

if('PUT' == $method)

{
    $headers = apache_request_headers();
    file_put_contents('socket.txt',$raw_post_data." headerInfo".print_r($headers,true));

}

else if('DELETE'==$method)

{

       unlink($_GET['file']);

}