<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/admin_header.php';
    
?>
<?php
    $page = 'program';
    require APPROOT . '/views/includes/sidebar.php';
    
?>


<section class="admin section">
    <div class="delete__container container">
        <div class="delete__form form">
            <h2>Are you sure you want to delete this program?</h2>
            <div class="form__item delete__item">
                <h3>
                    <?php echo $data['delete']->name?>
                </h3>
                <h3>
                    <?php echo $data['delete']->description?>
                </h3>
            </div>
            <form action="" method="post">
                <div class="form__item action__item">
                    <button class="form__btn modal__btn" type="submit">Yes</button>
                    <a href="<?php echo URLROOT;?>/admins/program" class="form__btn cancel__btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>