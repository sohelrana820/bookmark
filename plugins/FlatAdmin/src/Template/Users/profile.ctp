<?php echo $this->assign('title', 'My Profile'); ?>

<div class="page-title">
    <span class="title">My Profile</span>
    <div class="description">All information of your profile</div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <?php
                    echo $this->Html->link('My Profile', ['controller' => 'users', 'action' => 'profile'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);

                    echo $this->Html->link('Update Profile', ['controller' => 'users', 'action' => 'update'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);

                    echo $this->Html->link('Change Password', ['controller' => 'users', 'action' => 'update'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);
                    ?>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <?php echo $this->element('profile_photo');?>
                    </div>
                    <!-- edit form column -->
                    <div class="col-md-9 col-sm-6 col-xs-12 personal-info">
                        <ul class="data-list data-list-stripe">
                            <li><strong>Name: </strong> <?php echo $user->profile->name;?></li>
                            <li><strong>Email: </strong> <?php echo $user->username;?></li>
                            <li>
                                <strong>Phone: </strong>
                                <?php
                                if($user->profile->phone){
                                    echo $user->profile->phone;
                                }
                                else{
                                    echo 'N/A';
                                }
                                ?>
                            </li>
                            <li>
                                <strong>Fax: </strong>
                                <?php
                                if($user->profile->fax){
                                    echo $user->profile->fax;
                                }
                                else{
                                    echo 'N/A';
                                }
                                ?>
                            </li>
                            <li>
                                <strong>Birthday: </strong>
                                <?php
                                if($user->profile->birthday){
                                    echo $this->Time->format($user->profile->birthday, 'dd/MM/Y');
                                }
                                else{
                                    echo 'N/A';
                                }
                                ?>
                            </li>
                            <li>
                                <strong>Gendar: </strong>
                                <?php
                                if($user->profile->gender == 1){
                                    echo 'Male (<i class="fa fa-male green"></i>)';
                                }
                                else{
                                    echo 'Female (<i class="fa fa-female rose"></i>)';
                                }
                                ?>
                            </li>
                            <li>
                                <strong>Street 1: </strong>
                                <?php
                                if($user->profile->street_1){
                                    echo $user->profile->street_1;
                                }
                                else{
                                    echo 'N/A';
                                }
                                ?>
                            </li>
                            <li>
                                <strong>Street 2: </strong>
                                <?php
                                if($user->profile->street_2){
                                    echo $user->profile->street_2;
                                }
                                else{
                                    echo 'N/A';
                                }
                                ?>
                            </li>
                            <li>
                                <strong>City: </strong>
                                <?php
                                if($user->profile->city){
                                    echo $user->profile->street_2;
                                }
                                else{
                                    echo 'N/A';
                                }
                                ?>
                            </li>
                            <li>
                                <strong>State: </strong>
                                <?php
                                if($user->profile->state){
                                    echo $user->profile->state;
                                }
                                else{
                                    echo 'N/A';
                                }
                                ?>
                            </li>
                            <li>
                                <strong>Postal Code: </strong>
                                <?php
                                if($user->profile->postal_code){
                                    echo $user->profile->postal_code;
                                }
                                else{
                                    echo 'N/A';
                                }
                                ?>
                            </li>
                            <li>
                                <strong>Country: </strong>
                                <?php
                                if($user->profile->country){
                                    echo $user->profile->country;
                                }
                                else{
                                    echo 'N/A';
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
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