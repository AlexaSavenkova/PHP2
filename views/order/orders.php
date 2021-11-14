<h2>Заказы</h2>

<?php foreach ($orders as $item) : ?>
    <div>
        <p>Номер заказа: <?= $item['id'] ?></p>
        <p>Имя: <?= $item['name'] ?></p>
        <p>Телефон: <?= $item['phone'] ?></p>
        <a href="/order/details/?id=<?= $item['id'] ?>">Подробнее</a>
        <br>
        <br>
    </div>
<?php endforeach; ?>
