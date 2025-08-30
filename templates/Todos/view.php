<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Todo $todo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Todo'), ['action' => 'edit', $todo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Todo'), ['action' => 'delete', $todo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Todos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Todo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="todos view content">
            <h3><?= h($todo->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($todo->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Device') ?></th>
                    <td><?= $todo->has('device') ? $this->Html->link($todo->device->device_id, ['controller' => 'Devices', 'action' => 'view', $todo->device->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($todo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($todo->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($todo->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Done') ?></th>
                    <td><?= $todo->is_done ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($todo->content)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
