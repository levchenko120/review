<?php
require_once '../../database.php';
function validate($array)
{
    $error = [];
    $result = [];
    foreach ($array as $key => $value) {
        $value = htmlspecialchars(trim($value));
        $array[$key] = $value;
        if ($key!='id' and !is_int($value)) {
            $error[$key]='valid_form';
        }
    }
    $result = [
        'answer' => $array,
        'error' => $error
    ];
    return $result;
}

$data = validate($_POST);
if (empty($data['error'])) {
    $link = mysqli_connect($_DBhost, $_DBuser, $_DBpassword, $_DBdatabase);
    $query = "SELECT * FROM otzovik WHERE id='{$data['answer']['id']}'";
    $result = mysqli_query($link, $query);
    $return=mysqli_fetch_assoc($result);
    mysqli_close($link);
} else {
    $return = 'ERROR';
}
$result = [
    'data' => $data['answer'],
    'error' => $data['error'],
    'answer' => $return
];
header('Content-type: application/json');
echo json_encode($result);