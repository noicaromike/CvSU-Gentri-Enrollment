<!-- ======ADMIN-HEADER======== -->
<header class="header">
    
        <nav class="admin__nav">
            <div class="cvsu__logo">
                <img src="<?php echo URLROOT; ?>/public/img/Cavite_State_University.png" alt="Cavite State University Logo">
                <div class="cvsu__logo-text">
                    <h3>C<span>v</span>SU Gentri</h3>
                    <p>Enrollment System</p>
                </div>
            </div>
            <div class="welcomenote">
                <div class="admin__navbar" id="admin__toggle">
                    <i class="ri-menu-line"></i>
                </div>
                <?php if(isLoggedIn()) : ?>
                <p>Welcome back</p>
                <h3><?php echo $_SESSION['firstname']; ?></h3>
               
                    <a href="<?php echo URLROOT; ?>/pages/logout" class="form__btn log-out">
                    
                    Log-out
                    </a>

                <?php endif; ?>
            </div>
        </nav>
</header>

 