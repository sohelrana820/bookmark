<!DOCTYPE html>
<html>

<head>
    <title><?php echo $this->fetch('title');?> - <?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <?php echo $this->Html->css(['bootstrap.min', 'font-awesome.min', 'animate.min', 'bootstrap-switch.min', 'checkbox3.min', 'jquery.dataTables.min', 'dataTables.bootstrap', 'select2.min', ]); ?>
    <!-- CSS App -->
    <?php
    echo $this->Html->css(['style', 'flat-blue', 'custom']);
    echo $this->fetch('cssTop');
    echo $this->fetch('jsTop');
    ?>
</head>

<body class="flat-blue login-page">

<div class="container">
    <div class="login-box">
        <div>
            <div class="login-form row">
                <div class="col-sm-12 text-center login-header">
                    <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                    <h4 class="login-title"><?php echo $appsName;?></h4>
                </div>
                <div class="col-sm-12">
                    <?php echo $this->Flash->render() ?>
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Javascript Libs -->
<?php
echo $this->Html->script(['jquery.min', 'bootstrap.min', 'Chart.min', 'bootstrap-switch.min', 'jquery.matchHeight-min', 'jquery.dataTables.min', 'dataTables.bootstrap.min', 'select2.full.min', 'ace/ace', 'ace/mode-html', 'ace/theme-github', 'app']);
echo $this->fetch('jsBottom');
?>

</body>
</html>
