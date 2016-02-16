<!-- HEADER START -->
<nav class="navbar navbar-default header">
    <div class="container">
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

            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.html" id="services">Category <span class="caret"></span></a></li>
                <li>
                    <?php echo $this->Html->link('My Boards', ['controller' => 'boards', 'action' => 'index']);?>
                </li>
                <li class="dropdown">
                    <?php
                    echo $this->Html->link($loggedInUser->profile->name. ' <span class="caret"></span>', ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'role' => 'button', 'aria-haspopup' => 'true', 'aria-expanded' => 'false', 'escape' => false]);
                    ?>
                    <ul class="dropdown-menu custom-dropdown">
                        <li>
                            <?php echo $this->Html->link('My Account', ['controller' => 'profile']);?>
                        </li>
                        <li><a href="index.html">Support Center</a></li>
                        <li><a href="index.html">Billing & Cost Management</a></li>
                        <li><a href="index.html">Security Credentials</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <?php echo $this->Html->link('Sign Out', ['controller' => 'users', 'action' => 'logout']);?>
                        </li>
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