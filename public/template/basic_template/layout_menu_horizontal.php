<?php
defined('SAFE_CALL') OR exit('No direct script access allowed');

?>
<div class="row row-padded text-center">
    <div class="col-sm-12">
        <?php
        
        foreach($links as $key => $value ){
        ?>
        <div class="col-sm-2" >
        <a href="<?php echo $value ; ?>"> <?php echo $key ; ?> </a> 
        </div>
        <?php
        }
        ?>
    </div>
</div>