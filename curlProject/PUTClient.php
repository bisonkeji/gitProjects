<?php

//PUT

$curl_handle = curl_init ();
// Set default options.
$url = 'http://127.0.0.1/gitProjects/curlProject/PUTServer.php';
curl_setopt ( $curl_handle, CURLOPT_URL, $url);
curl_setopt ( $curl_handle, CURLOPT_FILETIME, true );
curl_setopt ( $curl_handle, CURLOPT_FRESH_CONNECT, false );


curl_setopt ( $curl_handle, CURLOPT_HEADER, true );
curl_setopt ( $curl_handle, CURLOPT_RETURNTRANSFER, true );
curl_setopt ( $curl_handle, CURLOPT_TIMEOUT, 5184000 );
curl_setopt ( $curl_handle, CURLOPT_CONNECTTIMEOUT, 120 );
curl_setopt ( $curl_handle, CURLOPT_NOSIGNAL, true );
curl_setopt ( $curl_handle, CURLOPT_HEADER, true );
curl_setopt ( $curl_handle, CURLOPT_CUSTOMREQUEST, 'PUT' );
$aHeader[] = "Content-Type:text/xml;charset=UTF-8";
$aHeader[] = "x-bs-ad:private"; 
curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $aHeader);
$file = 'testFile.txt';
$file_size = filesize($file);
$h = fopen($file,'r');
curl_setopt ( $curl_handle, CURLOPT_INFILESIZE, $file_size);
curl_setopt ( $curl_handle, CURLOPT_INFILE, $h);
curl_setopt ( $curl_handle, CURLOPT_UPLOAD, true );
$ret = curl_exec ( $curl_handle );
print_r($ret);