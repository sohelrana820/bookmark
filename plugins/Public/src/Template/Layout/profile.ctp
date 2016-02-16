<!DOCTYPE html>
<html lang="en" ng-app="bBundApp">
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->fetch('title');?> - <?php echo $title; ?></title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    echo $this->Html->css(['bootstrap.min.css', 'style', 'kit/style-9', 'style', 'custom']);
    echo $this->fetch('cssTop');
    echo $this->fetch('jsTop');
    ?>

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,400italic,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body class="profile_page">

<!-- HEADER START -->
<nav class="navbar navbar-default header">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->image('logo.png', ['class' => 'navbar-brand logo', 'url' => ['controller' => 'dashboard', 'action' => 'index']]);?>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown active">
                    <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">Mi-Center <span class="caret"></span></a>
                    <ul class="dropdown-menu custom-dropdown">
                        <li>
                            <h4 class="sm-title text-uppercase">Resource Groups</h4>
                            A resource group is a collection of resources that share one or more tags.
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.html">Create a Resource Group</a></li>
                        <li><a href="index.html">Tag Editor</a></li>
                    </ul>
                </li>
                <li><a href="index.html" id="services">Services <span class="caret"></span></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">

                    <?php
                    echo $this->Html->link($user['fullname']. ' <span class="caret"></span>', ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'role' => 'button', 'aria-haspopup' => 'true', 'aria-expanded' => 'false', 'escape' => false]);
                    ?>

                    <ul class="dropdown-menu custom-dropdown">
                        <li>
                            <?php echo $this->Html->link('My Account', ['controller' => 'profile']);?>
                        </li>
                        <li><a href="index.html">Billing & Cost Management</a></li>
                        <li><a href="index.html">Security Credentials</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <?php echo $this->Html->link('Sign Out', ['controller' => 'users', 'action' => 'logout']);?>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Support <span class="caret"></span></a>
                    <ul class="dropdown-menu custom-dropdown">
                        <li><a href="index.html">Support Center</a></li>
                        <li><a href="index.html">Training</a></li>
                        <li><a href="index.html">Documentation</a></li>
                        <li><a href="index.html">Other Resources</a></li>
                        <li><a href="index.html">Forums</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- HEADER END -->

<!-- SERVICES START-->
<div class="ui-9">
    <!-- UI Content -->
    <div class="ui-content bg-lblue">
        <!-- Container fluid -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6 col">
                    <!-- UI Item -->
                    <div class="ui-item">
                        <!-- Heading -->
                        <h4>Web Development</h4>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fa fa-life-ring"></i> &nbsp; Life ring</a></li>
                            <li><a href="#"><i class="fa fa-sitemap"></i> &nbsp; Sitemap</a></li>
                            <li><a href="#"><i class="fa fa-toggle-on"></i> &nbsp; Toggle on</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> &nbsp; User</a></li>
                            <li><a href="#"><i class="fa fa-tree"></i> &nbsp; Tree</a></li>
                            <li><a href="#"><i class="fa fa-users"></i> &nbsp; Users</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> &nbsp; Star</a></li>
                            <li><a href="#"><i class="fa fa-puzzle-piece"></i> &nbsp; Puzzle</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 col">
                    <!-- UI item -->
                    <div class="ui-item">
                        <!-- Heading -->
                        <h4>Web Design</h4>
                        <ul class="list-unstyled">
                            <!-- Icons -->
                            <li><a href="#"><i class="fa fa-phone"></i> &nbsp; Phone</a></li>
                            <li><a href="#"><i class="fa fa-male"></i> &nbsp; Male</a></li>
                            <li><a href="#"><i class="fa fa-map-marker"></i> &nbsp; Location</a></li>
                            <li><a href="#"><i class="fa fa-plane"></i> &nbsp; Plane</a></li>
                            <li><a href="#"><i class="fa fa-building"></i> &nbsp; Building</a></li>
                            <li><a href="#"><i class="fa fa-desktop"></i> &nbsp; Desktop</a></li>
                        </ul>
                        <br/>

                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 col">
                    <!-- UI Item -->
                    <div class="ui-item">
                        <!-- Heading -->
                        <h4>SEO</h4>
                        <ul class="list-unstyled">

                            <li><a href="#"><i class="fa fa-asterisk"></i> &nbsp; Asterisk</a></li>
                            <li><a href="#"><i class="fa fa-university"></i> &nbsp; University</a></li>
                            <li><a href="#"><i class="fa fa-building"></i> &nbsp; Building</a></li>
                            <li><a href="#"><i class="fa fa-desktop"></i> &nbsp; Desktop</a></li>
                            <li><a href="#"><i class="fa fa-cloud-download"></i> &nbsp; Cloud</a></li>
                            <li><a href="#"><i class="fa fa-life-ring"></i> &nbsp; Life ring</a></li>
                            <li><a href="#"><i class="fa fa-sitemap"></i> &nbsp; Sitemap</a></li>
                            <li><a href="#"><i class="fa fa-toggle-on"></i> &nbsp; Toggle on</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> &nbsp; User</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 col">
                    <!-- UI Item -->
                    <div class="ui-item">
                        <!-- Heading -->
                        <h4>Tools</h4>
                        <ul class="list-unstyled">

                            <li><a href="#"><i class="fa fa-university"></i> &nbsp; University</a></li>
                            <li><a href="#"><i class="fa fa-building"></i> &nbsp; Building</a></li>
                            <li><a href="#"><i class="fa fa-desktop"></i> &nbsp; Desktop</a></li>
                            <li><a href="#"><i class="fa fa-cloud-download"></i> &nbsp; Cloud</a></li>
                            <li><a href="#"><i class="fa fa-life-ring"></i> &nbsp; Life ring</a></li>
                            <li><a href="#"><i class="fa fa-sitemap"></i> &nbsp; Sitemap</a></li>
                            <li><a href="#"><i class="fa fa-toggle-on"></i> &nbsp; Toggle on</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Container fluid -->
    </div>
    <!-- /UI Content -->
</div>
<!-- SERVICES END -->
<?php echo $this->Flash->render() ?>
<?php echo $this->fetch('content'); ?>

<!-- FOOTER START -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="footer-nav">
                    <li><a>Privacy Policy</a></li>
                    <li><a>Terms and Conditions</a></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <p class="copy">
                    © 2015 - 2016, MiTek Software Solutions. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER END -->

<?php
echo $this->Html->script(['jquery', 'bootstrap', 'slim-scroll', 'app']);
echo $this->fetch('jsBottom');
?>
</body>
</html>