<!DOCTYPE html>
<html lang="en" ng-app="bBundApp">
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->fetch('title');?></title>
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
<body ng-app="application">

<?php echo $this->element('header');?>
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