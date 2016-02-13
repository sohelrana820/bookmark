<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Resources'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resources form large-9 medium-8 columns content">
    <?= $this->Form->create($resource) ?>
    <fieldset>
        <legend><?= __('Add Resource') ?></legend>
        <?php
            echo $this->Form->input('uuid');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('status');
            echo $this->Form->input('title');
            echo $this->Form->input('url');
            echo $this->Form->input('image');
            echo $this->Form->input('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
