<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device $device
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Device'), ['action' => 'edit', $device->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Device'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Devices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Device'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="devices view content">
            <h3><?= h($device->device_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Device Id') ?></th>
                    <td><?= h($device->device_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($device->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($device->created_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Devices') ?></h4>
                <?php if (!empty($device->devices)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Device Id') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($device->devices as $devices) : ?>
                        <tr>
                            <td><?= h($devices->id) ?></td>
                            <td><?= h($devices->device_id) ?></td>
                            <td><?= h($devices->created_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Devices', 'action' => 'view', $devices->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Devices', 'action' => 'edit', $devices->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Devices', 'action' => 'delete', $devices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $devices->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Todos') ?></h4>
                <?php if (!empty($device->todos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Is Done') ?></th>
                            <th><?= __('Device Id') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($device->todos as $todos) : ?>
                        <tr>
                            <td><?= h($todos->id) ?></td>
                            <td><?= h($todos->title) ?></td>
                            <td><?= h($todos->content) ?></td>
                            <td><?= h($todos->is_done) ?></td>
                            <td><?= h($todos->device_id) ?></td>
                            <td><?= h($todos->created_at) ?></td>
                            <td><?= h($todos->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Todos', 'action' => 'view', $todos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Todos', 'action' => 'edit', $todos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Todos', 'action' => 'delete', $todos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
