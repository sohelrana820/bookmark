<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" Mi-center ">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Mi-center, MiTek Software Solution">

    <title>Login -  MiTek Software Solutions</title>
    <link rel="shortcut icon" href="http://miteksoftware.com/wp-content/uploads/2014/12/favicon.png" type="image/x-icon"/>

    <!-- Bootstrap core CSS -->
    <?php echo $this->Html->css(array('bootstrap'));?>
    <!--external css-->
    <?php echo $this->Html->css(array('font-awesome/css/font-awesome'));?>

    <!-- Custom styles for this template -->
    <?php echo $this->Html->css(array('login'));?>
    <?php echo $this->fetch('cssTop'); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>



<div id="login-page">
    <div class="container">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 col-md-offset-3 margin-top-120">
                    <?php echo $this->Flash->render() ?>
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<?php echo $this->Html->script(array('jquery', 'bootstrap.min'));?>

<?php echo $this->fetch('jsBottom'); ?>
</body>
</html>