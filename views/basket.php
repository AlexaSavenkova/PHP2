<h2>Корзина</h2>
<?php if ($count === 0) : ?>
    <div>Корзина пуста</div>
<?php else : ?>
    <?php foreach ($basket as $item) : ?>
        <div id="div<?= $item['basket_id'] ?>">
            <h3><?= $item['name'] ?></h3>
            <p>Цена: <?= $item['price'] ?></p>
            <p>Кол-во: <span id="<?= $item['basket_id'] ?>"><?= $item['quantity'] ?></span></p>
            <button class="delete" data-id="<?= $item['basket_id'] ?>">Удалить</button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<div id="empty"></div>