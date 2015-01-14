<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once(APPLICATION_PATH . '/views/fragments/head.php'); ?>
</head>

<body>

<div class="container">
    <div class="header">
        <?php include_once(APPLICATION_PATH . '/views/fragments/navigation.php'); ?>
        <h3 class="text-muted">Example PHP Trim Framework</h3>
    </div>
    <hr />

    <?php echo $content ?>

    <hr />
    <div class="footer">
        <?php include_once(APPLICATION_PATH . '/views/fragments/footer.php'); ?>
    </div>

</div> <!-- /container -->

</body>
</html>
