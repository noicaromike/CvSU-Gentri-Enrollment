<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/navigation.php';
    
?>

<?php 
    guard();
?>
<div class="register__container container">
    
    <h2>Update Student Information</h2>
   
        <h2><?php echo $data['applicantUpdate']->control_no;?></h2> 
    
            
            <?php if($data['semester']):?>
                <h3>
                    <?php echo $data['semester']->year;?>
                </h3>
                <h3>
                    <?php echo $data['semester']->semester;?>
                </h3>

              <?php endif;?>
                
        <form action="<?php echo URLROOT.'/students/editinfo/'.$data['applicantUpdate']->users_id;?>" method="POST" enctype="multipart/form-data" class="register__form form" id="regForm">
       
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
                        <input type="text" class="form__input" name="MiddleName" value="<?php echo $data['applicantUpdate']->MiddleName;?>" placeholder="Middle Name">
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
                        <input type="text" class="form__input" value="<?php echo $data['applicantUpdate']->suffix;?>" name="suffix" placeholder="Suffix">
                        <span class="invalidFeedback">
                            <?php echo $data['suffixError']; ?>
                        </span>
                    </div>
                    
                    <div class="form__item">
                        <label class="form__label">Gender <span class="red">*</span></label>
                        <input type="text" class="form__input" value="<?php echo $data['applicantUpdate']->gender;?>" name="gender" placeholder="Gender">
                        <span class="invalidFeedback">
                            <?php echo $data['genderError']; ?>
                        </span>
                        
                    </div>
                    
                    <div class="form__item">
                        <label class="form__label">Civil Status <span class="red">*</span></label>
                        <input type="text" class="form__input" value="<?php echo $data['applicantUpdate']->civilStatus;?>" name="civilStatus" placeholder="Civil Status">
                        <span class="invalidFeedback">
                            <?php echo $data['civilStatusError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                            <label for="Age" class="form__label">Age <span class="red">*</span></label>
                            <input type="text" class="form__input" name="Age" value="<?php echo $data['applicantUpdate']->Age;?>" placeholder="Age">
                            <span class="invalidFeedback">
                            <?php echo $data['AgeError']; ?>
                        </span>
                        </div>
                        <div class="form__item">
                            <label for="dateOfBirth" class="form__label">Date of Birth <span class="red">*</span></label>
                            <input type="date" class="form__input" name="dateOfBirth" value="<?php echo $data['applicantUpdate']->dateOfBirth;?>">
                            <span class="invalidFeedback">
                            <?php echo $data['dateOfBirthError']; ?>
                        </span>
                        </div>
                        <div class="form__item">
                            <label for="Religion" class="form__label">Religion <span class="red">*</span></label>
                            <input type="text" class="form__input" name="Religion" value="<?php echo $data['applicantUpdate']->Religion;?>" placeholder="Religion">
                            <span class="invalidFeedback">
                            <?php echo $data['ReligionError']; ?>
                        </span>
                        </div>
                        <div class="form__item">
                            <label for="Nationality" class="form__label">Nationality <span class="red">*</span></label>
                            <input type="text" class="form__input" name="Nationality" value="<?php echo $data['applicantUpdate']->Nationality;?>" placeholder="Nationality">
                            <span class="invalidFeedback">
                            <?php echo $data['NationalityError']; ?>
                            </span>
                        </div>
                        
                        <div class="form__item">
                            <label for="Married" class="form__label">If Married<small class="none">(if not, put N/A)</small></label>
                            <input type="text" class="form__input" name="Married" value="<?php echo $data['applicantUpdate']->Married;?>" placeholder="Name of Spouse">
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
                    <input type="text" class="form__input" name="currentStreetNo" value="<?php echo $data['applicantUpdate']->currentStreetNo;?>" placeholder="Street No.">
                    <span class="invalidFeedback">
                            <?php echo $data['currentStreetNoError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="currentBarangay" class="form__label">Barangay <span class="red">*</span></label>
                    <input type="text" class="form__input" name="currentBarangay" value="<?php echo $data['applicantUpdate']->currentBarangay;?>" placeholder="Barangay">
                    <span class="invalidFeedback">
                            <?php echo $data['currentBarangayError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="currentMunicipality" class="form__label">Municipality <span class="red">*</span></label>
                    <input type="text" class="form__input" name="currentMunicipality" value="<?php echo $data['applicantUpdate']->currentMunicipality;?>" placeholder="Municipality">
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
                    <input type="text" class="form__input" name="permanentStreetNo" value="<?php echo $data['applicantUpdate']->permanentStreetNo;?>" placeholder="Street No.">
                    <span class="invalidFeedback">
                            <?php echo $data['permanentStreetNoError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="permanentBarangay" class="form__label">Barangay <span class="red">*</span></label>
                    <input type="text" class="form__input" name="permanentBarangay" value="<?php echo $data['applicantUpdate']->permanentBarangay;?>" placeholder="Barangay">
                    <span class="invalidFeedback">
                            <?php echo $data['permanentBarangayError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="permanentMunicipality" class="form__label">Municipality <span class="red">*</span></label>
                    <input type="text" class="form__input" name="permanentMunicipality" value="<?php echo $data['applicantUpdate']->permanentMunicipality;?>" placeholder="Municipality">
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
                    <input type="text" class="form__input" name="fatherFullName" value="<?php echo $data['applicantUpdate']->fatherFullName;?>" placeholder="Full Name">
                    <span class="invalidFeedback">
                            <?php echo $data['fatherFullNameError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="fatherOccupation" class="form__label">Occupation<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="fatherOccupation" value="<?php echo $data['applicantUpdate']->fatherOccupation;?>" placeholder="Occupation">
                    <span class="invalidFeedback">
                            <?php echo $data['fatherOccupationError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="fatherContact" class="form__label">Contact No.<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="fatherContact" value="<?php echo $data['applicantUpdate']->fatherContact;?>" placeholder="Contact No.">
                    <span class="invalidFeedback">
                            <?php echo $data['fatherContactError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="motherFullName" class="form__label">Mother's Full Name <span class="red">*</span></label>
                    <input type="text" class="form__input" name="motherFullName" value="<?php echo $data['applicantUpdate']->motherFullName;?>" placeholder="Full Name">
                    <span class="invalidFeedback">
                            <?php echo $data['motherFullNameError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="motherOccupation" class="form__label">Occupation<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="motherOccupation" value="<?php echo $data['applicantUpdate']->motherOccupation;?>" placeholder="Occupation">
                    <span class="invalidFeedback">
                            <?php echo $data['motherOccupationError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="motherContact" class="form__label">Contact No.<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="motherContact" value="<?php echo $data['applicantUpdate']->motherContact;?>" placeholder="Contact No.">
                    <span class="invalidFeedback">
                            <?php echo $data['motherContactError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="guardianFullName" class="form__label">Guardian's Full Name <span class="red">*</span></label>
                    <input type="text" class="form__input" name="guardianFullName" value="<?php echo $data['applicantUpdate']->guardianFullName;?>" placeholder="Full Name">
                    <span class="invalidFeedback">
                            <?php echo $data['guardianFullNameError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="guardianOccupation" class="form__label">Occupation<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="guardianOccupation" value="<?php echo $data['applicantUpdate']->guardianOccupation;?>" placeholder="Occupation">
                    <span class="invalidFeedback">
                            <?php echo $data['guardianOccupationError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="guardianContact" class="form__label">Contact No.<small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="guardianContact" value="<?php echo $data['applicantUpdate']->guardianContact;?>" placeholder="Contact No.">
                    <span class="invalidFeedback">
                            <?php echo $data['guardianContactError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="noSibling" class="form__label">Number of Sibling/s <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="noSibling" value="<?php echo $data['applicantUpdate']->noSibling;?>" placeholder="Number of Sibling/s">
                    <span class="invalidFeedback">
                            <?php echo $data['noSiblingError']; ?>
                        </span>
                </div>

                <div class="form__item">
                        <label class="form__label">Birth Order <span class="red">*</span></label>
                        <input type="text" class="form__input" value="<?php echo $data['applicantUpdate']->birthOrder;?>" name="birthOrder" placeholder="Birth Order">
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
                        <input type="text" class="form__input" value="<?php echo $data['applicantUpdate']->Income;?>" name="Income" placeholder="Income">
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
                    <input type="text" class="form__input" name="elemSchool" value="<?php echo $data['applicantUpdate']->elemSchool;?>"  placeholder="Name of School">
                    <span class="invalidFeedback">
                            <?php echo $data['elemSchoolError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="elemAddress" class="form__label">Address <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="elemAddress" value="<?php echo $data['applicantUpdate']->elemAddress;?>" placeholder="Address">
                    <span class="invalidFeedback">
                            <?php echo $data['elemAddressError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="elemGraduate" class="form__label">Year Graduated <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="elemGraduate" value="<?php echo $data['applicantUpdate']->elemGraduate;?>" placeholder="Year">
                    <span class="invalidFeedback">
                            <?php echo $data['elemGraduateError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="secondarySchool" class="form__label">Secondary <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="secondarySchool" value="<?php echo $data['applicantUpdate']->secondarySchool;?>" placeholder="Name of School">
                    <span class="invalidFeedback">
                            <?php echo $data['secondarySchoolError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="secondaryAddress" class="form__label">Address <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="secondaryAddress" value="<?php echo $data['applicantUpdate']->secondaryAddress;?>" placeholder="Address">
                    <span class="invalidFeedback">
                            <?php echo $data['secondaryAddressError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="secondaryGraduate" class="form__label">Year Graduated <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="secondaryGraduate" value="<?php echo $data['applicantUpdate']->secondaryGraduate;?>" placeholder="Year">
                    <span class="invalidFeedback">
                            <?php echo $data['secondaryGraduateError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="seniorHsSchool" class="form__label">Senior HS <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="seniorHsSchool" value="<?php echo $data['applicantUpdate']->seniorHsSchool;?>" placeholder="Name of School">
                    <span class="invalidFeedback">
                            <?php echo $data['seniorHsSchoolError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="seniorHsAddress" class="form__label">Address <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="seniorHsAddress" value="<?php echo $data['applicantUpdate']->seniorHsAddress;?>" placeholder="Address">
                    <span class="invalidFeedback">
                            <?php echo $data['seniorHsAddressError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="seniorHsGraduate" class="form__label">Year Graduated <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="seniorHsGraduate" value="<?php echo $data['applicantUpdate']->seniorHsGraduate;?>" placeholder="Year">
                    <span class="invalidFeedback">
                            <?php echo $data['seniorHsGraduateError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="alsSchool" class="form__label">ALS <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="alsSchool" value="<?php echo $data['applicantUpdate']->alsSchool;?>" placeholder="Name of School">
                    <span class="invalidFeedback">
                            <?php echo $data['alsSchoolError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="alsAddress" class="form__label">Address <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="alsAddress" value="<?php echo $data['applicantUpdate']->alsAddress;?>" placeholder="Address">
                    <span class="invalidFeedback">
                            <?php echo $data['alsAddressError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="alsGraduate" class="form__label">Year Graduated <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="alsGraduate" value="<?php echo $data['applicantUpdate']->alsGraduate;?>" placeholder="Year">
                    <span class="invalidFeedback">
                            <?php echo $data['alsGraduateError']; ?>
                    </span>
                </div>
                <div class="form__item">
                    <label for="collegeSchool" class="form__label">College <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="collegeSchool" value="<?php echo $data['applicantUpdate']->collegeSchool;?>" placeholder="Name of School">
                    <span class="invalidFeedback">
                            <?php echo $data['collegeSchoolError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="collegeAddress" class="form__label">Address <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="collegeAddress" value="<?php echo $data['applicantUpdate']->collegeAddress;?>" placeholder="Address">
                    <span class="invalidFeedback">
                            <?php echo $data['collegeAddressError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="collegeGraduate" class="form__label">Year Graduated <small>(if none, put N/A)</small> <span class="red">*</span></label>
                    <input type="text" class="form__input" name="collegeGraduate" value="<?php echo $data['applicantUpdate']->collegeGraduate;?>" placeholder="Year">
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
                        <input type="text" class="form__input" name="medication" value="<?php echo $data['applicantUpdate']->medication;?>" placeholder="Medication">
                        <span class="invalidFeedback">
                            <?php echo $data['medicationError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="allergicTo" class="form__label">Specifically, allergic to <small>(if none, put N/A)</small></label>
                        <input type="text" class="form__input" name="allergicTo" value="<?php echo $data['applicantUpdate']->allergicTo;?>" placeholder="Allergy">
                        <span class="invalidFeedback">
                            <?php echo $data['allergicToError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="specifyOther" class="form__label">if Other, Please specify <small>(if none, put N/A)</small></label>
                        <input type="text" class="form__input" name="specifyOther" value="<?php echo $data['applicantUpdate']->specifyOther;?>" placeholder="Other">
                        <span class="invalidFeedback">
                            <?php echo $data['specifyOtherError']; ?>
                        </span>
                    </div>
                   
            </div>
                    <div class="form__item">
                        <label class="form__label">have: <span class="red">*</span></label>
                        <input type="text" class="form__input" value="<?php echo $data['applicantUpdate']->medicalHistory;?>" name="medicalHistory" placeholder="Medical History">
                        <span class="invalidFeedback">
                            <?php echo $data['medicalHistoryError']; ?>
                        </span>
                    </div>
                        
            <!-- ========STEP-9========= -->
            <div class="register__title">
                     Contact No. and Requirements
            </div>

            <div class="step step-9">
                    <div class="form__item">
                        <label for="applicantContact" class="form__label">Contact No. <span class="red">*</span></label>
                        <input type="text" class="form__input" name="applicantContact" value="<?php echo $data['applicantUpdate']->applicantContact;?>" placeholder="Contact No.">
                        <span class="invalidFeedback">
                            <?php echo $data['applicantContactError']; ?>
                        </span>
                    </div>
                    <div class="form__item">
                        <label for="applicantEmail" class="form__label">Email-Address <span class="red">*</span></label>
                        <input type="text" class="form__input" name="applicantEmail" value="<?php echo $data['applicantUpdate']->applicantEmail;?>" placeholder="Email-Address">
                        <span class="invalidFeedback">
                            <?php echo $data['applicantEmailError']; ?>
                        </span>
                    </div>
            </div>
            <div class="step step-10">
                <div class="form__item">
                    <label for="reportCard" class="form__label">Report Card/Certificate <span class="red">*</span></label>
                    <input type="file" class="form__input" name="reportCard" value="<?php echo URLROOT.'/public/applicantimage/'.$data['applicantUpdate']->reportCard;?>">
                    <span class="invalidFeedback">
                            <?php echo $data['reportCardError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="goodMoral" class="form__label">Certificate of Good Moral <span class="red">*</span></label>
                    <input type="file" class="form__input" name="goodMoral" value="<?php echo URLROOT.'/public/applicantimage/'.$data['applicantUpdate']->goodMoral;?>">
                    <span class="invalidFeedback">
                            <?php echo $data['goodMoralError']; ?>
                        </span>
                </div>
                <div class="form__item">
                    <label for="oneByOne" class="form__label">1 x 1 picture <span class="red">*</span></label>
                    <input type="file" class="form__input" name="oneByOne" value="<?php echo URLROOT.'/public/applicantimage/'.$data['applicantUpdate']->oneByOne;?>">
                    <span class="invalidFeedback">
                            <?php echo $data['oneByOneError']; ?>
                        </span>
                </div>
               
                <div class="form__item">
                        <label class="form__label">Application Type <span class="red">*</span></label>
                        <input type="text" class="form__input" value="<?php echo $data['applicantUpdate']->applicationType;?>" name="applicationType" placeholder="Application Type">
                        <span class="invalidFeedback">
                            <?php echo $data['applicationTypeError']; ?>
                        </span>
                    </div>
            </div>
            <div class="form__item note">
                    <label class="form__label">Please double check your input filled before submitting the form.</label>
                    
                </div>
            
                <div class="form__item">
                    <div class="checkbox">
                        <input type="checkbox" id="check" value="check" name="condition">
                        <label for="condition" class="form__label form__condition"> I hereby that all information stated above is true and correct.</label>
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