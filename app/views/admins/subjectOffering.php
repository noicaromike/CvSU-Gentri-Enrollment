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
    <div class="course__container container">
        <div class="course__subject">
               <div class="course__title">
                   Set Offered Subject
                   
               </div>
               <form action="<?php echo URLROOT."/admins/subjectOffering/". $data['id'];?>" method="POST">
               <div class="grid3">
                <div class="form__item">
                    <label for="sched_code"class="form__label">Sched Code</label>
                    <?php if(empty($data['sched_code'])):?>
                    <input type="text" class="form__input" disabled name="sched_code" placeholder="" value="<?php echo $data['newSched']?>">
                    <?php else:?>
                        <?php if($data['yearFroms'] != $data['yearFromSubject']):?>
                            <input type="text" class="form__input" disabled name="sched_code" placeholder="" value="<?php echo $data['newSched']?>">
                        <?php elseif(!empty($data['sched_code'])):?>   
                        <input type="text" class="form__input" disabled name="sched_code" placeholder="" value="<?php echo $data['sched_code']+1;?>">
                        <?php endif;?>
                    <?php endif;?>

    
                </div>
                
                
               </div>
               
                            


                       
                        </div>
                        <div class="course__title mt">
                            Create Subject
                   
                        </div>
                        <div class="grid3">
                        <div class="form__item">
                                    <label for="" class="form__label">Select Program</label>
                                    <select name="program" id="program" class="select form__input">
                                    <option disabled selected>Select Program</option>
                                        
                                        <?php foreach($data['programs'] as $program):?>
                                        <option <?= get_select('program', $program->name)?> value="<?php echo $program->name;?>"><?php echo $program->name;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="invalidFeedback">
                                            <?php echo $data['programsError']; ?>
                                    </span>
                            </div>

                            <div class="form__item">
                                    <label for="" class="form__label">Select Year Level</label>
                                    <select name="yearLevel" id="yearLevel" class="select form__input">
                                    <option disabled selected>Select Year Level</option>
                                        
                                        <?php foreach($data['yearLevels'] as $yearAttend):?>
                                        <option <?= get_select('yearLevel', $yearAttend->yearLevel)?> value="<?php echo $yearAttend->yearLevel;?>"><?php echo $yearAttend->yearLevel;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="invalidFeedback">
                                            <?php echo $data['yearLevelError']; ?>
                                    </span>
                            </div>
                           
                        </div>
                    
                  
                        


               <div class="grid3">
               <div class="form__item">
                   <label for="course_code"class="form__label">Course Code</label>
                    <input type="text" class="form__input" name="course_code" value="<?= get_var('course_code');?>" placeholder="Enter course code">
                    <span class="invalidFeedback">
                            <?php echo $data['course_codeError']; ?>
                    </span>
                </div>
                <div class="form__item">
                   <label for="title"class="form__label">Title</label>
                    <input type="text" class="form__input" name="title" value="<?= get_var('title');?>" placeholder="Enter title">
                    <span class="invalidFeedback">
                            <?php echo $data['titleError']; ?>
                    </span>
                </div>
               </div>
               <div class="grid3">
               <div class="form__item">
                   <label for="lec_units"class="form__label">Lec Units</label>
                    <input type="text" class="form__input" name="lec_units" value="<?= get_var('lec_units');?>" placeholder="Enter lec units">
                    <span class="invalidFeedback">
                            <?php echo $data['lec_unitsError']; ?>
                    </span>
                </div>
                <div class="form__item">
                   <label for="lab_units"class="form__label">Lab Units</label>
                    <input type="text" class="form__input" name="lab_units" value="<?= get_var('lab_units');?>" placeholder="Enter lab units">
                    <span class="invalidFeedback">
                            <?php echo $data['lab_unitsError']; ?>
                    </span>
                </div>
               </div>
               <!-- hours -->
               <div class="grid3">
               <div class="form__item">
                   <label for="lec_hours"class="form__label">Lec Hours</label>
                    <input type="text" class="form__input" name="lec_hours" value="<?=get_var('lec_hours');?>" placeholder="Enter lec hours">
                    <span class="invalidFeedback">
                            <?php echo $data['lec_hoursError']; ?>
                    </span>
                </div>
                <div class="form__item">
                   <label for="lab_hours"class="form__label">Lab Hours</label>
                    <input type="text" class="form__input" name="lab_hours" value="<?=get_var('lab_hours');?>" placeholder="Enter lab hours">
                    <span class="invalidFeedback">
                            <?php echo $data['lab_hoursError']; ?>
                    </span>
                </div>
               </div>
               <div class="grid3">
               <div class="form__item">
                   <label for="pre-req"class="form__label">PRE-REQ.</label>
                    <input type="text" class="form__input" name="pre-req" value="<?=get_var('pre-req');?>" placeholder="Enter pre-req">
                    <span class="invalidFeedback">
                            <?php echo $data['pre-reqError']; ?>
                    </span>
                </div>
                <div class="form__item">
                    <button class="form__btn btn__course" type="submit">Save</button>
                </div>
                
               </div>
               </form>
        </div>
    </div>
</section>