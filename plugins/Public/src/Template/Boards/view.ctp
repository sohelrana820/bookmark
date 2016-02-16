<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Board'), ['action' => 'edit', $board->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Board'), ['action' => 'delete', $board->id], ['confirm' => __('Are you sure you want to delete # {0}?', $board->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Boards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Board'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="boards view large-9 medium-8 columns content">
    <h3><?= h($board->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Uuid') ?></th>
            <td><?= h($board->uuid) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $board->has('user') ? $this->Html->link($board->user->id, ['controller' => 'Users', 'action' => 'view', $board->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($board->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($board->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($board->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($board->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($board->modified) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($board->description)); ?>
    </div>
</div>
