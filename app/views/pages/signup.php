<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/navigation.php';
    
?>

<section class="signup__page section">
    <div class="signup container">
        <div class="signup__form form">
        <div class="form__title">
            Sign up
        </div>
            <form action="" method="post">
                <div class="grid">
                    <div class="form__item">
                        <label for="firstname" class="form__label">First name</label>
                        <input type="text" class="form__input" name="firstname" placeholder="Enter your firstname">
                        <span class="invalidFeedback">
                            <?php echo $data['firstnameError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="lastname" class="form__label">Last name</label>
                        <input type="text" class="form__input" name="lastname" placeholder="Enter your lastname">
                        <span class="invalidFeedback">
                            <?php echo $data['lastnameError']; ?>
                        </span>
                    </div>
                </div>
                <div class="grid">
                    <div class="form__item">
                        <label for="email" class="form__label">Email</label>
                        <input type="text" class="form__input" name="email" placeholder="Enter your email">
                        <span class="invalidFeedback">
                            <?php echo $data['emailError']; ?>
                        </span>
                    </div>
                </div>
               
                <div class="grid">
                    <div class="form__item">
                        <label for="password" class="form__label">Password</label>
                        <input type="password" class="form__input" name="password" placeholder="Enter your password">
                        <span class="invalidFeedback">
                            <?php echo $data['passwordError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="confirmpassword" class="form__label">Confirm password</label>
                        <input type="password" class="form__input" name="confirmpassword" placeholder="confirm password">
                        <span class="invalidFeedback">
                            <?php echo $data['confirmpasswordError']; ?>
                        </span>
                    </div>
                </div>
                <div class="grid">
                    <div class="form__item">
                        <button type="submit" class="form__btn">Submit</button>
                    </div>
                    <div class="form__item padding-b">
                        <a href="<?php echo URLROOT;?>/pages/home"class="form__btn form__btn-link">Sign in instead</a>
                    </div>
                        
                </div>
               
               
            </form>
        </div>
    </div>
</section>