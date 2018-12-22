<?php
$curl_handle = curl_init (); 
// Set default options. 

$url = 'http://127.0.0.1/gitProjects/curlProject/DELETEServer.php?file=socket.txt';
curl_setopt ( $curl_handle, CURLOPT_URL, $url);
curl_setopt ( $curl_handle, CURLOPT_FILETIME, true ); 
curl_setopt ( $curl_handle, CURLOPT_FRESH_CONNECT, false ); 


curl_setopt ( $curl_handle, CURLOPT_HEADER, true ); 
curl_setopt ( $curl_handle, CURLOPT_RETURNTRANSFER, true ); 
curl_setopt ( $curl_handle, CURLOPT_TIMEOUT, 5184000 ); 
curl_setopt ( $curl_handle, CURLOPT_CONNECTTIMEOUT, 120 ); 
curl_setopt ( $curl_handle, CURLOPT_NOSIGNAL, true ); 
curl_setopt ( $curl_handle, CURLOPT_CUSTOMREQUEST, 'DELETE' ); 


$ret = curl_exec ( $curl_handle );
