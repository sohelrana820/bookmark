<?php echo $this->assign('title', 'Forgot Password'); ?>

<div class="login-body">
    <?php echo $this->Form->create('User', ['controller' => 'users', 'action' => 'forgot-password', 'class' => 'login_form']);?>

    <div class="control">
        <?php echo $this->Form->input('username', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Email Address', 'label' => false, 'required' => false]);?>
    </div>

    <div class="login-button text-center">
        <input type="submit" class="btn btn-primary" value="Send Me Email">
    </div>

    <?php echo $this->Form->end();?>
</div>

