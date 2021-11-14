<?php


use Phinx\Seed\AbstractSeed;

class ShopSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        // отключаем проверку внешних ключей чтобы выполнить TRUNCATE
        $sql = 'SET FOREIGN_KEY_CHECKS = 0';
        $this->adapter->query($sql);

        $sql = 'TRUNCATE orders';
        $this->adapter->query($sql);
        $sql = 'TRUNCATE basket';
        $this->adapter->query($sql);
        $sql = 'TRUNCATE products';
        $this->adapter->query($sql);
        $sql = 'TRUNCATE users';
        $this->adapter->query($sql);
        $sql = 'TRUNCATE feedback';
        $this->adapter->query($sql);

        // после того как все таблицы очистили включаем проверку внешних ключей
        $sql = 'SET FOREIGN_KEY_CHECKS = 1';
        $this->adapter->query($sql);

        $users = [
            [
                'login' => 'admin',
                'pass' => password_hash('123', PASSWORD_DEFAULT),
                'role' => 1,
            ],
            [
                'login' => 'user',
                'pass' => password_hash('456', PASSWORD_DEFAULT),
                'role' => 0,
            ]
        ];
        $this->table('users')->insert($users)->save();

        $products = [
            [
                'name' => 'Пельмени',
                'description' => 'Куриные',
                'price' => '22'
            ],
            [
                'name' => 'Пицца',
                'description' => 'С сыром',
                'price' => '12'
            ],
            [
                'name' => 'Чай',
                'description' => 'Royal Blend',
                'price' => '33'
            ],
            [
                'name' => 'Кофе',
                'description' => 'Lavazza',
                'price' => '50'
            ],
            [
                'name' => 'Сок',
                'description' => 'Вишневый',
                'price' => '45'
            ],
            [
                'name' => 'Пончики',
                'description' => 'Свежие',
                'price' => '34'
            ]
        ];
        $this->table('products')->insert($products)->save();

        $feedback = [
            [
                'name' => 'admin',
                'feedback' => 'some feedback',
            ],
            [
                'name' => 'Вася',
                'feedback' => 'все работает отлично',
            ]
        ];
        $this->table('feedback')->insert($feedback)->save();

    }
}
