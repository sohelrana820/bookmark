<!DOCTYPE html>
<html lang="en" ng-app="application">
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->fetch('title');?></title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    echo $this->Html->css(['bootstrap.min.css',  'kit/style-9', 'bootstrap-material-design.min.css', 'style', 'style', 'custom']);
    echo $this->fetch('cssTop');
    echo $this->fetch('jsTop');
    ?>

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,400italic,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



</head>
<body>

<?php echo $this->element('header');?>
<?php echo $this->Flash->render() ?>

<div class="container">
    <div class="content-area pages">
        <?php echo $this->fetch('content'); ?>
    </div>
</div>

<!-- FOOTER START -->
<footer class="footer">
    <div class="container">
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
echo $this->Html->script(['jquery', 'bootstrap', 'material.min', 'slim-scroll', 'app']);
echo $this->fetch('jsBottom');
?>
<script>
    $.material.init()
</script>
</body>
</html>