<?php echo $this->assign('title', 'New User'); ?>

<div class="page-title">
    <span class="title">New User</span>
    <div class="description">Provide all information for adding  new user</div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <?php
                    echo $this->Html->link('Users List', ['controller' => 'users', 'action' => 'index'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);
                    ?>
                </div>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create($user, array('controller' => 'users', 'action' => 'add'));?>
                <form>

                    <div class="form-group">
                        <label>First name</label>
                        <?php echo $this->Form->input('profile.first_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'First name', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Last name</label>
                        <?php echo $this->Form->input('profile.last_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Last name', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <br/>
                        <div class="radio3 radio-check radio-success radio-inline">
                            <input type="radio" id="radio5" name="profile[gender]" id="optionsRadios2" value="1" style="position: absolute; opacity: 0;">
                            <label for="radio5">
                                Male
                            </label>
                        </div>
                        <div class="radio3 radio-check radio-success radio-inline">
                            <input type="radio" id="radio6" name="profile[gender]" id="optionsRadios2" value="2" style="position: absolute; opacity: 0;">
                            <label for="radio6">
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Date of Birth</label>
                        <div class="input-group">
                            <input name="profile[birthday]" type="text" class="form-control datepicker" placeholder="Date of birth">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email address</label>
                        <?php echo $this->Form->input('username', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Email address', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Phone number</label>
                        <?php echo $this->Form->input('profile.phone', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Phone number', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Fax</label>
                        <?php echo $this->Form->input('profile.fax', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Fax', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Street 1</label>
                        <?php echo $this->Form->input('profile.street_1', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Street 1', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Street 2</label>
                        <?php echo $this->Form->input('profile.street_2', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Street 2', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Country</label>
                        <select id="country" name="profile[country]" class="form-control select2-form-control" >
                            <option value="">Choose country</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>State</label>
                        <select name="profile[state]" id="state" class="form-control select2-form-control">
                            <option value="" hidden>Choose state</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <?php echo $this->Form->input('profile.city', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'City', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Postal Code</label>
                        <?php echo $this->Form->input('profile.postal_code', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Postal Code', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <?php echo $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Confirm password</label>
                        <?php echo $this->Form->input('cPassword', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm password', 'label' => false, 'required' => false]);?>
                    </div>

                    <button type="submit" class="btn btn-primary">Save User</button>
                    <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>



<?php
$this->start('cssTop');
echo $this->Html->css(array('select2.min', 'datepicker','all'));
$this->end();

$this->start('jsTop');
echo $this->Html->script(array('country'));
$this->end();

$this->start('jsBottom');
echo $this->Html->script(['select2.full.min', 'datepicker']);
?>

<script language="javascript">
    populateCountries("country", "state");
</script>

<?php $this->end(); ?>