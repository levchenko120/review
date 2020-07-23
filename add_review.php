<?php
if (isset($_POST['all_review'])) {
    header('Location: http://sobesedovanie/paginator.php');
    exit;
}
if (isset($_POST['one_review'])) {
    header('Location: http://sobesedovanie/one_review.php');
    exit;
}
?>
<form action="add_review.php" method="post">
    <h4>Введите ваше имя</h4>
    <input type="text" name="name">
    <br>
    <textarea placeholder="Отзыв" name="review" rows="10" cols="45"></textarea>
    <br>
    <h4>Укажите текущую дату и время</h4>
    <input type="datetime-local" name="date">
    <br>
    <h4>Оценка</h4>
    <p><input name='rating' type="radio" value="1">1</p>
    <p><input name='rating' type="radio" value="2">2</p>
    <p><input name='rating' type="radio" value="3">3</p>
    <p><input name='rating' type="radio" value="4">4</p>
    <p><input name='rating' type="radio" value="5">5</p>
    <pre>
    <input type="submit" value="Оставить отзыв">
    <pre>
    <input type="submit" value="Посмотреть все отзывы" name="all_review">
    <pre>
    <input type="submit" value="Посмотреть отзыв выборочно" name="one_review">
</form>

<?php
$array = $_POST;
if (!empty($array)) {
    $ch = curl_init('http://sobesedovanie/api/v1/add.php');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $html = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($html);
    if ($result->answer != 'ERROR') {
        echo 'Отзыв добавлен ID - '.$result->answer->id;
    } else {
        echo 'Непредвиденная ошибка';
    }
}
