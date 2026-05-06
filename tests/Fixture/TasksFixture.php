<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TasksFixture
 */
class TasksFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'comment' => 'Lorem ipsum dolor sit amet',
                'progress_percent' => 1,
                'target_date' => '2026-05-01 01:20:41',
                'device_id' => 1,
                'created_at' => 1777598441,
                'updated_at' => 1777598441,
            ],
        ];
        parent::init();
    }
}
