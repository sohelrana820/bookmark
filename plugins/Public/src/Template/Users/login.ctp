<div class="login-widget">
    <div style="text-align: center; ">
        <?php
        echo $this->Html->image('logo_black.png',
            array(
                'url' => array('controller' => 'users', 'action' => 'login'),
                'class' => 'logo')
        );
        ?>
    </div>
    <br>
    <?php
    echo $this->Form->create('Users',
        array(
            'controller' => 'users',
            'action' => 'login',
            'class' => 'login_form'
        )
    );
    ?>
    <div class="form-group">
        <label class="text-info">Email</label>
        <?php
        echo $this->Form->input('email',
            array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Email Address',
                'label' => false,
                'required' => true
            )
        );
        ?>
    </div>
    <div class="form-group">
        <label class="text-info">Password</label>
        <?php
        echo $this->Form->input('password2',
            array(
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Password',
                'label' => false,
                'required' => true

            )
        );
        ?>
    </div>
    <button type="submit" class="btn btn-primary login-button">Signin</button>
    <span class="pull-right message text-right">
        <?php echo $this->Html->link('Forgot password?', 'https://client.miteksoftware.com/pwreset.php'); ?>
     </span>
    <?php echo $this->Form->end(); ?>
</div>
