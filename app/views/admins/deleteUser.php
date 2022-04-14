<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/admin_header.php';
    
?>
<?php
    $page = 'users';
    require APPROOT . '/views/includes/sidebar.php';
    
?>


<section class="admin section">
    <div class="delete__container container">
        <div class="delete__form form">
            
            <?php if($data['status'] != "Enrolled"):?>
                <h2>Are you sure you want to delete this user?</h2>
            <?php endif;?>
            <?php if($data['status'] = "Enrolled"):?>
                <h2>You cannot delete this Account because it is already Enrolled</h2>
            <?php endif;?>
            <div class="form__item delete__item">
                <h3>Name: <?php echo $data['user']->firstname . " " . $data['user']->lastname?></h3>
                <h3>Email: <?php echo $data['user']->email?></h3>
                <h3>Created at: <?php echo $data['user']->created_at?></h3>
            </div>
            <form action="" method="post">
                <div class="form__item action__item">
                    <?php if($data['status'] != "Enrolled"):?>
                    <button class="form__btn modal__btn" type="submit">Yes</button>
                    <?php endif;?>
                    <a href="<?php echo URLROOT;?>/admins/users" class="form__btn cancel__btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>