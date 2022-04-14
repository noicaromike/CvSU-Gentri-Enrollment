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
    <div class="couser__container container">
            <div class="course__title">
                Courses
            </div>
            <div class="grid3">
                <div class="grid2">
                    <div class="form__item">
                        
                        <a href="<?php echo URLROOT;?>/admins/setSchedCode" class="form__btn btn__course green">Generate Sched</a>
                    </div>
                  
                    
                </div>
                
            </div>
            

                    <form action="" method="post">
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
                            <div class="form__item">
                                <button type="submit" class="form__btn submitBtn">Go</button>
                            </div>
                        </div>
                        </form>

                                           
                                                
                                         
                         


            <div class="table__content">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Sched Code</th>
                        
                        <th>Course Code</th>
                        <th>Title</th>
                        <th>Lec Units</th>
                        <th>Lab Units</th>
                        <th>Lec hours</th>
                        <th>Lab hours</th>
                        <th>PRE.REQ</th>
                        <th align="center" colspan="3">Action</th>
                        



                    
                    </tr>
                </thead>
                   
                <tbody>
                   
                    <?php if(empty($data['searchItem'])):?>
                    <?php foreach($data['subjects'] as $subject):?>
                    <tr>
                        
                        <td><?php echo $subject->sched_code;?></td>
                       
                        <td><?php echo $subject->course_code;?></td>
                        <td><?php echo $subject->title;?></td>
                        <td><?php echo $subject->lec_units;?></td>
                        <td><?php echo $subject->lab_units;?></td>
                        <td><?php echo $subject->lec_hours;?></td>
                        <td><?php echo $subject->lab_hours;?></td>
                        <td><?php echo $subject->preReq;?></td>
                        <td>
                           <a href="<?php echo URLROOT . "/admins/UpdateSubject/" . $subject->id?> " class="form__btn edit__btn">Edit</a>
                       </td>
                       <td>
                           <a href="<?php echo URLROOT . "/admins/deleteSubject/" . $subject->id?> " class="form__btn delete__btn" href="">Delete</a>
                       </td>
                      
                    </tr>
                        <?php endforeach;?>
                        <?php endif;?>
                        
                        <?php if(!empty($data['searchItem'])):?>
                        <?php foreach($data['searchItem'] as $search):?>
                
                    <tr>
                                <td><?php echo $search->sched_code;?></td>
                                
                                <td><?php echo $search->course_code;?></td>
                                <td><?php echo $search->title;?></td>
                                <td><?php echo $search->lec_units;?></td>
                                <td><?php echo $search->lab_units;?></td>
                                <td><?php echo $search->lec_hours;?></td>
                                <td><?php echo $search->lab_hours;?></td>
                                <td><?php echo $search->preReq;?></td>
                                <td>
                                <a href="<?php echo URLROOT . "/admins/UpdateSubject/" . $search->id?> " class="form__btn edit__btn">Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo URLROOT . "/admins/deleteSubject/" . $search->id?> " class="form__btn delete__btn" href="">Delete</a>
                            </td>
                    </tr>
                   <?php endforeach;?>
                   <?php endif;?>
                   
                </tbody>
                    
            </table>
        </div>


        
    </div>
</section>




                  