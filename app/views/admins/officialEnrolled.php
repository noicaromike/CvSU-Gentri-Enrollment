<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/admin_header.php';
    
?>
<?php
    $page = 'enrolled';
    require APPROOT . '/views/includes/sidebar.php';
    
?>

<section class="admin section">
        <div class="official container">
            <div class="official__title">
                Certificate of Registration
            </div>
            <?php if($data['validated'] != 2):?>
            <form action="" method="POST" >

            <div class="grid3">
                <div class="form__item">
                    <label for="" class="form__label">Enter Student No.</label>
                    <input type="text" name="studentNo" class="form__input" placeholder="Enter Student No.">
                    <span class="invalidFeedback">
                        <?php echo $data['studentNoError']; ?>
                    </span>
                </div>
               
                <div class="form__item">
                    <label for="" class="form__label">Section</label>
                    <input type="text" name="section" class="form__input" placeholder="Enter Section.">
                    <span class="invalidFeedback">
                        <?php echo $data['sectionError']; ?>
                    </span>
                </div>
                
                <div class="form__item">
                    <button type="submit" class="form__btn validate">Validate</button>
                   
                </div>
                
            </div>
            </form>
            <?php endif;?>

            <div class="grid3">
                <div class="form__item">
                    <label class="form__label" for="">Student Name:</label>
                    <p class="bold"><?php echo $data['studentInfo']->firstName . " " . $data['studentInfo']->MiddleName . " " . $data['studentInfo']->LastName?></p>
                </div>
                <div class="form__item">
                    <label class="form__label" for="">Student No:</label>
                    <p class="bold"><?php echo $data['studentInfo']->student_no?></p>
                </div>
                <div class="form__item">
                    <label class="form__label" for="">Section:</label>
                    <p class="bold"><?php echo $data['studentInfo']->section?></p>
                    
                </div>

            </div>



            <div class="grid3">
                
                <div class="form__item">
                    <label for="" class="form__label">Semester:</label>
                    <h3><?php echo $data['studentInfo']->semester . " " . $data['studentInfo']->academic_year?></h3>
                </div>
                <div class="form__item">
                    <label for="" class="form__label">Process:</label>
                    <h3><?php echo $data['validated']?></h3>
                </div>
                <?php if($data['subjects'] != ""):?>
                <div class="form__item">
                    <?php foreach($data['subjects'] as $subject):?>
                        <?php $data['total'] += $subject->lec_units;?>
                        <?php endforeach;?>
                    <label for="" class="form__label">Total Units:</label>
                    <h3> <?php echo $data['total']?></h3>
                </div>
            </div>

            
            <div class="table__content">
            <table class="content-table">
                <thead>
                    <tr>
                       
                        <th>Sched Code</th>
                        <th>Program</th>
                        <th>Year Level</th>
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
                   
                    
                    <?php foreach($data['subjects'] as $subject):?>
                    <tr>
                        
                        <td><?php echo $subject->sched_code;?></td>
                        <td><?php echo $subject->program;?></td>
                        <td><?php echo $subject->yearLevel;?></td>
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
                   
                </tbody>
                    
            </table>
        </div>

        </div>
</section>

