<h2>Отзывы</h2>

<form action="/?c=feedback&a=add" method="post">
    Оставьте отзыв: <br>
    <input type="text" name="name" placeholder="Ваше имя"><br>
    <input type="text" name="feedback" placeholder="Ваш отзыв"><br>
    <input type="submit" value="Добавить">
</form>
<br><br>

<?php foreach ($feedback as $value) : ?>
    <div><strong><?= $value['name'] ?></strong>: <?= $value['feedback'] ?></div>
<?php endforeach; ?>