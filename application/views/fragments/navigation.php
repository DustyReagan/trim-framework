<?php

    $active = 'class="active"';

?>

<ul class="nav nav-pills pull-right green">
    <li id="nav-home" <?php if($relative_path_array[0] == '') {echo $active;} ?>><a href="<?php echo PROJECT_WEB_ROOT; ?>">Home</a></li>
    <li id="nav-about" <?php if($relative_path_array[0] == 'about') {echo $active;} ?>><a href="<?php echo PROJECT_WEB_ROOT; ?>about/">About</a></li>
</ul>