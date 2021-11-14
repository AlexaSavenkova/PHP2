<h2>Каталог</h2>

<?php foreach ($catalog as $item) : ?>
    <div>
        <h3><a href="/product/card/?id=<?= $item['id'] ?>"><?= $item['name'] ?></a></h3>
        <p>Цена: <?= $item['price'] ?></p>
        <button class="buy" data-id="<?= $item['id'] ?>">Купить</button>
    </div>
<?php endforeach; ?>
<br>
<a href="/product/catalog/?page=<?= $page ?>">Еще</a>
