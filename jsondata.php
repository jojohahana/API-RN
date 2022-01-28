<?php

$con = new mysqli('localhost','root','','apirn');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM user";
$result = $con->query($sql);

if($result->num_rows > 0) {
    while($row[] = $result->fetch_assoc()) {
        $item = $row;
        $json = json_encode($item);
    }
}
else {
    $json = json_encode(array());
}

echo '{"user":' .$json . '}';
$con->close();
?>