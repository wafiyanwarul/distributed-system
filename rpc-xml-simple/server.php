<?php 
header("Content-Type:text/xml;charset=UTF-8");

// request dari Client ke Server
if (($_SERVER['REQUEST_METHOD']=='POST') and ($_GET['user']=='pengguna') and ($_GET['password']=='pin'))
{
    $input = file_get_contents("php://input");
    $data = xmlrpc_decode($input);
} else {
    $data = array("nim"=>"220605110022", "nama"=>"Wafiy", "kota"=>"Malang");
}

// response dari Server ke Client
$response = xmlrpc_encode($data);
echo($response);
?>