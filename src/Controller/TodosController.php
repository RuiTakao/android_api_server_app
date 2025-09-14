<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Log\Log;

/**
 * Todos Controller
 *
 * @property \App\Model\Table\TodosTable $Todos
 * @method \App\Model\Entity\Todo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TodosController extends AppController
{
    // TODO: 名前修正
    public function todos()
    {
        $data = $this->Todos->find()
            ->select([
                'id',
                'title',
                'content',
                'done' => 'is_done',
                'deviceId' => 'device_id',
                'createdAt' => 'created_at'
            ])
            ->orderDesc("created_at");

        $this->response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($data, JSON_UNESCAPED_UNICODE));

        return $this->response;
    }

    public function todo($id)
    {
        Log::debug(print_r($id, true));

        $data = $this->Todos->find()
            ->select([
                'id',
                'title',
                'content',
                'done' => 'is_done',
                'deviceId' => 'device_id',
                'createdAt' => 'created_at'
            ])
            ->where(["id" => $id])
            ->first();

        // Log::debug(print_r($data[1], true));
        // $data = $data;

        $this->response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($data, JSON_UNESCAPED_UNICODE));

        return $this->response;
    }

    public function create()
    {
        $this->autoRender = false;

        $this->request->allowMethod(['post', 'patch']);

        $todo = $this->Todos->newEmptyEntity();
        Log::debug(print_r($this->request->getData(), true));
        $datas = [
            'title' => $this->request->getData("title"),
            'content' => $this->request->getData("content"),
            'done' => false,
            'device_id' => $this->request->getData("deviceId"),
            'created_at' => $this->request->getData("createdAt"),
            'updated_at' => $this->request->getData("createdAt")
        ];
        Log::debug(print_r($datas, true));
        $todo = $this->Todos->patchEntity($todo, $datas);
        $this->Todos->save($todo);
        $todo->getErrors();
    }
}
