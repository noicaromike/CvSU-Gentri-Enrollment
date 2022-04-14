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
            Set Academic Year
        </div>
            <form action="<?php echo URLROOT;?>/admins/semester" method="post">
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
                <div class="grid3 semester__grid">
                    <div class="form__item">
                        <label for="yearFrom" class="form__label semester__label">From</label>
                        <input type="text"class="form__input semester__input" name="yearFrom" value="<?= get_var('yearFrom')?>" placeholder="Enter a year">
                        <span class="invalidFeedback">
                            <?php echo $data['yearFromError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="yearTo" class="form__label semester__label">To</label>
                        <input type="text"class="form__input semester__input" name="yearTo" value="<?= get_var('yearTo')?>" placeholder="Enter a year">
                        <span class="invalidFeedback">
                            <?php echo $data['yearToError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <button type="submit" class="form__btn semester semester__btn-save">Save</button>
                    </div>
                </div>
            </form>   
                     
                
        <div class="table__content semester__table">
        <table class="content-table">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th align="center" colspan="3">Action</th>
                        
                    
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['semesters'] as $sem):?>
                    <tr>
                        <td><?php echo $sem->semester;?></td>
                        <td><?php echo $sem->year;?></td>
                        <td>
                            <?php echo $sem->status;?>
                        </td>
                        <td>
                            <?php if(!semStart()):?>
                                <form action="<?php echo URLROOT . "/admins/createSessionSem/". $sem->id?>" method="POST">
                                    <button type="submit" class="form__btn semester__btn">Set</button>
                                </form>
                            <?php endif;?>
                            
                            
                        </td>
                        <td>
                           <a href="<?php echo URLROOT . "/admins/updateSemester/" . $sem->id?> " class="form__btn edit__btn">Edit</a>
                       </td>
                       <td>
                           <a href="<?php echo URLROOT . "/admins/deleteSemester/" . $sem->id?> " class="form__btn delete__btn" href="">Delete</a>
                       </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
               
               </table>
            </div>
            <?php if(semStart()):?>
              <div class="form__item">
                     <a href="<?php echo URLROOT;?>/admins/unSetSem" class="form__btn green">Close Academic Year</a>
                </div>
             <?php endif;?>
            
        
        

        </div> 
</section>