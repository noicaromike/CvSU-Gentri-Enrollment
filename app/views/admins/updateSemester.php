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
    <div class="semester container">
        <div class="semester__title">
            Edit Academic Year
        </div>
            <form action="<?php echo URLROOT ."/admins/updateSemester/" . $data['id']?>" method="post">
                <div class="form__item">
                    <select name="semester" id="semester" class="select form__input">
                        <option disabled selected >Select Semester</option>
                        <?php foreach($data['select_sem'] as $semesterPick):?>
                        <option <?= get_select('semester', $semesterPick->select_semester)?> value="<?php echo $semesterPick->select_semester;?>"><?php echo $semesterPick->select_semester;?></option>
                        <?php endforeach;?>
                    </select>
                    <span class="invalidFeedback">
                            <?php echo $data['semesterError']; ?>
                    </span>
                </div>
                <div class="semester__flex">
                    <div class="form__item">
                        <label for="" class="form__label semester__label">Enter Year</label>
                        <input type="text"class="form__input semester__input" name="year" value="<?php echo $data['sem']->year?>" placeholder="Enter a year">
                        <span class="invalidFeedback">
                            <?php echo $data['yearError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <button type="submit" class="form__btn semester__btn-save">Save</button>
                    </div>
                </div>
                    
            </form>   
                
        
    </div>

</section>