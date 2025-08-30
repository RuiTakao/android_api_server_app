<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateDevices extends AbstractMigration
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
        $table = $this->table('devices', [
            'comment' => '端末IDテーブル',
        ]);
        $table->addColumn('device_id', 'string', [
            'limit' => 50,
            'comment' => '端末ID',
        ]);
        $table->addColumn('created_at', 'datetime');
        $table->create();
    }
}
