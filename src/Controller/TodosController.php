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
            'title' => $this->request->getData("title"),
            'content' => $this->request->getData("content"),
            'done' => false,
            'device_id' => $this->request->getData("deviceId"),
            'created_at' => $this->request->getData("createdAt"),
            'updated_at' => $this->request->getData("createdAt")
        ];
        Log::debug(print_r($data, true));
        $todo = $this->Todos->patchEntity($todo, $data);
        $this->Todos->save($todo);
        $todo->getErrors();
    }

    public function update($id)
    {
        $this->autoRender = false;

        $this->request->allowMethod(['put', 'patch']);

        Log::debug(print_r($this->request->getData(), true));

        $todo = $this->Todos->find()
            ->where([
                "id" => $id,
                "device_id" => $this->request->getData("deviceId")
            ])
            ->first();
        $todo->set('title', $this->request->getData('title'));
        $todo->set('content', $this->request->getData('content'));
        $todo->set('updated_at', $this->request->getData('updatedAt'));
        Log::debug(print_r($todo, true));
        $this->Todos->save($todo);
    }

    public function delete($id)
    {
        $this->autoRender = false;

        $this->request->allowMethod(['delete']);

        Log::debug(print_r($this->request->getQuery(), true));

        $todo = $this->Todos->find()
            ->where([
                "id" => $id
            ])
            ->first();
        Log::debug(print_r($todo, true));
        $this->Todos->delete($todo);
    }

    public function updateDone($id)
    {
        $this->autoRender = false;

        $this->request->allowMethod(['put', 'patch']);

        Log::debug(print_r($this->request->getData(), true));
        $todo = $this->Todos->find()
            ->where([
                "id" => $id
            ])
            ->first();
        $todo->set('is_done', $this->request->getData('done'));

        Log::debug(print_r($todo, true));
        $this->Todos->save($todo);
    }
}