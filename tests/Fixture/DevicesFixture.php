<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DevicesFixture
 */
class DevicesFixture extends TestFixture
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
                'device_id' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2025-08-30 15:14:37',
            ],
        ];
        parent::init();
    }
}
