<h2>Заказ № <?= $order->id ?></h2>

<div>
    <p>Имя: <?= $order->name ?>, Телефон: <?= $order->phone ?> </p>
    <hr>
    <?php foreach ($basket as $item) : ?>
        <div>
            <p><?= $item['name'] ?>, <?= $item['description'] ?> <br>
            Цена: <?= $item['price'] ?>   Кол-во: <?= $item['quantity'] ?></p>

        </div>
    <?php endforeach; ?>
    <button>Редактировать</button>
</div>