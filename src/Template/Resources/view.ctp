<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Resource'), ['action' => 'edit', $resource->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Resource'), ['action' => 'delete', $resource->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resource->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Resources'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Resource'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Boards'), ['controller' => 'Boards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Board'), ['controller' => 'Boards', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="resources view large-9 medium-8 columns content">
    <h3><?= h($resource->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Uuid') ?></th>
            <td><?= h($resource->uuid) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $resource->has('user') ? $this->Html->link($resource->user->id, ['controller' => 'Users', 'action' => 'view', $resource->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($resource->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Url') ?></th>
            <td><?= h($resource->url) ?></td>
        </tr>
        <tr>
            <th><?= __('Img') ?></th>
            <td><?= h($resource->img) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($resource->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($resource->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($resource->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($resource->modified) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($resource->content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Boards') ?></h4>
        <?php if (!empty($resource->boards)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Uuid') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($resource->boards as $boards): ?>
            <tr>
                <td><?= h($boards->id) ?></td>
                <td><?= h($boards->uuid) ?></td>
                <td><?= h($boards->user_id) ?></td>
                <td><?= h($boards->name) ?></td>
                <td><?= h($boards->description) ?></td>
                <td><?= h($boards->status) ?></td>
                <td><?= h($boards->created) ?></td>
                <td><?= h($boards->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Boards', 'action' => 'view', $boards->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Boards', 'action' => 'edit', $boards->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Boards', 'action' => 'delete', $boards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boards->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Categories') ?></h4>
        <?php if (!empty($resource->categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($resource->categories as $categories): ?>
            <tr>
                <td><?= h($categories->id) ?></td>
                <td><?= h($categories->user_id) ?></td>
                <td><?= h($categories->parent_id) ?></td>
                <td><?= h($categories->lft) ?></td>
                <td><?= h($categories->rght) ?></td>
                <td><?= h($categories->name) ?></td>
                <td><?= h($categories->slug) ?></td>
                <td><?= h($categories->status) ?></td>
                <td><?= h($categories->created) ?></td>
                <td><?= h($categories->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $categories->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $categories->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categories->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
