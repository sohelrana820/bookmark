<?php echo $this->assign('title', 'New User'); ?>
<div>
    <div>
        <h1 class="header pull-left">Boards Details</h1>
    </div>
    <div class="clearfix"></div>
    <hr class="divider"/>
    <br/>

    <div class="row">
        <div class="col-lg-12">
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

        </div>
    </div>
</div>

<?php
$this->start('cssTop');
$this->end();
?>

<?php
$this->start('jsBottom');
$this->end();
?>



