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
                    <?php echo $this->Html->link('My Resources', ['controller' => 'Resources', 'action' => 'index']);?>
                </li>
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
                <?php  foreach($categories as $category):?>
                <div class="col-md-3 col-sm-3 col-xs-6 col">
                    <!-- UI Item -->
                    <div class="ui-item">
                        <!-- Heading -->
                        <h4>
                            <?php
                            if(isset($category->name))
                            {
                                echo $category->name;
                            }
                            ?>
                        </h4>
                        <ul class="list-unstyled">
                            <?php if($category->children):?>
                            <?php foreach($category->children as $children):?>
                            <li>
                                <a href="#">
                                    <?php
                                    if(isset($children->name))
                                    {
                                        echo $children->name;
                                    }
                                    ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <!--/ Container fluid -->
    </div>
    <!-- /UI Content -->
</div>
<!-- SERVICES END -->