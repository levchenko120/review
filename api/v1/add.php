<?php
require_once '../../database.php';
function validate($array)
{
    $error = [];
    $result = [];
    foreach ($array as $key => $value) {
        $value = htmlspecialchars(trim($value));
        $array[$key] = $value;
        switch ($key) {
            case 'name':
                if (strlen($value) > 50) {
                    $error['lenght'][$key] = strlen($value);
                }
                break;
            case 'review' :
                if (strlen($value) > 1000) {
                    $error['lenght'][$key] = strlen($value);
                }
                break;
            case 'date':
                $date = new DateTime($value);
                $array[$key] = $date->format('Y-m-d H:i:s');
                break;
            case 'rating':
                if ($value < 1 and $value > 5 and !is_int($value)) {
                    $error['valid'][$key] = $value;
                }
                break;
            default:
                $error[$key]='valid_form';
        }
    }
    if (empty($array['name']) or empty($array['review'])) {
        $error['required'] = true;
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
    $query = "INSERT INTO otzovik (name, review, date, rating) VALUES ('{$data['answer']['name']}', '{$data['answer']['review']}','{$data['answer']['date']}','{$data['answer']['rating']}')";
    mysqli_query($link, $query);

    $query_select = "SELECT max(id) as id FROM otzovik";
    $result = mysqli_query($link, $query_select);
    mysqli_close($link);
    $return = mysqli_fetch_assoc($result);
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