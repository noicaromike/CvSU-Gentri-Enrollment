<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/navigation.php';
    
?>

<?php 
    guard();
?>
<section class="student__profile section">
    <div class="student__edit-container container">
        <div class="form__title">
            Edit Password
        </div>
        
        <div class="student__form form">
            <form action="" method="post">
            
                <div class="grid">
                    <div class="form__item">
                        <label for="password" class="form__label">Current Password</label>
                        <input type="password" class="form__input" name="password" value="<?= get_var('password')?>" placeholder="Enter your password" autocomplete="off">
                        <span class="invalidFeedback">
                            <?php echo $data['passwordError']; ?>
                        </span>
                        <span class="pass">
                            <?php echo $data['passwordMatch']; ?>
                        </span>
                    </div>
                </div>
                <div class="grid">
                    <div class="form__item">
                        <label for="newPassword" class="form__label">New Password</label>
                        <input type="password" class="form__input" name="newPassword" value="" placeholder="Enter your new password" autocomplete="off">
                        <span class="invalidFeedback">
                            <?php echo $data['newPasswordError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="confirmpassword" class="form__label">Confirm new Password</label>
                        <input type="password" class="form__input" name="confirmpassword" value="" placeholder="Confirm  new password" autocomplete="off">
                        <span class="invalidFeedback">
                            <?php echo $data['confirmpasswordError']; ?>
                        </span>
                    </div>
                </div>
               
                <div class="grid">
                    <div class="form__item">
                        <button type="submit" class="form__btn">Update</button>
                    </div>
                    <div class="form__item padding-b">
                        <a href="<?php echo URLROOT;?>/pages/home"class="form__btn form__btn-link">Back</a>
                    </div>
                        
                </div>
               
               
            </form>
        </div>
    </div>
</section>