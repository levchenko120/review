<form action="one_review.php" method="post">
    <h4>Введите id отзыва</h4>
    <input type="text" name="id">
    <br>
    <input type="submit" value="Посмотреть отзыв">
</form>


<?php
$array = $_POST;
if (!empty($array)) {
    $ch = curl_init('http://sobesedovanie/api/v1/one.php');
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
        ?>
        <h1>Отзыв id=<?= $result->answer->id; ?></h1>
        <p>Имя: <?= $result->answer->name?></p>
        <p>Отзыв: <?= $result->answer->review ?></p>
        <p>Дата создания отзыва: <?= $result->answer->date ?></p>
        <p>Рейтинг: <?= $result->answer->rating ?></p>
        <?php
    } else {
        echo 'Непредвиденная ошибка';
    }
}

