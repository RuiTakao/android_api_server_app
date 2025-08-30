<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTodos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('todos', [
            'comment' => 'やることリストテーブル',
        ]);
        $table->addColumn('title', 'string', [
            'limit' => 50,
            'comment' => 'タイトル',

        ]);
        $table->addColumn('content', 'text', [
            'limit' => 255,
            'comment' => '内容',

        ]);
        $table->addColumn('is_done', 'boolean', [
            'default' => 0,
            'comment' => '完了時のチェックフラグ',

        ]);
        $table->addColumn('device_id', 'integer', [
            'limit' => 50,
            'comment' => '端末ID',
        ]);
        $table->addColumn('created_at', 'datetime');
        $table->addColumn('updated_at', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->create();
    }
}
