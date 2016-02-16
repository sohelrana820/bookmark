<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="http://img.izismile.com/img/img6/20131220/640/cute_girls_make_the_days_so_much_brighter_640_57.jpg" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $user['fullname'];?>
                    </div>
                    <div class="profile-usertitle-job">
                        Client
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Edit Profile</button>
                    <button type="button" class="btn btn-danger btn-sm">Change Photo</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-ok"></i>
                                Tasks </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <h4 class="bold-title theme-color">General Information</h4>
                <ul class="profile-nav">
                    <li><strong>Name: </strong> <a class="theme-color"><?php echo $user['fullname'];?></a></li>
                    <li><strong>Email: </strong> <a class="theme-color"><?php echo $user['email'];?></a></li>
                    <li><strong>Phone: </strong> <?php echo $user['phonenumber'];?></li>
                    <li>
                        <strong>Street: </strong>
                        <?php
                        if($user['address1'])
                        {
                            echo $user['address1'];
                        }
                        elseif($user['address2'])
                        {
                            echo $user['address2'];
                        }
                        else{
                            echo 'N/A';
                        }
                        ?>
                    </li>
                    <li>
                        <strong>City: </strong>
                        <?php
                        if($user['city'])
                        {
                            echo $user['city'];
                        }
                        else{
                            echo 'N/A';
                        }
                        ?>
                    </li>
                    <li>
                        <strong>State: </strong>
                        <?php
                        if($user['state'])
                        {
                            echo $user['state'];
                        }
                        else{
                            echo 'N/A';
                        }
                        ?>
                    </li>
                    <li>
                        <strong>Postal Code: </strong>
                        <?php
                        if($user['postcode'])
                        {
                            echo $user['postcode'];
                        }
                        else{
                            echo 'N/A';
                        }
                        ?>
                    </li>
                    <li>
                        <strong>Country: </strong>
                        <?php
                        if($user['countryname'])
                        {
                            echo $user['countryname'];
                        }
                        elseif($user['country'])
                        {
                            echo $user['country'];
                        }
                        else{
                            echo 'N/A';
                        }
                        ?>
                    </li>
                </ul>
                <h4 class="bold-title theme-color">Billing Information</h4>
                <?php /*var_dump($user);*/?>
                <ul class="profile-nav">
                    <li>
                        <strong>Currency: </strong>
                        <?php
                        if($user['currency_code'])
                        {
                            echo $user['currency_code'];
                        }
                        else{
                            echo 'N/A';
                        }
                        ?>
                    </li>
                    <li>
                        <strong>Card Type: </strong>
                        <?php
                        if($user['cctype'])
                        {
                            echo $user['cctype'];
                        }
                        else{
                            echo 'N/A';
                        }
                        ?>
                    </li>
                    <li>
                        <strong>Last 4 digit: </strong>
                        <?php
                        if($user['cclastfour'])
                        {
                            echo $user['cclastfour'];
                        }
                        else{
                            echo 'N/A';
                        }
                        ?>
                    </li>
                </ul>
                <h4 class="bold-title theme-color">Additional Information</h4>
                <ul class="profile-nav">
                    <li>
                        <strong>Last Login: </strong>
                        <?php
                        if($user['lastlogin'])
                        {
                            echo str_replace('<br>', ', ', $user['lastlogin']);
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