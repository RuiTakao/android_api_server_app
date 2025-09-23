<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateDevices extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('devices', [
            'comment' => '端末IDテーブル',
        ]);
        $table->addColumn('device_id', 'string', [
            'limit' => 50,
            'comment' => '端末ID',
        ]);
        $table->addColumn('device_name', 'string', [
            'limit' => 50,
            'comment' => '端末名',
        ]);
        $table->addColumn('created_at', 'string', [
            'limit' => 50,
            'comment' => '作成日',
        ]);
        $table->create();
    }
}