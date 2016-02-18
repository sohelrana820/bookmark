<div class="resources form large-9 medium-8 columns content">
    <?= $this->Form->create($resource) ?>
    <fieldset>
        <legend><?= __('Add Resource') ?></legend>
        <?php
        echo $this->Form->input('title');
        echo $this->Form->input('url');
        echo $this->Form->input('img');
        echo $this->Form->input('content');
        echo $this->Form->input('boards._ids', ['options' => $boards]);
        echo $this->Form->input('categories._ids', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
