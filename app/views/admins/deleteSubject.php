
<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/admin_header.php';
    
?>
<?php
    $page = 'course';
    require APPROOT . '/views/includes/sidebar.php';
    
?>


<section class="admin section">
    <div class="delete__container container">
        <div class="delete__form form">
            <h2>Are you sure you want to delete this data?</h2>
            <div class="form__item delete__item">
                <h3>Sched Code: <?php echo $data['subject']->sched_code?></h3>
                
                <h3>Course code: <?php echo $data['subject']->course_code?></h3>
                <h3>Title: <?php echo $data['subject']->title?></h3>

                <h3>Lec Units: <?php echo $data['subject']->lec_units?></h3>
                <h3>Lab Units: <?php echo $data['subject']->lab_units?></h3>
                <h3>lec Hours: <?php echo $data['subject']->lec_hours?></h3>
                <h3>lab Hours: <?php echo $data['subject']->lab_hours?></h3>
                <h3>PRE REQ: <?php echo $data['subject']->preReq;?></h3>



            </div>
            <form action="" method="post">
                <div class="form__item action__item">
                    <button class="form__btn modal__btn" type="submit">Yes</button>
                    <a href="<?php echo URLROOT;?>/admins/course" class="form__btn cancel__btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>