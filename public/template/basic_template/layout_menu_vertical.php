<?php
defined('SAFE_CALL') OR exit('No direct script access allowed');

?>
<div class="row row-padded text-center">
    <div class="col-sm-12">
        <h5><?php echo $title; ?></h5>
        <?php
        foreach($links as $key => $value ){
        ?>
        <p><a href="<?php echo $value ; ?>"> <?php echo $key ; ?> </a></p>
        <br />
        <?php
        }
        ?>
    </div>
</div>