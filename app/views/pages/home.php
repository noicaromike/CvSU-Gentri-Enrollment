<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/navigation.php';
    
?>
    
<section class="section sticky" id="home">
        <div class="hero__container">
           <div class="hero__content">
               <div class="hero__text">
                    <h1 class="creating__text">Creating</h1>
                    <h2>A community of</h2>
                    <h2>Life Long Learner</h2>
               </div>
                <div class="hero__social-media">
                   <div class="hero__social-icons">
                        <a href="https://www.facebook.com/cvsugentriadmission" class="hero__social-icon">
                            <i class="ri-facebook-circle-fill"></i>
                        </a>
                        <a href="#" class="hero__social-icon">
                            <i class="ri-youtube-fill"></i>
                        </a>
                   </div>
                   <p class="hero__social-text">Visit Our Facebook Page for More info.</p>
                 </div>
                 
           </div>
           <div class="form__container">
                <form action="<?php echo URLROOT; ?>/pages/home" class="form" method="POST">
                    <div class="form__title">
                        Sign In
                    </div>
                    <div class="form__item">
                        <label for="email" class="form__label">Email</label>
                        <input type="text" class="form__input" name="email" value="<?= get_var('email')?>" placeholder="Enter your email" autocomplete="off" >
                        <span class="invalidFeedback">
                            <?php echo $data['emailError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="password" class="form__label">Password</label>
                        <input type="password" class="form__input" name="password" placeholder="Enter your password" autocomplete="off">
                        <span class="invalidFeedback">
                            <?php echo $data['passwordError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <button  type="submit"  class="form__btn">Login</button>
                    </div>
                    <p>Don't Have an Account? <a href="<?php echo URLROOT; ?>/pages/signup">Register Here!</a></p>
                </form>

            </div>
       
        </div>
    </section>



<?php
    require APPROOT . '/views/includes/footer.php';
    
?>


