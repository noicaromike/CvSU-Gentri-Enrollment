<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/navigation.php';
    
?>


<?php 
    guard();
?>

<section class="student section">
    <div class="view__approval container">
            <div class="applicant__title">
                <h2>Applicant Information</h2>
            </div>
            
            <div class="grid3">
               <div class="form__item form__group-item">
                    
                    <label class="form__label">Application:<span class="form__weight"> <?php echo $data['applicant']->applicationType?></span></label>
                    <label class="form__label">Control no:<span class="form__weight"> <?php echo $data['applicant']->control_no?></span></label>
                   
                    
               </div>
               <div class="form__item form__group-item">
                    
                    <label class="form__label">Semester:<span class="form__weight"> <?php echo $data['applicant']->semester ?></span></label>
                    <label class="form__label">Academic Year:<span class="form__weight"> <?php echo $data['applicant']->academic_year ?></span></label>
               </div>
                <div class="grid-2">
                    <a href="<?php echo URLROOT . "/students/editinfo/". $_SESSION['id']?> " class="form__btn enroll__btn">Edit</a>
                </div>
               
            </div>
            <p>Preferred Course</p>
            <div class="grid3">
                 <div class="form__item form__group-item">
                    <label class="form__label">First Course:<span class="form__weight"> <?php echo $data['applicant']->firstCourse?></span></label>
                 </div>
                 <div class="form__item form__group-item">
                    <label class="form__label">Second Course:<span class="form__weight"> <?php echo $data['applicant']->secondCourse?></span></label>
                 </div>
                 <div class="form__item form__group-item">
                    <label class="form__label">Third Course:<span class="form__weight"> <?php echo $data['applicant']->thirdCourse?></span></label>
                 </div>
            </div>
            <div class="applicant__title">
                Personal Information
            </div>
            <div class="grid3">
                <div class="form__item form__group-item">
                    <label class="form__label">Full Name: <span class="form__weight"><?php echo $data['applicant']->firstName . " " . $data['applicant']->MiddleName . " " . $data['applicant']->LastName ?></span></label>
                    <label class="form__label">suffix:<span class="form__weight"> <?php echo $data['applicant']->suffix?></span></label>
                    <label class="form__label">Email Address: <span class="form__weight"> <?php echo $data['applicant']->applicantEmail?></span></label>
                    <label class="form__label">Contact no: <span class="form__weight"> <?php echo $data['applicant']->applicantContact?></span></label>
                   
                </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Religion: <span class="form__weight"> <?php echo $data['applicant']->Religion?></span></label>
                    <label class="form__label">Nationality: <span class="form__weight"> <?php echo $data['applicant']->Nationality?></span></label>
                    <label class="form__label">Name of spouse: <span class="form__weight"> <?php echo $data['applicant']->Married?></span></label>
                    
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Gender:<span class="form__weight"> <?php echo $data['applicant']->gender?></span></label>
                    <label class="form__label">Civil Status: <span class="form__weight"> <?php echo $data['applicant']->civilStatus?></span></label>
                    <label class="form__label">Age: <span class="form__weight"> <?php echo $data['applicant']->Age?></span></label>
                    <label class="form__label">Date of Birth: <span class="form__weight"> <?php echo $data['applicant']->dateOfBirth?></span></label>
               </div>
            </div>
                <!-- =========Address============= -->
            <div class="applicant__title">
                  Address
            </div> 
            <div class="form__item">
                <label class="form__label">Current Address: <span class="form__weight"> <?php echo $data['applicant']->currentStreetNo . " " . $data['applicant']->currentBarangay . " " . $data['applicant']->currentMunicipality?></span></label>
                <label class="form__label">Permanent Address: <span class="form__weight"> <?php echo $data['applicant']->permanentStreetNo . " " . $data['applicant']->permanentBarangay . " " . $data['applicant']->permanentMunicipality?></span></label>
            </div>
            <div class="applicant__title">
                  Family Background
            </div> 

            <div class="grid3">
                <div class="form__item form__group-item">
                    <label class="form__label">Father's Name: <span class="form__weight"> <?php echo $data['applicant']->fatherFullName?></span></label>
                    <label class="form__label">Occupation: <span class="form__weight"> <?php echo $data['applicant']->fatherOccupation?></span></label>
                    <label class="form__label">Contact no: <span class="form__weight"> <?php echo $data['applicant']->fatherContact?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Mother's Name: <span class="form__weight"> <?php echo $data['applicant']->motherFullName?></span></label>
                    <label class="form__label">Occupation: <span class="form__weight"> <?php echo $data['applicant']->motherOccupation?></span></label>
                    <label class="form__label">Contact no: <span class="form__weight"> <?php echo $data['applicant']->motherContact?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Guardian's Name: <span class="form__weight"> <?php echo $data['applicant']->guardianFullName?></span></label>
                    <label class="form__label">Occupation: <span class="form__weight"> <?php echo $data['applicant']->guardianOccupation?></span></label>
                    <label class="form__label">Contact no: <span class="form__weight"> <?php echo $data['applicant']->guardianContact?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Number of Sibling/s: <span class="form__weight"> <?php echo $data['applicant']->noSibling?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Birth Order: <span class="form__weight"> <?php echo $data['applicant']->birthOrder?></span></label>
               </div>
               
               <div class="form__item form__group-item">
                    <label class="form__label">Family Income: <span class="form__weight"> <?php echo $data['applicant']->Income?></span></label>
               </div>
            </div>
            <div class="applicant__title">
                  Educational Background
            </div> 
            <p>Elementary</p>
            <div class="grid3">
                <div class="form__item form__group-item">
                    <label class="form__label">School name: <span class="form__weight"> <?php echo $data['applicant']->elemSchool?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Address: <span class="form__weight"> <?php echo $data['applicant']->elemAddress?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Year Graduated: <span class="form__weight"> <?php echo $data['applicant']->elemGraduate?></span></label>
               </div>
            </div>
            <p>Secondary</p>
            <div class="grid3">
                <div class="form__item form__group-item">
                    <label class="form__label">School name: <span class="form__weight"> <?php echo $data['applicant']->secondarySchool?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Address: <span class="form__weight"> <?php echo $data['applicant']->secondaryAddress?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Year Graduated: <span class="form__weight"> <?php echo $data['applicant']->secondaryGraduate?></span></label>
               </div>
            </div>
            <p>Senior HS</p>
            <div class="grid3">
                <div class="form__item form__group-item">
                    <label class="form__label">School name: <span class="form__weight"> <?php echo $data['applicant']->seniorHsSchool?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Address: <span class="form__weight"> <?php echo $data['applicant']->seniorHsAddress?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Year Graduated: <span class="form__weight"> <?php echo $data['applicant']->seniorHsGraduate?></span></label>
               </div>
            </div>
            <p>ALS</p>
            <div class="grid3">
                <div class="form__item form__group-item">
                    <label class="form__label">School name: <span class="form__weight"> <?php echo $data['applicant']->alsSchool?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Address: <span class="form__weight"> <?php echo $data['applicant']->alsAddress?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Year Graduated: <span class="form__weight"> <?php echo $data['applicant']->alsGraduate?></span></label>
               </div>
            </div>
            <p>College For Second Courser</p>
            <div class="grid3">
                <div class="form__item form__group-item">
                    <label class="form__label">School name: <span class="form__weight"> <?php echo $data['applicant']->collegeSchool?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Address: <span class="form__weight"> <?php echo $data['applicant']->collegeAddress?></span></label>
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Year Graduated: <span class="form__weight"> <?php echo $data['applicant']->collegeGraduate?></span></label>
               </div>
            </div>
            <div class="applicant__title">
                  Medical History Information
            </div> 
            <div class="grid3">
               <div class="form__item form__group-item">
                    <label class="form__label">Medication: <span class="form__weight"> <?php echo $data['applicant']->medication?></span></label>
                    <label class="form__label">Allergy: <span class="form__weight"> <?php echo $data['applicant']->allergicTo?></span></label>
                    
               </div>
               <div class="form__item form__group-item">
                    <label class="form__label">Have: <span class="form__weight"> <?php echo $data['applicant']->medicalHistory?></span></label>
                    <label class="form__label">Other,Specify: <span class="form__weight"> <?php echo $data['applicant']->specifyOther?></span></label>
               </div>
            </div>
            <div class="applicant__title">
                  Requirements
            </div> 
            <div class="grid3">
            <div class="form__item">
               <label class="form__label">Report Card</label>
               <img id="myImg" src="<?php echo URLROOT . "/public/applicantimage/".$data['applicant']->reportCard;?>" alt="Report Card" width="200" height="200">
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                         <img class="modal-content" id="img01">
                         <div id="caption"></div>
                    </div>
                    
            </div>
            <div class="form__item">
               <label class="form__label">Good Moral</label>
               <img id="myImg" src="<?php echo URLROOT . "/public/applicantimage/".$data['applicant']->goodMoral;?>" alt="Good Moral" width="200" height="200">
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                         <img class="modal-content" id="img02">
                         <div id="caption"></div>
                    </div>
                    
            </div>
            <div class="form__item">
               <label class="form__label">1x1 picture</label>
               <img id="myImg" src="<?php echo URLROOT . "/public/applicantimage/".$data['applicant']->oneByOne;?>" alt="Good Moral" width="200" height="200">
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                         <img class="modal-content" id="img02">
                         <div id="caption"></div>
                    </div>
                    
            </div>
            <?php if($data['applicant']->applicationType == 'Transferee'):?>
               <div class="form__item">
               <label class="form__label">Honor Dismissal</label>
               <img id="myImg" src="<?php echo URLROOT . "/public/applicantimage/".$data['applicant']->honorDismissal;?>" alt="Honor Dismissal" width="200" height="200">
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                         <img class="modal-content" id="img02">
                         <div id="caption"></div>
                    </div>
                    
               </div>
               
               <?php endif;?>


               


            </div>
    </div>
</section>