<h2>Товар</h2>

<div>
    <h3><?= $product->name ?></h3>
    <p><?= $product->description ?></p>
    <p>Цена: <?= $product->price ?></p>
    <button class="buy" data-id= "<?= $product->id ?>">Купить</button>
</div>
