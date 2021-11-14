<?php
use app\engine\Db;
use app\engine\Request;
use app\engine\Render;
use app\engine\TwigRender;
use app\models\repositories\BasketRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;
use app\models\repositories\FeedbackRepository;
use app\models\repositories\OrderRepository;

return [
    'root' => dirname(__DIR__),
    'controllers_namespaces' => 'app\\controllers\\',
    'product_per_page' => 4,
    'views_dir' => dirname(__DIR__) . "/views/",
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'shop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'render' => [
            'class' => Render::class
        ],
        'twigRender' => [
            'class' => TwigRender::class
        ],
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'usersRepository' => [
            'class' => UserRepository::class
        ],
        'feedbackRepository' => [
            'class' => FeedbackRepository::class
        ],
        'orderRepository' => [
            'class' => OrderRepository::class
        ]
    ]

];