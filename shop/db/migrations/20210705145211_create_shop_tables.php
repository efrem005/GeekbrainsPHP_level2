<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Phinx\Util\Literal;

final class CreateShopTables extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */

    // vendor/bin/phinx migrate -e development
    public function change(): void
    {
        $this->table('category')
            ->addColumn('name', 'string', [
                'limit' => 255
            ])
            ->create();

        $this->table('product')
            ->addColumn('title', 'string', [
                'limit' => 255
            ])
            ->addColumn('article', 'biginteger', [
                'signed' => false,
                'default' => 0
            ])
            ->addColumn('description', 'text')
            ->addColumn('price', 'biginteger')
            ->addColumn('weight', 'string', [
                'limit' => 20,
                'default' => '0'
            ])
            ->addColumn('count', 'biginteger')
            ->addColumn('units', 'text')
            ->addColumn('category_id', 'integer', [
                'default' => 6
            ])
            ->addColumn('image', 'text', [
                'null' => true
            ])
            ->addColumn('created_at', 'datetime', [
                'null' => true,
                'timezone' => true,
                'default' => Literal::from('now()')
            ])
            ->addForeignKey(['category_id'], 'category', ['id'], [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->create();

        $this->table('users')
            ->addColumn('login', 'string', [
                'limit' => 100
            ])
            ->addColumn('pass', 'string', [
                'limit' => 100
            ])
            ->addColumn('fast_name', 'text')
            ->addColumn('hash', 'text', [
                'null' => true,
                'signed' => false
            ])
            ->addColumn('role', 'integer', [
                'null' => true,
                'default' => 0
            ])
            ->create();

        $this->table('basket')
            ->addColumn('user_id', 'integer', [
                'null' => true
            ])
            ->addColumn('product_id', 'integer')
            ->addColumn('count', 'integer')
            ->addColumn('price', 'integer')
            ->addColumn('session_id', 'text')
            ->addForeignKey(['user_id'], 'users', ['id'], [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey(['product_id'], 'product', ['id'], [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->create();

        $this->table('reviews')
            ->addColumn('user', 'string')
            ->addColumn('text', 'text')
            ->addColumn('product_id', 'integer')
            ->addColumn('created_at', 'datetime', [
                'null' => true,
                'timezone' => true,
                'default' => Literal::from('now()')
            ])
            ->addForeignKey(['product_id'], 'product', ['id'], [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->create();

        $this->table('orders')
            ->addColumn('name', 'text', [
                'null' => true
            ])
            ->addColumn('phone', 'text')
            ->addColumn('price', 'integer')
            ->addColumn('session_id', 'text')
            ->addColumn('status', 'string', [
                'null' => true,
                'limit' => 50,
                'default' => 'в обработке'
            ])
            ->addColumn('created_at', 'datetime', [
                'null' => true,
                'timezone' => true,
                'default' => Literal::from('now()')
            ])
            ->create();
    }
}
