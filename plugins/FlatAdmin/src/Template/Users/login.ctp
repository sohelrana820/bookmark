<?php echo $this->assign('title', 'Login'); ?>

<div class="login-body">
    <?php echo $this->Form->create('User', ['controller' => 'users', 'action' => 'login']);?>
        <div class="control">
            <?php echo $this->Form->input('username', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Email Address', 'label' => false, 'required' => false]);?>
        </div>
        <div class="control">
            <?php echo $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'required' => false]);?>
        </div>
        <div class="login-button text-center">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
    <?php echo $this->Form->end();?>
</div>

<div class="login-footer">
    <span class="text-right color-white">
        Don't have account
        <?php echo $this->Html->link('click here to create account', ['controller' => 'users', 'action' => 'signup']);?>
        <br/>
        <?php echo $this->Html->link('Forgot password', ['controller' => 'users', 'action' => 'forgot_password']);?>
    </span>
</div>
