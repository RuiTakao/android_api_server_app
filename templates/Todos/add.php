<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Todo $todo
 * @var \Cake\Collection\CollectionInterface|string[] $devices
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Todos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="todos form content">
            <?= $this->Form->create($todo) ?>
            <fieldset>
                <legend><?= __('Add Todo') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('content');
                    echo $this->Form->control('is_done');
                    echo $this->Form->control('device_id', ['options' => $devices]);
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
