<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Todo> $todos
 */
?>
<div class="todos index content">
    <?= $this->Html->link(__('New Todo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Todos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('is_done') ?></th>
                    <th><?= $this->Paginator->sort('device_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todos as $todo): ?>
                <tr>
                    <td><?= $this->Number->format($todo->id) ?></td>
                    <td><?= h($todo->title) ?></td>
                    <td><?= h($todo->is_done) ?></td>
                    <td><?= $todo->has('device') ? $this->Html->link($todo->device->device_id, ['controller' => 'Devices', 'action' => 'view', $todo->device->id]) : '' ?></td>
                    <td><?= h($todo->created_at) ?></td>
                    <td><?= h($todo->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $todo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $todo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $todo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todo->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
