<?php echo $this->assign('title', 'Signup'); ?>

<div class="login-body">
    <?php echo $this->Form->create($user, array('controller' => 'users', 'action' => 'signup', 'class' => 'login_form'));?>

    <div class="control">
        <?php echo $this->Form->input('profile.first_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'First name', 'label' => false, 'required' => false]);?>
    </div>

    <div class="control">
        <?php echo $this->Form->input('profile.last_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Last name', 'label' => false, 'required' => false]);?>
    </div>

    <div class="control">
        <?php echo $this->Form->input('username', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Email Address', 'label' => false, 'required' => false]);?>
    </div>

    <div class="control">
        <?php echo $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'required' => false]);?>
    </div>

    <div class="control">
        <?php echo $this->Form->input('cPassword', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm password', 'label' => false, 'required' => false]);?>
    </div>

    <div class="login-button text-center">
        <input type="submit" class="btn btn-primary" value="Signup">
    </div>

    <?php echo $this->Form->end();?>
</div>


<div class="login-footer">
    <span class="text-right color-white">
         Already have account
        <?php echo $this->Html->link('click here to signin', ['controller' => 'users', 'action' => 'login']);?>
    </span>
</div>

