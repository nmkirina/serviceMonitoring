 <?php if(isset($_SESSION['success'])&&(!$_SESSION['success'])):?>
    <div class="alert alert-danger">
        <?= $_SESSION['message'];?>
        <button type="button" class="close" data-dismiss="alert">x</button>
    </div>
<?php endif;?>
