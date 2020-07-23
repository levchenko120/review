<?php
require_once 'database.php';
$countView = 10; // количество материалов на странице
// номер страницы
if(isset($_GET['page'])){
    $pageNum = (int)$_GET['page'];
}else{
    $pageNum = 1;
}
$startIndex = ($pageNum-1)*$countView; // с какой записи начать выборку
// запрос к бд
$link = mysqli_connect($_DBhost, $_DBuser, $_DBpassword, $_DBdatabase);
$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `otzovik` LIMIT $startIndex, $countView";
$query = mysqli_query($link, $sql);
$ReviewData = array();
while($result = mysqli_fetch_assoc($query)) {
    $ReviewData[] = $result;
}
// получение полного количества новостей
$query2 = mysqli_query($link,"SELECT FOUND_ROWS()");
$result2 = mysqli_fetch_array($query2);
$countAllReview = $result2["FOUND_ROWS()"];
// номер последней страницы
$lastPage = ceil($countAllReview/$countView);
?>
<style>
    #work_area{
        width: 800px;
        margin: 1% auto;
    }
    #work_area li{
        display: inline;
        font-size: 14px;
        margin-right: 10px;
    }
    #work_area .current{
        border: 1px dotted;
        font-size: 18px;
        padding: 3px;
    }
</style>

<div id="work_area">
    <!-- вывод новостей -->
    <?php foreach($ReviewData as $value){ ?>
        <div class="one_news">
            <h1>Отзыв id=<?= $value['id']; ?></h1>
            <p>Имя: <?= $value['name'];?></p>
            <p>Отзыв: <?= $value['review']; ?></p>
            <p>Дата создания отзыва: <?=$value['date']; ?></p>
            <p>Рейтинг: <?= $value['rating']; ?></p>
            <hr/>
        </div>
    <?php } ?>
    <br/>
    <!-- вывод пагинатора -->
    <ul>
        <?php if($pageNum > 1) { ?>
            <li><a href="/paginator.php?page=1">&lt;&lt;</a></li>
            <li><a href="/paginator.php?page=<?=$pageNum-1;?>">&lt;</a></li>
        <?php } ?>

        <?php for($i = 1; $i<=$lastPage; $i++) { ?>
            <li <?=($i == $pageNum) ? 'class="current"' : '';?>> <a href="/paginator.php?page=<?=$i;?>"><?=$i;?></a> </li>
        <?php } ?>

        <?php if($pageNum < $lastPage) { ?>
            <li><a href="/paginator.php?page=<?=$pageNum+1;?>">&gt;</a></li>
            <li><a href="/paginator.php?page=<?=$lastPage;?>">&gt;&gt;</a></li>
        <?php } ?>
    </ul>
</div>
