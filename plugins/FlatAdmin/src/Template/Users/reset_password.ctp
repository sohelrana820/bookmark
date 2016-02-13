<?php echo $this->assign('title', 'Reset Password'); ?>

<div class="login-body">
    <?php echo $this->Form->create($user, ['class' => 'login_form']);?>
    
    <div class="control">
        <?php echo $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'required' => false]);?>
    </div>
    
    <div class="control">
        <?php echo $this->Form->input('cPassword', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm password', 'label' => false, 'required' => false]);?>
    </div>

    <div class="login-button text-center">
        <input type="submit" class="btn btn-primary" value="Reset Password">
    </div>

    <?php echo $this->Form->end();?>
</div>
