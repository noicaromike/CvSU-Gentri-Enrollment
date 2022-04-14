
<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/admin_header.php';
    
?>
<?php
    $page = 'semester';
    require APPROOT . '/views/includes/sidebar.php';
    
?>


<section class="admin section">
    <div class="delete__container container">
        <div class="delete__form form">
            <h2>Are you sure you want to delete this data?</h2>
            <div class="form__item delete__item">
                <h3>Semester: <?php echo $data['sem']->semester?></h3>
                <h3>Year: <?php echo $data['sem']->year?></h3>
                <h3>Created at: <?php echo $data['sem']->created_at?></h3>
            </div>
            <form action="" method="post">
                <div class="form__item action__item">
                    <button class="form__btn modal__btn" type="submit">Yes</button>
                    <a href="<?php echo URLROOT;?>/admins/semester" class="form__btn cancel__btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>