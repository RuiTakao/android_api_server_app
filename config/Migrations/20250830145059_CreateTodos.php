<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTodos extends AbstractMigration
{
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
        $table->addColumn('device_id', 'string', [
            'limit' => 50,
            'comment' => '端末ID',
        ]);
        $table->addColumn('created_at', 'string', [
            'limit' => 50,
            'comment' => '作成日',
        ]);
        $table->addColumn('updated_at', 'string', [
            'limit' => 50,
            'default' => null,
            'null' => true,
            'comment' => '作成日',
        ]);
        $table->create();
    }
}