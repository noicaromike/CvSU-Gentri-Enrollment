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
            Edit Profile
        </div>
        
        <div class="student__form form">
            <form action="" method="post">
            
                <div class="grid">
                    <div class="form__item">
                        <label for="firstname" class="form__label">First name</label>
                        <input type="text" class="form__input" name="firstname" value="<?php echo $data['user']->firstname?>" placeholder="Enter your firstname" autocomplete="off">
                        <span class="invalidFeedback">
                            <?php echo $data['firstnameError']; ?>
                        </span>
                        
                    </div>
                    <div class="form__item">
                        <label for="lastname" class="form__label">Last name</label>
                        <input type="text" class="form__input" name="lastname" value="<?php echo $data['user']->lastname?>" placeholder="Enter your lastname" autocomplete="off">
                        <span class="invalidFeedback">
                            <?php echo $data['lastnameError']; ?>
                        </span>
                    </div>
                </div>
                <div class="grid">
                    <div class="form__item">
                        <label for="email" class="form__label">Email</label>
                        <input type="text" class="form__input" name="email" value="<?php echo $data['user']->email?>" placeholder="Enter your email" autocomplete="off">
                        <span class="invalidFeedback">
                            <?php echo $data['emailError']; ?>
                        </span>
                    </div>
                    <div class="form__item align__item">
                        <a href="<?php echo URLROOT . "/students/password/". $data['user']->id?>" class="">Change Password?</a>
                    </div>
                </div>
               
                <div class="grid">
                    <div class="form__item">
                        <button type="submit" class="form__btn">Update</button>
                    </div>
                    <div class="form__item padding-b">
                        <a href="<?php echo URLROOT;?>/students/profile"class="form__btn form__btn-link">Back</a>
                    </div>
                        
                </div>
               
               
            </form>
        </div>
       

    </div>

</section>