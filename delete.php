<?php

$con = mysqli_connect('localhost','root','','apirn');

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$iddata = $obj ['id'];

$delete = mysqli_query($con, "DELETE FROM user WHERE id=$iddata") or die(mysqli_error($con));

if($delete) {
    $msg = 'Berhasil delete data';
    $json = json_encode($msg);
    echo $json;
}
else {
    $msg = 'Gagal delete data';
    $json = json_encode($msg);
    echo $json;
}

mySqli_close($con);
?>