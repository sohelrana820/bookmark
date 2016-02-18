<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Board'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Resources'), ['controller' => 'Resources', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Resource'), ['controller' => 'Resources', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="boards index large-9 medium-8 columns content">
    <h3><?= __('Boards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('uuid') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($boards as $board): ?>
            <tr>
                <td><?= $this->Number->format($board->id) ?></td>
                <td><?= h($board->uuid) ?></td>
                <td><?= $board->has('user') ? $this->Html->link($board->user->id, ['controller' => 'Users', 'action' => 'view', $board->user->id]) : '' ?></td>
                <td><?= h($board->name) ?></td>
                <td><?= $this->Number->format($board->status) ?></td>
                <td><?= h($board->created) ?></td>
                <td><?= h($board->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $board->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $board->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $board->id], ['confirm' => __('Are you sure you want to delete # {0}?', $board->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
