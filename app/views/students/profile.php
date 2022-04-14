<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/navigation.php';
    
?>


<section class=" section">
        <div class="student__container container">
            <div class="student__content form">
                <div class="student__info">
                    <div class="profile__content">
                        <h2>Student Information</h2>
                        <?php if(!empty($data['applicants'])):?>
                        
                            <div class="student__img">
                                <img src="<?php echo URLROOT . "/public/applicantimage/" . $data['applicants']->oneByOne?>" alt="">
                            </div>
                       
                            <div class="form__item">
                                
                                <label class="form__label">Control No: <?php echo $data['applicants']->control_no?></label>
                                <label class="form__label">Status: <?php echo $data['applicants']->status?></label>
                            </div>

                            <?php endif;?>
                            
                           
                            

                            <?php if(empty($data['applicants'])):?>
                                
                                    <div class="student__img">
                                        <img src="<?php echo URLROOT;?>/public/img/profile.png" alt="">
                                    </div>
                                

                            <div class="form__item">
                                <label class="form__label">Control No: </label>
                                <label class="form__label">Status: </label>
                            </div>
                            <?php endif;?>
                        
                        <div class="form__item student__item">
                            <p><?php echo $_SESSION['firstname']. " " . $_SESSION['lastname'] ?></p>
                            <p><?php echo $_SESSION['email'] ?></p>
                          
                            
                            
                           
                            
                        </div>
                        
                    </div>
                    <div class="semester__content">
                            <?php if(empty($data['semester'])):?>
                                <p>The Application for Admission will open soon.
                                Check back again next time. Visit and Follow our page for more details.</p>
                                <?php endif;?>
                            <?php if(!empty($data['semester'])):?>
                            <p>The Application for Admission for AY <?php echo $data['active']->semester . " " . $data['active']->year?> is now open. </p>
                           
                            <?php endif;?>
                                <div class="semester__nav">
                                    <?php if($data['semester'] && empty($data['applicants']->status)):?>
                                    <a href="<?php echo URLROOT;?>/admissions/form" class="form__btn enroll__btn">Enroll</a>
                                   
                                    <?php endif;?>
                                    
                                    <div class="semester__navlink">
                                        <a href="<?php echo URLROOT . "/students/edit/". $_SESSION['id']?> "  class="form__btn enroll__btn">Profile</a>
                                        <a href="<?php echo URLROOT;?>/pages/logout" class="form__btn enroll__btn">Log out</a>
                                    </div>
                                    
                                </div>
                            
                                    
                                    <?php if(!empty($data['applicants']->status) && $data['applicants']->status == "Exam/Interview"): ?>
                                        <div class="form__item">
                                            <a href="<?php echo URLROOT . "/students/confirm/". $_SESSION['id']?> " class="form__btn enroll__btn">Confirm</a>
                                        </div>
                                    <?php endif; ?>
                                   <?php if(!empty($data['applicants']->status) && $data['applicants']->validated != 2 && $data['applicants']-> status != "Exam/Interview" && $data['applicants']->status != "For Submission" && $data['applicants']->status != "Pre-Enrolled"):?>
                                   <div class="form__item">
                                   <a href="<?php echo URLROOT . "/students/editprof/". $_SESSION['id']?> " class="form__btn green">view application</a>
                                   </div> 


                                    <?php endif;?>
                                    <?php if(!empty($data['applicants']->status) && !empty($data['applicants']->validated && $data['applicants']->validated == 3)):?>
                                    <div class="form__item">
                                        <a href="" class="form__btn green">Re-Enroll</a>
                                    </div>
                                    <?php endif;?>
                                   
                                    
                                   

                    </div>
                </div>
               
             </div>
             <div class="container fixtop">
             <?php if(empty($data['applicants']->status)):?>
                <div class="requirements form">
                <div class="form__item require__item">
                    <h3>DOCUMENTS/CREDENTIALS TO BE SUBMITTED</h3>
                    <p>First Year Applicants (SHS graduates)</p>
                    <ul class="requirements__list">
                        <li class="requirements__item">Accomplished Application for Admission Form/Control no.</li>
                        <li class="requirements__item">Certified True copies of: <ul class="requirements__list">
                            <li class="requirements__item">Grade-12 Report Card</li>
                            <li class="requirements__item">Good Moral Certificate</li>
                            

                        </ul> </li>
                        <li class="requirements__item">2 copies of 1 x 1 ID picture with name tag</li>
                        <li class="requirements__item">Short ordinary folder</li>

                    </ul>
                </div>
                <div class="form__item require__item">
                    <p>First Year Applicants (ALS passers)</p>
                    <ul class="requirements__list">
                        <li class="requirements__item">Accomplished Application for Admission Form/Control no.</li>
                        <li class="requirements__item">Certified True copies of: <ul class="requirements__list">
                            <li class="requirements__item">Certificate of Rating</li>
                            <li class="requirements__item">Good Moral Certificate</li>
                            

                        </ul> </li>
                        <li class="requirements__item">2 copies of 1 x 1 ID picture with name tag</li>
                        <li class="requirements__item">Short ordinary folder</li>

                    </ul>
                </div>
                <div class="form__item require__item">
                    <p>Transferees (Those who started college level from other university/school)</p>
                    <ul class="requirements__list">
                        <li class="requirements__item">Accomplished Application for Admission Form/Control no.</li>
                        <li class="requirements__item">Certified True copies of: <ul class="requirements__list">
                            <li class="requirements__item">Transcript of Records or Copy of Grades(duly signed by registrar)</li>
                            <li class="requirements__item">Good Moral Certificate</li>
                            <li class="requirements__item">Honor Dismissal</li>

                        </ul> </li>
                        
                        <li class="requirements__item">Photocopy of NBI Clearance</li>
                        <li class="requirements__item">2 copies of 1 x 1 ID picture with name tag</li>

                        <li class="requirements__item">Short ordinary folder</li>

                    </ul>
                </div>
                <div class="form__item require__item">
                    <p>Second Courser(Those who graduated in any four year Program/Course or Bachelor's Degree)</p>
                    <ul class="requirements__list">
                        <li class="requirements__item">Accomplished Application for Admission Form/Control no.</li>
                        <li class="requirements__item">Certified True copies of: <ul class="requirements__list">
                            <li class="requirements__item">Transcript of Records</li>
                            <li class="requirements__item">Transcript of Credential Certificate</li>

                        </ul> </li>
                        <li class="requirements__item">2 copies of 1 x 1 ID picture with name tag</li>
                        <li class="requirements__item">Short ordinary folder</li>
                        

                    </ul>
                </div>

                <?php else:?>
                    <?php if($data['applicants']->validated == 2):?>

                <div class="form__title cor">
                    <h2>Copy of Certificate of Registration</h2>

                </div>
                <div class="grid3">
                    <div class="form__item">
                        <label class="form__label">School Year: <?php echo $data['applicants']->academic_year?></label>
                        <label class="form__label">Student No: <?php echo $data['applicants']->student_no?></label>
                        
                    </div>
                    <div class="form__item">
                    <label class="form__label">Semester: <?php echo $data['applicants']->semester . " " .$data['applicants']->academic_year?></label>
                        <label class="form__label">Section: <?php echo $data['applicants']->section?></label>
                    </div>
                    <?php foreach($data['subjects'] as $subject):?>
                        <?php $data['total'] += $subject->lec_units;?>
                        <?php endforeach;?>
                    <div class="form__item">
                        <label class="form__label">Total Units: <?php echo $data['total'];?></label>

                    </div>


                </div>
                        
                    

    


                <div class="table__content">
                        
                        <table class="content-table">
                            <thead>
                                <tr>
                                    
                                    
                                    <th>Course Code</th>
                                    <th>Course Description</th>
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
                                
                                    
                                    <td><?php echo $subject->course_code;?></td>
                                    <td><?php echo $subject->title;?></td>
                                    <td><?php echo $subject->lec_units;?></td>
                                    <td><?php echo $subject->lab_units;?></td>
                                    <td><?php echo $subject->lec_hours;?></td>
                                    <td><?php echo $subject->lab_hours;?></td>
                                    <td><?php echo $subject->preReq;?></td>
                                
                                
                                </tr>
                                <?php endforeach;?>
                                
                                        
                            
                            
                            </tbody>
                                
                        </table>
                    </div>
            <?php endif;?>


           <?php endif;?>

          
           </div>


           
        
        </div>

        </div>
</section>


