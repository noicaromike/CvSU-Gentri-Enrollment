<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/navigation.php';
    
?>



<div class="register__container container">
    
    <h2>Application for Admission Form</h2>
    <?php if(empty($data['control_no'])):?>
        <h2><?php echo $data['control_no'] = "GT-0000001";?></h2>
    <?php else:?>
        <h2><?php  $idd = str_replace("GT-","",$data['control_no']);
                    $id = str_pad($idd + 1,7,0, STR_PAD_LEFT);
                  echo $data['control_no'] = 'GT-' . $id;
        ?></h2> 
    <?php endif;?>   
            
            
                <h3>
                    <?php echo $data['semester']->year;?>
                </h3>
                <h3>
                    <?php echo $data['semester']->semester;?>
                </h3>

              
                
        <form action="<?php echo URLROOT;?>/admissions/form" method="POST" enctype="multipart/form-data" class="register__form form" id="regForm">
                    
             <div class="register__title">
                Please Indicated the Preferred Course
            </div>

            <!-- ======STEP-1======= -->
            <div class="step step-1">
                <div class="form__item">
                    <label for="firstCourse" class="form__label">First choice <span class="red">*</span></label>
                    <select name="firstCourse" id="firstCourse" class="select form__input">
                        <option disabled selected >Choose course</option>
                        <?php foreach($data['courses'] as $course):?>
                        <option <?= get_select('firstCourse', $course->name)?> value="<?php echo $course->name;?>"><?php echo $course->name;?></option>
                        <?php endforeach;?>
                    </select>
                    <span class="invalidFeedback">
                            <?php echo $data['firstCourseError']; ?>
                    </span>
                </div>
                <div class="form__item">
                    <label for="secondCourse" class="form__label">Second choice <span class="red">*</span></label>
                    <select name="secondCourse" id="secondCourse" class="select form__input">
                        <option disabled selected>Choose course</option>
                        <?php foreach($data['courses'] as $course):?>
                        <option <?= get_select('secondCourse', $course->name)?> value="<?php echo $course->name;?>"><?php echo $course->name;?></option>
                        <?php endforeach;?>
                    </select>
                    <span class="invalidFeedback">
                            <?php echo $data['secondCourseError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="thirdCourse" class="form__label">Third choice <span class="red">*</span></label>
                    <select name="thirdCourse" id="thirdCourse" class="select form__input">
                        <option disabled selected>Choose course</option>
                        <?php foreach($data['courses'] as $course):?>
                        <option <?= get_select('thirdCourse', $course->name)?> value="<?php echo $course->name;?>"><?php echo $course->name;?></option>
                        <?php endforeach;?>
                    </select>
                    <span class="invalidFeedback">
                            <?php echo $data['thirdCourseError']; ?>
                        </span>
                </div>
            </div>

            <!-- ======STEP-2======= -->

            <div class="register__title">
                Application Information
            </div>
            <div class="step step-2">
                    <div class="form__item">
                        <label for="firstName" class="form__label">First Name <span class="red">*</span></label>
                        <input type="text" class="form__input" name="firstName" value="<?php echo $_SESSION['firstname'];?>" placeholder="First Name">
                        <span class="invalidFeedback">
                            <?php echo $data['firstNameError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="MiddleName" class="form__label">Middle Name<small class="none">(if none, put N/A)</small> </label>
                        <input type="text" class="form__input" name="MiddleName" value="<?= get_var('MiddleName')?>" placeholder="Middle Name">
                        <span class="invalidFeedback">
                            <?php echo $data['MiddleNameError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="LastName" class="form__label">Last Name <span class="red">*</span></label>
                        <input type="text" class="form__input" name="LastName" value="<?php echo $_SESSION['lastname'];?>" placeholder="Last Name">
                        <span class="invalidFeedback">
                            <?php echo $data['LastNameError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="suffix" class="form__label">Suffix<small class="none">(if none, put N/A)</small></label>
                        <input type="text" class="form__input" value="<?= get_var('suffix')?>" name="suffix" placeholder="Suffix">
                        <span class="invalidFeedback">
                            <?php echo $data['suffixError']; ?>
                        </span>
                    </div>
                    
                    <div class="form__item">
                        <label class="form__label">Gender <span class="red">*</span></label>
                        <div class="gender__item">
                        <?php foreach($data['allgender'] as $gender):?>
                        <div class="radio__container">
                            <input type="radio" name="gender" class="radio__btn" id="gender" <?= get_checked('gender', $gender->gender)?> value="<?php echo $gender->gender;?>">
                        </div>
                        <label for="gender" class="form__label"><?php echo $gender->gender;?></label>
                        <?php endforeach;?>
                        </div>
                        <span class="invalidFeedback">
                            <?php echo $data['genderError']; ?>
                        </span>
                    </div>
                    
                    <div class="form__item">
                        <label class="form__label">Civil Status <span class="red">*</span></label>
                        <div class="gender__item">
                        <?php foreach($data['civilStatuses'] as $civilStatus):?>
                        <div class="radio__container">
                            <input type="radio"  name="civilStatus" class="radio__btn" id="civilStatus" <?= get_checked('civilStatus', $civilStatus->civilStatus)?> value="<?php echo $civilStatus->civilStatus;?>">
                        </div>
                        <label for="civilStatus" class="form__label"><?php echo $civilStatus->civilStatus;?></label>
                        <?php endforeach;?>
                        </div>
                        <span class="invalidFeedback">
                            <?php echo $data['civilStatusError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                            <label for="Age" class="form__label">Age <span class="red">*</span></label>
                            <input type="text" class="form__input" name="Age" value="<?= get_var('Age')?>" placeholder="Age">
                            <span class="invalidFeedback">
                            <?php echo $data['AgeError']; ?>
                        </span>
                        </div>
                        <div class="form__item">
                            <label for="dateOfBirth" class="form__label">Date of Birth <span class="red">*</span></label>
                            <input type="date" class="form__input" name="dateOfBirth" value="<?= get_var('dateOfBirth')?>">
                            <span class="invalidFeedback">
                            <?php echo $data['dateOfBirthError']; ?>
                        </span>
                        </div>
                        <div class="form__item">
                            <label for="Religion" class="form__label">Religion <span class="red">*</span></label>
                            <input type="text" class="form__input" name="Religion" value="<?= get_var('Religion')?>"placeholder="Religion">
                            <span class="invalidFeedback">
                            <?php echo $data['ReligionError']; ?>
                        </span>
                        </div>
                        <div class="form__item">
                            <label for="Nationality" class="form__label">Nationality <span class="red">*</span></label>
                            <input type="text" class="form__input" name="Nationality" value="<?= get_var('Nationality')?>" placeholder="Nationality">
                            <span class="invalidFeedback">
                            <?php echo $data['NationalityError']; ?>
                            </span>
                        </div>
                        
                        <div class="form__item">
                            <label for="Married" class="form__label">If Married<small class="none">(if not, put N/A)</small></label>
                            <input type="text" class="form__input" name="Married" value="<?= get_var('Married')?>" placeholder="Name of Spouse">
                            <span class="invalidFeedback">
                            <?php echo $data['MarriedError']; ?>
                            </span>
                        </div>

            </div>
 
            <!-- ======STEP-3======= -->
            <div class="register__title">
                    Current Address
                </div>
            <div class="step step-3">
                <div class="form__item">
                    <label for="currentStreetNo" class="form__label">Street No./House No. <span class="red">*</span></label>
                    <input type="text" class="form__input" name="currentStreetNo" value="<?= get_var('currentStreetNo')?>" placeholder="Street No.">
                    <span class="invalidFeedback">
                            <?php echo $data['currentStreetNoError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="currentBarangay" class="form__label">Barangay <span class="red">*</span></label>
                    <input type="text" class="form__input" name="currentBarangay" value="<?= get_var('currentBarangay')?>" placeholder="Barangay">
                    <span class="invalidFeedback">
                            <?php echo $data['currentBarangayError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="currentMunicipality" class="form__label">Municipality <span class="red">*</span></label>
                    <input type="text" class="form__input" name="currentMunicipality" value="<?= get_var('currentMunicipality')?>" placeholder="Municipality">
                    <span class="invalidFeedback">
                            <?php echo $data['currentMunicipalityError']; ?>
                        </span>
                </div>
            </div>
            <!-- ======STEP-4======= -->
            <div class="register__title">
                    Permanent Address
            </div>
            <div class="step step-4">
                <div class="form__item">
                    <label for="permanentStreetNo" class="form__label">Street No./House No. <span class="red">*</span></label>
                    <input type="text" class="form__input" name="permanentStreetNo" value="<?= get_var('permanentStreetNo')?>" placeholder="Street No.">
                    <span class="invalidFeedback">
                            <?php echo $data['permanentStreetNoError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="permanentBarangay" class="form__label">Barangay <span class="red">*</span></label>
                    <input type="text" class="form__input" name="permanentBarangay" value="<?= get_var('permanentBarangay')?>" placeholder="Barangay">
                    <span class="invalidFeedback">
                            <?php echo $data['permanentBarangayError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="permanentMunicipality" class="form__label">Municipality <span class="red">*</span></label>
                    <input type="text" class="form__input" name="permanentMunicipality" value="<?= get_var('permanentMunicipality')?>" placeholder="Municipality">
                    <span class="invalidFeedback">
                            <?php echo $data['permanentMunicipalityError']; ?>
                        </span>
                </div>
            </div>


            <!-- ========STEP-5======== -->
            <div class="register__title">
                    Family Background
                </div>
            <div class="step step-5">
                <div class="form__item">
                    <label for="fatherFullName" class="form__label">Father's Full name <span class="red">*</span></label>
                    <input type="text" class="form__input" name="fatherFullName" value="<?= get_var('fatherFullName')?>" placeholder="Full Name">
                    <span class="invalidFeedback">
                            <?php echo $data['fatherFullNameError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="fatherOccupation" class="form__label">Occupation<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="fatherOccupation" value="<?= get_var('fatherOccupation')?>" placeholder="Occupation">
                    <span class="invalidFeedback">
                            <?php echo $data['fatherOccupationError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="fatherContact" class="form__label">Contact No.<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="fatherContact" value="<?= get_var('fatherContact')?>" placeholder="Contact No.">
                    <span class="invalidFeedback">
                            <?php echo $data['fatherContactError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="motherFullName" class="form__label">Mother's Full Name <span class="red">*</span></label>
                    <input type="text" class="form__input" name="motherFullName" value="<?= get_var('motherFullName')?>" placeholder="Full Name">
                    <span class="invalidFeedback">
                            <?php echo $data['motherFullNameError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="motherOccupation" class="form__label">Occupation<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="motherOccupation" value="<?= get_var('motherOccupation')?>" placeholder="Occupation">
                    <span class="invalidFeedback">
                            <?php echo $data['motherOccupationError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="motherContact" class="form__label">Contact No.<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="motherContact" value="<?= get_var('motherContact')?>" placeholder="Contact No.">
                    <span class="invalidFeedback">
                            <?php echo $data['motherContactError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="guardianFullName" class="form__label">Guardian's Full Name <span class="red">*</span></label>
                    <input type="text" class="form__input" name="guardianFullName" value="<?= get_var('guardianFullName')?>" placeholder="Full Name">
                    <span class="invalidFeedback">
                            <?php echo $data['guardianFullNameError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="guardianOccupation" class="form__label">Occupation<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="guardianOccupation" value="<?= get_var('guardianOccupation')?>" placeholder="Occupation">
                    <span class="invalidFeedback">
                            <?php echo $data['guardianOccupationError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="guardianContact" class="form__label">Contact No.<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="guardianContact" value="<?= get_var('guardianContact')?>" placeholder="Contact No.">
                    <span class="invalidFeedback">
                            <?php echo $data['guardianContactError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="noSibling" class="form__label">Number of Sibling/s <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="noSibling" value="<?= get_var('noSibling')?>" placeholder="Number of Sibling/s">
                    <span class="invalidFeedback">
                            <?php echo $data['noSiblingError']; ?>
                        </span>
                </div>

                <div class="form__item">
                        <label class="form__label">Birth Order <span class="red">*</span></label>
                        <div class="birthOrder__item">
                        <?php foreach($data['birthOrders'] as $birth_order):?>
                        <div class="radio__container">
                            <input type="radio" name="birthOrder" class="radio__btn" id="birthOrder" <?= get_checked('birthOrder', $birth_order->birthOrder)?> value="<?php echo $birth_order->birthOrder; ?>">
                            <label for="birthOrder" class="form__label"><?php echo $birth_order->birthOrder;?></label>
                        </div>
                        <?php endforeach;?>
                        </div>
                        <span class="invalidFeedback">
                            <?php echo $data['birthOrderError']; ?>
                        </span>
                </div>
            </div>
                <!-- ======STEP-6===== -->
            <div class="register__title">
                    Estimated Monthly Family Income
            </div>
           
                <div class="form__item">
                        <label class="form__label">Family Income <span class="red">*</span></label>
                        <div class="income__item">
                        <?php foreach($data['Incomes'] as $incomes):?>
                        <div class="radio__container">
                                <input type="radio" name="Income" class="radio__btn" id="Income" <?= get_checked('Income', $incomes->income)?> value="<?php echo $incomes->income; ?>">
                                <label for="Income" class="form__label"><?php echo $incomes->income;?></label>
                        </div>
                        <?php endforeach;?>
                        </div>
                        <span class="invalidFeedback">
                            <?php echo $data['IncomeError']; ?>
                        </span>
                </div>


            <!-- ======STEP-7===== -->
            <div class="register__title">
                    Educational Background
            </div>
            <div class="step step-7">
                <div class="form__item">
                    <label for="elemSchool" class="form__label">Elementary <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="elemSchool" value="<?= get_var('elemSchool')?>"  placeholder="Name of School">
                    <span class="invalidFeedback">
                            <?php echo $data['elemSchoolError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="elemAddress" class="form__label">Address <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="elemAddress" value="<?= get_var('elemAddress')?>" placeholder="Address">
                    <span class="invalidFeedback">
                            <?php echo $data['elemAddressError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="elemGraduate" class="form__label">Year Graduated <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="elemGraduate" value="<?= get_var('elemGraduate')?>" placeholder="Year">
                    <span class="invalidFeedback">
                            <?php echo $data['elemGraduateError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="secondarySchool" class="form__label">Secondary <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="secondarySchool" value="<?= get_var('secondarySchool')?>" placeholder="Name of School">
                    <span class="invalidFeedback">
                            <?php echo $data['secondarySchoolError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="secondaryAddress" class="form__label">Address <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="secondaryAddress" value="<?= get_var('secondaryAddress')?>" placeholder="Address">
                    <span class="invalidFeedback">
                            <?php echo $data['secondaryAddressError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="secondaryGraduate" class="form__label">Year Graduated <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="secondaryGraduate" value="<?= get_var('secondaryGraduate')?>" placeholder="Year">
                    <span class="invalidFeedback">
                            <?php echo $data['secondaryGraduateError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="seniorHsSchool" class="form__label">Senior HS <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="seniorHsSchool" value="<?= get_var('seniorHsSchool')?>" placeholder="Name of School">
                    <span class="invalidFeedback">
                            <?php echo $data['seniorHsSchoolError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="seniorHsAddress" class="form__label">Address <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="seniorHsAddress" value="<?= get_var('seniorHsAddress')?>" placeholder="Address">
                    <span class="invalidFeedback">
                            <?php echo $data['seniorHsAddressError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="seniorHsGraduate" class="form__label">Year Graduated <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="seniorHsGraduate" value="<?= get_var('seniorHsGraduate')?>" placeholder="Year">
                    <span class="invalidFeedback">
                            <?php echo $data['seniorHsGraduateError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="alsSchool" class="form__label">ALS <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="alsSchool" value="<?= get_var('alsSchool')?>" placeholder="Name of School">
                    <span class="invalidFeedback">
                            <?php echo $data['alsSchoolError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="alsAddress" class="form__label">Address <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="alsAddress" value="<?= get_var('alsAddress')?>" placeholder="Address">
                    <span class="invalidFeedback">
                            <?php echo $data['alsAddressError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="alsGraduate" class="form__label">Year Graduated <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="alsGraduate" value="<?= get_var('alsGraduate')?>" placeholder="Year">
                    <span class="invalidFeedback">
                            <?php echo $data['alsGraduateError']; ?>
                    </span>
                </div>
                <div class="form__item">
                    <label for="collegeSchool" class="form__label">College <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="collegeSchool" value="<?= get_var('collegeSchool')?>" placeholder="Name of School">
                    <span class="invalidFeedback">
                            <?php echo $data['collegeSchoolError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="collegeAddress" class="form__label">Address <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="collegeAddress" value="<?= get_var('collegeAddress')?>" placeholder="Address">
                    <span class="invalidFeedback">
                            <?php echo $data['collegeAddressError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="collegeGraduate" class="form__label">Year Graduated <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="collegeGraduate" value="<?= get_var('collegeGraduate')?>" placeholder="Year">
                    <span class="invalidFeedback">
                            <?php echo $data['collegeGraduateError']; ?>
                    </span>
                </div>
            </div> 


            <!-- ======STEP-8===== -->


            <div class="register__title">
                    Medical History Information
            </div>

            <div class="step step-8">
                    <div class="form__item">
                        <label for="medication" class="form__label">List any Medication you are taking <small>(if none, put N/A)</small></label>
                        <input type="text" class="form__input" name="medication" value="<?= get_var('medication')?>" placeholder="Medication">
                        <span class="invalidFeedback">
                            <?php echo $data['medicationError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="allergicTo" class="form__label">Specifically, allergic to <small>(if none, put N/A)</small></label>
                        <input type="text" class="form__input" name="allergicTo" value="<?= get_var('allergicTo')?>" placeholder="Allergy">
                        <span class="invalidFeedback">
                            <?php echo $data['allergicToError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="specifyOther" class="form__label">if Other, Please specify <small>(if none, put N/A)</small></label>
                        <input type="text" class="form__input" name="specifyOther" value="<?= get_var('specifyOther')?>" placeholder="Other">
                        <span class="invalidFeedback">
                            <?php echo $data['specifyOtherError']; ?>
                        </span>
                    </div>
                   
            </div>
                    <div class="form__item">
                        <label class="form__label">have: <span class="red">*</span></label>
                        <div class="medhistory__item">
                        <?php foreach($data['medHistorys'] as $med):?>
                        <div class="radio__container">
                                <input type="radio" name="medicalHistory" class="checkbox__btn" <?= get_checked('medicalHistory', $med->medicalHistory)?> id="medicalHistory" value="<?php echo $med->medicalHistory; ?>">
                                <label for="medicalHistory" class="form__label"><?php echo $med->medicalHistory;?></label>
                        </div>
                        <?php endforeach;?>
                        </div>
                    </div>
                        <span class="invalidFeedback">
                            <?php echo $data['medicalHistoryError']; ?>
                        </span>
            <!-- ========STEP-9========= -->
            <div class="register__title">
                     Contact No. and Requirements
            </div>

            <div class="step step-9">
                    <div class="form__item">
                        <label for="applicantContact" class="form__label">Contact No. <span class="red">*</span></label>
                        <input type="text" class="form__input" name="applicantContact" <?= get_var('applicantContact');?> placeholder="Contact No.">
                        <span class="invalidFeedback">
                            <?php echo $data['applicantContactError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="applicantEmail" class="form__label">Email-Address <span class="red">*</span></label>
                        <input type="text" class="form__input" name="applicantEmail" value="<?php echo $_SESSION['email']?>" placeholder="Email-Address">
                        <span class="invalidFeedback">
                            <?php echo $data['applicantEmailError']; ?>
                        </span>
                    </div>
            </div>
            <div class="step step-10">
                <div class="form__item">
                    <label for="reportCard" class="form__label">Report Card/Certificate <span class="red">*</span></label>
                    <input type="file" class="form__input" name="reportCard">
                    <label for="reportCard" class="form__label small">Upload photo less than 2MB.</label>

                    <span class="invalidFeedback">
                            <?php echo $data['reportCardError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="goodMoral" class="form__label">Certificate of Good Moral <span class="red">*</span></label>
                    <input type="file" class="form__input" name="goodMoral">
                    <label for="reportCard" class="form__label small">Upload photo less than 2MB.</label>
                    <span class="invalidFeedback">
                            <?php echo $data['goodMoralError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="oneByOne" class="form__label">1 x 1 picture <span class="red">*</span></label>
                    <input type="file" class="form__input" name="oneByOne">
                    <label for="reportCard" class="form__label small">Upload photo less than 2MB.</label>
                    <span class="invalidFeedback">
                            <?php echo $data['oneByOneError']; ?>
                        </span>
                </div>
                
                <div class="form__item">
                        <label class="form__label">Application Type <span class="red">*</span></label>
                        <div class="gender__item">
                        <?php foreach($data['applicationtype'] as $applicationtype):?>
                        <div class="radio__container">
                            <input type="radio" name="applicationType" class="radio__btn" id="applicationType" <?= get_checked('applicationType', $applicationtype->applicationType)?> value="<?php echo $applicationtype->applicationType;?>">
                        </div>
                        <label for="applicationType" class="form__label"><?php echo $applicationtype->applicationType;?></label>
                        <?php endforeach;?>
                        </div>
                        <span class="invalidFeedback">
                            <?php echo $data['applicationTypeError']; ?>
                        </span>
                    </div>
            </div>
            <div class="form__item note">
                    <label class="form__label">Please double check your input field before submitting the form.</label>
                    
                </div>
            
                <div class="form__item">
                    <div class="checkbox">
                        <input type="checkbox" id="check" value="check" name="condition">
                        <label for="condition" class="form__label form__condition"> In accordance with Data Privacy. act of 2012 (RA No. 101713), what ever information collected will remain confidential. I confirm that the personal data provided herein is true and correct to the best of my knowledge and I allow the CvSU General Trias Campus to use my details to create my profile in the enrollment system.</label>
                        <br>
                        <span class="invalidFeedback">
                            <?php echo $data['conditionError']; ?>
                        </span>
                    </div>
                </div>
                   
            

            <div class="newapplicant-btn">
                <button type="submit" class="form__btn newapplicant-btn">Submit</button>
            </div>
           

    </form>
</div>