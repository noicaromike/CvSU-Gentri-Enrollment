


<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/navigation.php';
    
?>


<section class="submitted section">
    <div class="container">

    
            <div class="table__content">
                    <?php if(!empty($data['subjects'])):?>
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
                                <td>
                                    Select
                                </td>
                            
                            </tr>
                        </thead>
                        
                        <tbody>
                            
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
                                
                                <a class="form__btn edit__btn grey" href="<?php echo URLROOT . "/pages/removeSubject/" .$subject->id . "/". $data['users']?>">Remove</a>
                            
                                </td>
                            
                            </tr>
                            <?php endforeach;?>
                            
                            
                                       
                        
                        
                        </tbody>
                            
                    </table>
                </div>
                <?php endif;?>
            
                

            

                                <div class="grid3">
                                    <div class="form__item">
                                    <?php if(!empty($data['subjects'])):?>
                                        <?php foreach($data['subjects'] as $sum):?>
                                            <?php $data['total']+= $sum->lec_units;?>
                                        <?php endforeach;?>
                                    <label for="" class="form__label">Total Units: <?php echo $data['total']?></label>
                                            
                                    <?php endif;?>
                                    
                                        
                                    
                                    </div>

                                <div class="form__item">
                                <a class="form__btn color-green" href="<?php echo URLROOT . "/pages/enrollment/" . $data['users']?>">Add new</a>
                                </div>
                                <div class="form__item">
                                    
                                    <?php if(!empty($data['subjects'])):?>
                                    <a class="form__btn color-green" href="<?php echo URLROOT . "/pages/evaluate/" . $data['users']?>">Request for Evaluation</a>
                                    <?php endif;?>
                                </div>

                                </div>

                                
                    
                   
            
              
               
             
                
                
                
                
               
    </div>
</section>





