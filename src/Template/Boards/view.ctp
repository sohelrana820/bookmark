<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Board'), ['action' => 'edit', $board->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Board'), ['action' => 'delete', $board->id], ['confirm' => __('Are you sure you want to delete # {0}?', $board->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Boards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Board'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Resources'), ['controller' => 'Resources', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Resource'), ['controller' => 'Resources', 'action' => 'add']) ?> </li>
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
    <div class="related">
        <h4><?= __('Related Resources') ?></h4>
        <?php if (!empty($board->resources)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Uuid') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Img') ?></th>
                <th><?= __('Content') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($board->resources as $resources): ?>
            <tr>
                <td><?= h($resources->id) ?></td>
                <td><?= h($resources->uuid) ?></td>
                <td><?= h($resources->user_id) ?></td>
                <td><?= h($resources->status) ?></td>
                <td><?= h($resources->title) ?></td>
                <td><?= h($resources->url) ?></td>
                <td><?= h($resources->img) ?></td>
                <td><?= h($resources->content) ?></td>
                <td><?= h($resources->created) ?></td>
                <td><?= h($resources->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Resources', 'action' => 'view', $resources->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Resources', 'action' => 'edit', $resources->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Resources', 'action' => 'delete', $resources->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resources->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
