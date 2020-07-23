<?php
require_once '../../database.php';
$link = mysqli_connect($_DBhost, $_DBuser, $_DBpassword, $_DBdatabase);
$query = "SELECT * FROM otzovik";
$result = mysqli_query($link, $query);
$arr=[];
while ($mysql=mysqli_fetch_assoc($result)) {
    $arr[]=$mysql;
}
mysqli_close($link);
header('Content-type: application/json');
echo json_encode($arr);