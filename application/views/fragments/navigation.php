<?php
$r = str_replace('?' . $_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);
$r = explode("/", $r);

$active = 'class="active"';
?>

<ul class="nav nav-pills pull-right green">
    <li id="nav-home" <?php if($r[1] == '') {echo $active;} ?>><a href="<?php echo PROJECT_WEB_ROOT; ?>">Home</a></li>
    <li id="nav-about" <?php if($r[1] == 'about') {echo $active;} ?>><a href="<?php echo PROJECT_WEB_ROOT; ?>about/">About</a></li>
</ul>