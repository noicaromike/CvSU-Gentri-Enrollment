
<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/navigation.php';
    
?>




<section class="section selectsubject">
    <div class="container">
        <div class="selectsubject__container">
            <div class="form__title">
                <?php echo $data['semester']?>
            </div>
            <div class="form selectinfo">
                
                    <div class="form__item">
                        <h2>Welcome to Cavite State University General Trias City Campus</h2>
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

                
            </div>
                                   

           
                   
                    
                 
            <div class="table__content">
            <table class="content-table">
                <thead>
                    <tr>
                        <th align="center">Selection</th>
                        <th>Sched Code</th>
                        <th>Course Code</th>
                        <th>Title</th>
                        <th>Lec Units</th>
                        <th>Lab Units</th>
                        <th>Lec hours</th>
                        <th>Lab hours</th>
                        <th>PRE.REQ</th>
                       



                    
                    </tr>
                </thead>
                   
                <tbody>
                   
                    <?php if(empty($data['searchItem'])):?>
                    <?php foreach($data['subjects'] as $subject):?>
                    <tr>
                        <td>
                            <a href="<?php echo URLROOT . "/pages/addnew/" . $subject->id . "/" . $data['id']?>" class="form__btn">Add</a>
                        </td>
                        <td><?php echo $subject->sched_code;?></td>
                       
                        <td><?php echo $subject->course_code;?></td>
                        <td><?php echo $subject->title;?></td>
                        <td><?php echo $subject->lec_units;?></td>
                        <td><?php echo $subject->lab_units;?></td>
                        <td><?php echo $subject->lec_hours;?></td>
                        <td><?php echo $subject->lab_hours;?></td>
                        <td><?php echo $subject->preReq;?></td>
                       
                      
                    </tr>
                        <?php endforeach;?>
                        <?php endif;?>
                        
                        <?php if(!empty($data['searchItem'])):?>
                        <?php foreach($data['searchItem'] as $search):?>
                
                    <tr>
                        <td>
                            <a href="<?php echo URLROOT . "/pages/addnew/" . $search->id . "/" . $data['id']?>" class="form__btn">Add</a>
                        </td>
                                <td><?php echo $search->sched_code;?></td>
                                <td><?php echo $search->course_code;?></td>
                                <td><?php echo $search->title;?></td>
                                <td><?php echo $search->lec_units;?></td>
                                <td><?php echo $search->lab_units;?></td>
                                <td><?php echo $search->lec_hours;?></td>
                                <td><?php echo $search->lab_hours;?></td>
                                <td><?php echo $search->preReq;?></td>
                               
                    </tr>
                   <?php endforeach;?>
                   <?php endif;?>
                   
                </tbody>
                    
            </table>
        </div>


                            
        



        </div>
    </div>
</section>


                                       
