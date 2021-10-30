<h2>Корзина</h2>

<?php foreach ($basket as $item):?>
    <div>
        <h3><?=$item['name']?></h3>
        <p>Цена: <?=$item['price']?></p>
        <p>Кол-во: <?=$item['quantity']?></p>
        <button>Удалить</button>
    </div>
<?php endforeach;?>