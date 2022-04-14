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
    <div class="schedcode container">
        <div class="sched__title">
            Set Sched Code
        </div>
        <form action="<?php echo URLROOT;?>/admins/setSchedCode" method="POST">
        <div class="grid3">
                <div class="form__item">
                    <select name="semester" id="semester" class="select form__input">
                        <option disabled selected >Select Year</option>
                        <?php foreach($data['selectSem'] as $sched):?>
                        <option <?= get_select('semester', $sched->year)?> value="<?php echo $sched->year;?>"><?php echo $sched->year;?></option>
                        <?php endforeach;?>
                    </select>
                    <span class="invalidFeedback">
                            <?php echo $data['semesterError']; ?>
                    </span>
                </div>
                <div class="form__item">

                    <button type="submit" class="form__btn sched__btn">Set</button>
                </div>
        </div>    
        </form> 
        
    </div>
</section>
