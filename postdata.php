<?php
$con = mysqli_connect('localhost','root','','apirn');

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$nama = $obj['nama'];
$umur = $obj['umur'];

//$Sql_Query = "INSERT INTO user (nama,umur) VALUES ('$nama','$umur')";
$postdata = mysqli_query($con, "INSERT INTO user (nama,umur) VALUES ('$nama','$umur')") or die(mysqli_error($con));

if($postdata){

    $msg = 'Berhasil Submit Data';
    $json = json_encode($msg);
    echo $json;
}
else {
    //echo 'Gagal';
    $msg = 'Gagal Submit Data';
    $json = json_encode($msg);
    echo $json;
}

mySqli_close($con);

?>