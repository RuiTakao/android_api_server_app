<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Device;
use Cake\I18n\FrozenTime;
use Cake\Log\Log;

/**
 * Devices Controller
 *
 * @property \App\Model\Table\DevicesTable $Devices
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DevicesController extends AppController
{
    public function post()
    {
        $this->autoRender = false;

        $this->request->allowMethod(['post', 'patch']);

        $device = $this->Devices->newEmptyEntity();
        $data = [
            'device_id' => $this->request->getData('deviceId'),
            'device_name' => $this->request->getData('deviceName'),
            'created_at' => date('Y/m/d H:i:s'),
        ];

        $errors = $device->getErrors();
        if ($this->request->is('post')) {
            $device = $this->Devices->patchEntity($device, $data);
            $ret = $this->Devices->save($device);
        }
    }
}