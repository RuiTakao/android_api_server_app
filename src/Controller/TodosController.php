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

    public function todoList()
    {
        $device_id = $this->request->getQuery("deviceId");
        Log::debug("TodosController [todoList] device_id : " . print_r($device_id, true));

        $data = $this->Todos->find()
            ->select([
                'id',
                'title',
                'content',
                'done' => 'is_done',
                'deviceId' => 'device_id',
                'createdAt' => 'created_at'
            ])
            ->where(["device_id" => $device_id])
            ->orderDesc("created_at");

        Log::debug("TodosController [todoList] data : " . print_r($data, true));
        Log::debug("TodosController [todoList] data : " . print_r(json_encode($data, JSON_UNESCAPED_UNICODE), true));

        $this->response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($data, JSON_UNESCAPED_UNICODE));

        return $this->response;
    }

    public function todo($id)
    {
        Log::debug(print_r($id, true));
        Log::debug(print_r($this->request->getQuery("deviceId"), true));

        $data = $this->Todos->find()
            ->select([
                'id',
                'title',
                'content',
                'done' => 'is_done',
                'deviceId' => 'device_id',
                'createdAt' => 'created_at'
            ])
            ->where([
                "id" => $id,
                "device_id" => $this->request->getQuery("deviceId")
            ])
            ->first();

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
        $data = [
            'title' => $this->request->getData("todo.title"),
            'content' => $this->request->getData("todo.content"),
            'done' => false,
            'device_id' => $this->request->getData("deviceId"),
            'created_at' => $this->request->getData("todo.createdAt"),
            'updated_at' => $this->request->getData("todo.createdAt")
        ];
        Log::debug(print_r($data, true));
        $todo = $this->Todos->patchEntity($todo, $data);
        $this->Todos->save($todo);
        $todo->getErrors();
    }
}
