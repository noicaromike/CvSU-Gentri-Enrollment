<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/navigation.php';
    
?>
<?php
    require APPROOT . '/views/includes/splash_screen.php';
    
?>

<section class="verification section">
    <div class="verified container">
        <div class="verify form">
            <div class="form__item">
                <h2><?php echo $data['message']?></h2>
            </div>
            <div class="form__item verification__item">
                <a class="form__btn" href="<?php echo URLROOT;?>/pages/home">Login</a>
            </div>
        </div>
    </div>
</section>
 