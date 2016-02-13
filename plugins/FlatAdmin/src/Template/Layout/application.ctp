<!DOCTYPE html>
<html>

<head>
    <title><?php echo $this->fetch('title');?> - <?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <?php echo $this->Html->css(['bootstrap.min', 'font-awesome.min', 'animate.min', 'bootstrap-switch.min', 'checkbox3.min', 'jquery.dataTables.min', 'dataTables.bootstrap', 'select2.min', ]); ?>
    <!-- CSS App -->
    <?php
    echo $this->Html->css(['style', 'flat-blue', 'custom']);
    echo $this->fetch('cssTop');
    echo $this->fetch('jsTop');
    ?>
</head>

<body class="flat-blue">

<div class="app-container">
    <div class="row content-container">
        <?php echo $this->element('header');?>
        <?php echo $this->element('sidebar');?>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                <?php echo $this->Flash->render() ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </div>
    <footer class="app-footer">
        <div class="wrapper">
            <span class="pull-right">2.1 <a href="#"><i class="fa fa-long-arrow-up"></i></a></span> © 2015 Copyright.
        </div>
    </footer>
    <div>

<?php
echo $this->Html->script(['jquery.min', 'bootstrap.min', 'Chart.min', 'bootstrap-switch.min', 'jquery.matchHeight-min', 'jquery.dataTables.min', 'dataTables.bootstrap.min', 'select2.full.min', 'ace/ace', 'ace/mode-html', 'ace/theme-github', 'app']);
echo $this->fetch('jsBottom');
?>

</body>
</html>
