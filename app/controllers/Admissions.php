<?php 

    class Admissions extends Controller {
        public function __construct(){
            $this->userModel = $this->model('Admission');
        }


        public function form(){
            $allgender = $this->userModel->getGender();
            $courses = $this->userModel->getAllCourses();
            $civil_statuses = $this->userModel->getCivilStatus();
            $birthorders = $this->userModel->getBirthOrder();
            $incomes = $this->userModel->getAllincome();
            $medHistorys = $this->userModel->getAllmedHistory();
            $control_no = $this->userModel->getMaxControlNo();
            $applicationtype = $this->userModel->getApplicationType();
            $active = "Active";
            $semester = $this->userModel->getSemesterActive($active);
            
            $data = [
                'semester' => $semester,
                'control_no' => $control_no,
                'applicationtype' => $applicationtype,
                'courses' => $courses,
                'allgender' => $allgender,
                'civilStatuses' => $civil_statuses,
                'birthOrders' => $birthorders,
                'Incomes' => $incomes,
                'medHistorys' => $medHistorys,
                'applicationType' => '',
                'firstCourse' => '',
                'secondCourse' => '',
                'thirdCourse' => '',
                'firstName' => '',
                'MiddleName' => '',
                'LastName' => '',
                'suffix' => '',
                'gender' => '',
                'civilStatus' => '',
                'Age' => '',
                'dateOfBirth' => '',
                'Religion' => '',
                'Nationality' => '',
                'Married' => '',
                'currentStreetNo' => '',
                'currentBarangay' => '',
                'currentMunicipality' => '',
                'permanentStreetNo' => '',
                'permanentBarangay' => '',
                'permanentMunicipality' => '',
                'fatherFullName' => '',
                'fatherOccupation' => '',
                'fatherContact' => '',
                'motherFullName' => '',
                'motherOccupation' => '',
                'motherContact' => '',
                'guardianFullName' => '',
                'guardianOccupation' => '',
                'guardianContactNo' => '',
                'noSibling' => '',
                'birthOrder' => '',
                'Income' => '',
                'elemSchool' => '',
                'elemAddress' => '',
                'elemGraduate' => '',
                'secondarySchool' => '',
                'secondaryAddress' => '',
                'secondaryGraduate' => '',
                'seniorHsSchool' => '',
                'seniorHsAaddress' => '',
                'seniorHsGraduate' => '',
                'alsSchool' => '',
                'alsAddress' => '',
                'alsGraduate' => '',
                'collegeSchool' => '',
                'collegeAddress' => '',
                'collegeGraduate' => '',
                'medication' => '',
                'allergicTo' => '',
                'specifyOther' => '',
                'medicalHistory' => '',
                'applicantContact' => '',
                'applicantEmail' => '',
                'reportCard' => '',
                'goodMoral' => '',
                'oneByOne' => '',
                // 'honorDismissal' =>'',
                'condition' => '',
                'applicationTypeError' => '',
                'firstCourseError' => '',
                'secondCourseError' => '',
                'thirdCourseError' => '',
                'firstNameError' => '',
                'MiddleNameError' => '',
                'LastNameError' => '',
                'suffixError' => '',
                'genderError' => '',
                'civilStatusError' => '',
                'AgeError' => '',
                'dateOfBirthError' => '',
                'ReligionError' => '',
                'NationalityError' => '',
                'MarriedError' => '',
                'currentStreetNoError' => '',
                'currentBarangayError' => '',
                'currentMunicipalityError' => '',
                'permanentStreetNoError' => '',
                'permanentBarangayError' => '',
                'permanentMunicipalityError' => '',
                'fatherFullNameError' => '',
                'fatherOccupationError' => '',
                'fatherContactError' => '',
                'motherFullNameError' => '',
                'motherOccupationError' => '',
                'motherContactError' => '',
                'guardianFullNameError' => '',
                'guardianOccupationError' => '',
                'guardianContactError' => '',
                'noSiblingError' => '',
                'birthOrderError' => '',
                'IncomeError' => '',
                'elemSchoolError' => '',
                'elemAddressError' => '',
                'elemGraduateError' => '',
                'secondarySchoolError' => '',
                'secondaryAddressError' => '',
                'secondaryGraduateError' => '',
                'seniorHsSchoolError' => '',
                'seniorHsAddressError' => '',
                'seniorHsGraduateError' => '',
                'alsSchoolError' => '',
                'alsAddressError' => '',
                'alsGraduateError' => '',
                'collegeSchoolError' => '',
                'collegeAddressError' => '',
                'collegeGraduateError' => '',
                'medicationError' => '',
                'allergicToError' => '',
                'specifyOtherError' => '',
                'medicalHistoryError' => '',
                'applicantContactError' => '',
                'applicantEmailError' => '',
                'reportCardError' => '',
                'goodMoralError' => '',
                'oneByOneError' => '',
                // 'honorDismissalError' => '',
                'conditionError' => ''
            ];
    
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //santize post data
            $allapplicationtype = filter_input(INPUT_POST, 'applicationType', FILTER_SANITIZE_STRING);
            $firstCourse = filter_input(INPUT_POST, 'firstCourse', FILTER_SANITIZE_STRING);
            $secondCourse = filter_input(INPUT_POST, 'secondCourse', FILTER_SANITIZE_STRING);
            $thirdCourse = filter_input(INPUT_POST, 'thirdCourse', FILTER_SANITIZE_STRING);
            $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
            $civilStatus = filter_input(INPUT_POST, 'civilStatus', FILTER_SANITIZE_STRING);
            $birthOrder = filter_input(INPUT_POST, 'birthOrder', FILTER_SANITIZE_STRING);
            $income = filter_input(INPUT_POST, 'Income', FILTER_SANITIZE_STRING);
            $medicalHistory = filter_input(INPUT_POST, 'medicalHistory', FILTER_SANITIZE_STRING);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $fileOne = $_FILES['reportCard'];
            $report_card_image = $_FILES['reportCard']['name'];
            
            $fileTwo = $_FILES['goodMoral'];
            $good_moral_image = $_FILES['goodMoral']['name'];
    
            $fileThree = $_FILES['oneByOne'];
            $onebyone_image = $_FILES['oneByOne']['name'];
    
            // $fileFour = $_FILES['honorDismissal'];
            // $honor_dismissal_image = $_FILES['honorDismissal']['name'];
            
            $checked = filter_input(INPUT_POST, 'condition', FILTER_SANITIZE_STRING);
            
            $data = [
                'control_no' => $data['control_no'],
                'semester' => $semester,
                'applicationtype' => $applicationtype,
                'courses' => $courses,
                'allgender' => $allgender,
                'civilStatuses' => $civil_statuses,
                'birthOrders' => $birthorders,
                'Incomes' => $incomes,
                'medHistorys' => $medHistorys,
                'applicationType' => $allapplicationtype,
                'firstCourse' => $firstCourse,
                'secondCourse' => $secondCourse,
                'thirdCourse' => $thirdCourse,
                'firstName' => trim($_POST['firstName']),
                'MiddleName' => trim($_POST['MiddleName']),
                'LastName' => trim($_POST['LastName']),
                'suffix' => trim($_POST['suffix']),
                'gender' => $gender,
                'civilStatus' => $civilStatus,
                'Age' => trim($_POST['Age']),
                'dateOfBirth' => trim($_POST['dateOfBirth']),
                'Religion' => trim($_POST['Religion']),
                'Nationality' => trim($_POST['Nationality']),
                'Married' => trim($_POST['Married']),
                'currentStreetNo' => trim($_POST['currentStreetNo']),
                'currentBarangay' => trim($_POST['currentBarangay']),
                'currentMunicipality' => trim($_POST['currentMunicipality']),
                'permanentStreetNo' => trim($_POST['permanentStreetNo']),
                'permanentBarangay' => trim($_POST['permanentBarangay']),
                'permanentMunicipality' => trim($_POST['permanentMunicipality']),
                'fatherFullName' => trim($_POST['fatherFullName']),
                'fatherOccupation' => trim($_POST['fatherOccupation']),
                'fatherContact' => trim($_POST['fatherContact']),
                'motherFullName' => trim($_POST['motherFullName']),
                'motherOccupation' => trim($_POST['motherOccupation']),
                'motherContact' => trim($_POST['motherContact']),
                'guardianFullName' => trim($_POST['guardianFullName']),
                'guardianOccupation' => trim($_POST['guardianOccupation']),
                'guardianContact' => trim($_POST['guardianContact']),
                'noSibling' => trim($_POST['noSibling']),
                'birthOrder' => $birthOrder,
                'Income' => $income,
                'elemSchool' => trim($_POST['elemSchool']),
                'elemAddress' => trim($_POST['elemAddress']),
                'elemGraduate' => trim($_POST['elemGraduate']),
                'secondarySchool' => trim($_POST['secondarySchool']),
                'secondaryAddress' => trim($_POST['secondaryAddress']),
                'secondaryGraduate' => trim($_POST['secondaryGraduate']),
                'seniorHsSchool' => trim($_POST['seniorHsSchool']),
                'seniorHsAddress' => trim($_POST['seniorHsAddress']),
                'seniorHsGraduate' => trim($_POST['seniorHsGraduate']),
                'alsSchool' => trim($_POST['alsSchool']),
                'alsAddress' => trim($_POST['alsAddress']),
                'alsGraduate' => trim($_POST['alsGraduate']),
                'collegeSchool' => trim($_POST['collegeSchool']),
                'collegeAddress' => trim($_POST['collegeAddress']),
                'collegeGraduate' => trim($_POST['collegeGraduate']),
                'medication' => trim($_POST['medication']),
                'allergicTo' => trim($_POST['allergicTo']),
                'specifyOther' => trim($_POST['specifyOther']),
                'medicalHistory' => $medicalHistory,
                'applicantContact' => trim($_POST['applicantContact']),
                'applicantEmail' => trim($_POST['applicantEmail']),
                'reportCard' => $report_card_image,
                'goodMoral' => $good_moral_image,
                'oneByOne' => $onebyone_image,
                // 'honorDismissal' => $honor_dismissal_image,
                'condition' => $checked,
                'status' => 'Evaluation',
                'applicationTypeError' => '',
                'firstCourseError' => '',
                'secondCourseError' => '',
                'thirdCourseError' => '',
                'firstNameError' => '',
                'MiddleNameError' => '',
                'LastNameError' => '',
                'suffixError' => '',
                'genderError' => '',
                'civilStatusError' => '',
                'AgeError' => '',
                'dateOfBirthError' => '',
                'ReligionError' => '',
                'NationalityError' => '',
                'MarriedError' => '',
                'currentStreetNoError' => '',
                'currentBarangayError' => '',
                'currentMunicipalityError' => '',
                'permanentStreetNoError' => '',
                'permanentBarangayError' => '',
                'permanentMunicipalityError' => '',
                'fatherFullNameError' => '',
                'fatherOccupationError' => '',
                'fatherContactError' => '',
                'motherFullNameError' => '',
                'motherOccupationError' => '',
                'motherContactError' => '',
                'guardianFullNameError' => '',
                'guardianOccupationError' => '',
                'guardianContactError' => '',
                'noSiblingError' => '',
                'birthOrderError' => '',
                'IncomeError' => '',
                'elemSchoolError' => '',
                'elemAddressError' => '',
                'elemGraduateError' => '',
                'secondarySchoolError' => '',
                'secondaryAddressError' => '',
                'secondaryGraduateError' => '',
                'seniorHsSchoolError' => '',
                'seniorHsAddressError' => '',
                'seniorHsGraduateError' => '',
                'alsSchoolError' => '',
                'alsAddressError' => '',
                'alsGraduateError' => '',
                'collegeSchoolError' => '',
                'collegeAddressError' => '',
                'collegeGraduateError' => '',
                'medicationError' => '',
                'allergicToError' => '',
                'specifyOtherError' => '',
                'medicalHistoryError' => '',
                'applicantContactError' => '',
                'applicantEmailError' => '',
                'reportCardError' => '',
                'goodMoralError' => '',
                'oneByOneError' => '',
                // 'honorDismissalError' => '',
                'conditionError' => ''
             
            ];
            $numberValidation = "/^[0-9]*$/";
            // this is for reportCard..............
            $upload_dir = "../public/applicantimage/";
            $tmp_nameOne = $_FILES['reportCard']['tmp_name'];
            $sizeOne = $_FILES['reportCard']['size'];
            $errorOne = $_FILES['reportCard']['error'];
            $typeOne = $_FILES['reportCard']['type'];
            $fileExtOne = explode('.',$data['reportCard']);
            $fileActualExtOne = strtolower(end($fileExtOne));
            $maxSizeOne = 2000000;
            $n1 = rand(1,10); 
            $n2 = date("ymd"); 
            $n3 = time(); 
            @$newNameOne = $n1 . $n2 . $n3 . "." . $fileActualExtOne;
            $allowedOne = array('image/jpg','image/jpeg','image/png');
            $reportCard = $upload_dir.$newNameOne;
            // this is for goodmoral
            $upload_dir = "../public/applicantimage/";
            $tmp_nameTwo = $_FILES['goodMoral']['tmp_name'];
            $sizeTwo = $_FILES['goodMoral']['size'];
            $errorTwo = $_FILES['goodMoral']['error'];
            $typeTwo = $_FILES['goodMoral']['type'];
            $fileExtTwo = explode('.',$data['goodMoral']);
            $fileActualExtTwo = strtolower(end($fileExtTwo));
            $maxSizeTwo = 2000000;
            $n1 = rand(1,10); 
            $n2 = date("ymd"); 
            $n3 = time(); 
            @$newNameTwo = $n1 . $n2 . $n3 . "." . $fileActualExtTwo;
            $allowedTwo = array('image/jpg','image/jpeg','image/png');
            $goodMoral = $upload_dir.$newNameTwo;
             // this is for oneByOne
             $upload_dir = "../public/applicantimage/";
             $tmp_nameThree = $_FILES['oneByOne']['tmp_name'];
             $sizeThree = $_FILES['oneByOne']['size'];
             $errorThree = $_FILES['oneByOne']['error'];
             $typeThree = $_FILES['oneByOne']['type'];
             $fileExtThree = explode('.',$data['oneByOne']);
             $fileActualExtThree = strtolower(end($fileExtThree));
             $maxSizeThree = 2000000;
             $n1 = rand(1,10); 
             $n2 = date("ymd"); 
             $n3 = time(); 
             @$newNameThree = $n1 . $n2 . $n3 . "." . $fileActualExtThree;
             $allowedThree = array('image/jpg','image/jpeg','image/png');
             $oneByOne = $upload_dir.$newNameThree;
             
            // this is for honorDismissal
            // $upload_dir = "../public/applicantimage/";
            // $tmp_nameFour = $_FILES['honorDismissal']['tmp_name'];
            // $sizeFour = $_FILES['honorDismissal']['size'];
            // $errorFour = $_FILES['honorDismissal']['error'];
            // $typeFour = $_FILES['honorDismissal']['type'];
            // $fileExtFour = explode('.',$data['honorDismissal']);
            // $fileActualExtFour = strtolower(end($fileExtFour));
            // $maxSizeFour = 2000000;
            // $n1 = rand(1,10); 
            // $n2 = date("ymd"); 
            // $n3 = time(); 
            // @$newNameFour = $n1 . $n2 . $n3 . "." . $fileActualExtFour;
            // $allowedFour = array('image/jpg','image/jpeg','image/png');
            // $honorDismissal = $upload_dir.$newNameFour;
            
            if(empty($data['applicationType'])){
                $data['applicationTypeError'] = 'Please choose type of enrollee.';
            }
            if(empty($data['firstCourse'])){
                $data['firstCourseError'] = 'Please choose course.';
                
            }
            if(empty($data['secondCourse'])){
                $data['secondCourseError'] = 'Please choose course.';
                
            }
            if(empty($data['thirdCourse'])){
                $data['thirdCourseError'] = 'Please choose course.';
                
            }
            // validation for the same first course
            if($data['firstCourse'] == $data['secondCourse']){
                $data['secondCourseError'] = 'Please choose other courses.';
            }
            if($data['firstCourse'] == $data['thirdCourse']){
                $data['thirdCourseError'] = 'Please choose other courses';
            }
            // validation for second same course
            if($data['secondCourse'] == $data['firstCourse']){
                $data['secondCourseError'] = 'Please choose other courses';
            }
            if($data['secondCourse'] == $data['thirdCourse']){
                $data['thirdCourseError'] = 'Please choose other courses';
            }
            // validation for third Course is the same
            if($data['thirdCourse'] == $data['firstCourse']){
                $data['thirdCourseError'] = 'Please choose other courses.';
            }
            if($data['thirdCourse'] == $data['secondCourse']){
                $data['thirdCourse'] = 'Please choose other courses.';
            }
            
            if(empty($data['firstName'])){
                $data['firstNameError'] = 'Please enter your first name.';
            }
            if(empty($data['MiddleName'])){
                $data['MiddleNameError'] = 'Please enter your middle name or N/A';
            }
            if(empty($data['LastName'])){
                $data['LastNameError'] = 'Please enter your last name.';
            }
            if(empty($data['suffix'])){
                $data['suffixError'] = 'Please enter your suffix or N/A';
            }
            if(empty($data['gender'])){
                $data['genderError'] = 'Please pick a gender.';
                
            }
            if(empty($data['civilStatus'])){
                $data['civilStatusError'] = 'Please pick a your civil status.';
                
            }
            if(empty($data['Age'])){
                $data['AgeError'] = 'Please enter your Age.';
            }elseif(!preg_match($numberValidation, $data['Age'])){
                $data['AgeError'] = 'Age must be numbers only.';
                
            }
            if(empty($data['dateOfBirth'])){
                $data['dateOfBirthError'] = 'Please select your date of birth.';
            }
            if(empty($data['Religion'])){
                $data['ReligionError'] = 'Please enter your religion.';
            }
            if(empty($data['Nationality'])){
                $data['NationalityError'] = 'Please enter your nationality.';
            }
            if(empty($data['Married'])){
                $data['MarriedError'] = 'Please enter your spouse name or N/A.';
            }
            if(empty($data['currentStreetNo'])){
                $data['currentStreetNoError'] = 'Please enter your street no. or house no.';
            }
            if(empty($data['currentBarangay'])){
                $data['currentBarangayError'] = 'Please enter your barangay.';
            }
            if(empty($data['currentMunicipality'])){
                $data['currentMunicipalityError'] = 'Please enter your Municipality.';
            }
            if(empty($data['permanentStreetNo'])){
                $data['permanentStreetNoError'] = 'Please enter your street no. or house no.';
            }
            if(empty($data['permanentBarangay'])){
                $data['permanentBarangayError'] = 'Please enter your barangay.';
            }
            if(empty($data['permanentMunicipality'])){
                $data['permanentMunicipalityError'] = 'Please enter your Municipality.';
            }
            if(empty($data['fatherFullName'])){
                $data['fatherFullNameError'] = 'Please enter your father full name.';
            }
            if(empty($data['fatherOccupation'])){
                $data['fatherOccupationError'] = 'Please enter your father occupation.';
            }
            if(empty($data['fatherContact'])){
                $data['fatherContactError'] = 'Please enter your father contact no.';
            }
            if(empty($data['motherFullName'])){
                $data['motherFullNameError'] = 'Please enter your mother full name.';
            }
            if(empty($data['motherOccupation'])){
                $data['motherOccupationError'] = 'Please enter your mother occupation.';
            }
            if(empty($data['motherContact'])){
                $data['motherContactError'] = 'Please enter your mother contact no.';
            }
            if(empty($data['guardianFullName'])){
                $data['guardianFullNameError'] = 'Please enter your guardian full name.';
            }
            if(empty($data['guardianOccupation'])){
                $data['guardianOccupationError'] = 'Please enter your guardian occupation.';
            }
            if(empty($data['guardianContact'])){
                $data['guardianContactError'] = 'Please enter your guardian contact no.';
            }
            if(empty($data['noSibling'])){
                $data['noSiblingError'] = 'Please enter no of sibling/s.';
            }elseif(!preg_match($numberValidation, $data['noSibling'])){
                $data['noSiblingError'] = 'No. of sibling/s must be numbers only.';
            }
            if(empty($data['birthOrder'])){
                $data['birthOrderError'] = 'Please select birth order.';
            }
            if(empty($data['Income'])){
                $data['IncomeError'] = 'Please select family Income.';
            }
            if(empty($data['elemSchool'])){
                $data['elemSchoolError'] = 'Please enter your school name.';
            }
            if(empty($data['elemAddress'])){
                $data['elemAddressError'] = 'Please enter your school address.';
            }
            if(empty($data['elemGraduate'])){
                $data['elemGraduateError'] = 'Please enter the year you graduated.';
            }
            if(empty($data['secondarySchool'])){
                $data['secondarySchoolError'] = 'Please enter your school name.';
            }
            if(empty($data['secondaryAddress'])){
                $data['secondaryAddressError'] = 'Please enter your school address.';
            }
            if(empty($data['secondaryGraduate'])){
                $data['secondaryGraduateError'] = 'Please enter the year you graduated.';
            }
            if(empty($data['seniorHsSchool'])){
                $data['seniorHsSchoolError'] = 'Please enter your school name.';
            }
            if(empty($data['seniorHsAddress'])){
                $data['seniorHsAddressError'] = 'Please enter your school address.';
            }
            if(empty($data['seniorHsGraduate'])){
                $data['seniorHsGraduateError'] = 'Please enter the year you graduated.';
            }
            if(empty($data['alsSchool'])){
                $data['alsSchoolError'] = 'Please enter your school name.';
            }
            if(empty($data['alsAddress'])){
                $data['alsAddressError'] = 'Please enter your school address.';
            }
            if(empty($data['alsGraduate'])){
                $data['alsGraduateError'] = 'Please enter the year you graduateals.';
            }
            if(empty($data['collegeSchool'])){
                $data['collegeSchoolError'] = 'Please enter your school name.';
            }
            if(empty($data['collegeAddress'])){
                $data['collegeAddressError'] = 'Please enter your school address.';
            }
            if(empty($data['collegeGraduate'])){
                $data['collegeGraduateError'] = 'Please enter the year you graduateals.';
            }
            if(empty($data['medication'])){
                $data['medicationError'] = 'Please enter medication you are taking.';
            }
            if(empty($data['allergicTo'])){
                $data['allergicToError'] = "Please specify where you allergic to.";
            }
            if(empty($data['specifyOther'])){
                $data['specifyOtherError'] = 'Please put N/A if no other.';
            }
            if(empty($data['medicalHistory'])){
                $data['medicalHistoryError'] = 'Please choose in options.';
            }elseif($data['medicalHistory'] == 'Other' && $data['specifyOther'] == 'N/A'){
                $data['specifyOtherError'] = 'Please specify other.';
            }elseif($data['medicalHistory'] == 'Allergy' && $data['allergicTo'] == 'N/A'){
                $data['allergicToError'] = 'Please specify where you allergic to.';
    
            }
            if(empty($data['applicantContact'])){
                $data['applicantContactError'] = 'Please enter your contact no.';
            }elseif(!preg_match($numberValidation, $data['applicantContact'])){
                $data['applicantContactError'] = 'Contact no. must only have numbers.';
            }
            if(empty($data['applicantEmail'])){
                $data['applicantEmailError'] = 'Please enter your Email.';
            }elseif(!filter_var($data['applicantEmail'], FILTER_VALIDATE_EMAIL)){
                $data['applicantEmailError'] = 'Please enter correct email address.';
            }
            if(empty($data['reportCard'])){
                $data['reportCardError'] = 'Please upload image.';
            }
            if(empty($data['goodMoral'])){
                $data['goodMoralError'] = 'Please upload image.';
    
            }
            if(empty($data['oneByOne'])){
                $data['oneByOneError'] = 'Please upload image.';
    
            }
            // if(empty($data['honorDismissal'])){
            //     $data['honorDismissalError'] = 'Please upload image.';
    
            // }
            if(!in_array($typeOne, $allowedOne)){
                $data['reportCardError'] = 'Please upload/select image only.';
            }
            elseif($sizeOne > $maxSizeOne){
                $data['reportCardError'] = 'The size file must be less than 2MB.';
            
            }
            if(!in_array($typeTwo, $allowedTwo)){
                $data['goodMoralError'] = 'Please upload/select image only.';
            }
            elseif($sizeTwo > $maxSizeTwo){
                $data['goodMoralError'] = 'The size file must be less than 2MB.';
            
            }
            if(!in_array($typeThree, $allowedThree)){
                $data['oneByOneError'] = 'Please upload/select image only.';
            }
            elseif($sizeThree > $maxSizeThree){
                $data['oneByOneError'] = 'The size file must be less than 2MB.';
            
            } 
            // if(!in_array($typeFour, $allowedFour)){
            //     $data['honorDismissalError'] = 'Please upload/select image only.';
            // }
            // <!-- elseif($sizeFour > $maxSizeFour){
            //     $data['honorDismissalError'] = 'The size file must be less than 2MB.';
            
            // } -->
            if(empty($data['condition'])){
                $data['conditionError'] = 'Please click the terms and condition before submitting.';
    
            }
            if(empty($data['control_no'])){
                $number = "GT-0000001";
            }else{
                $idd = str_replace("GT-","",$data['control_no']);
                $id = str_pad($idd + 1,7,0, STR_PAD_LEFT);
                $number = 'GT-' . $id;
            }
            $control_no = $number;
            $semester = $data['semester']->semester;
            $academic_year = $data['semester']->year;
    
            //get all error..............
            if(empty($data['applicationTypeError']) && empty($data['firstCourseError']) && empty($data['secondCourseError']) && empty($data['thirdCourseError']) && empty($data['firstNameError']) && empty($data['MiddleNameError']) && empty($data['LastNameError']) && empty($data['suffixError']) && empty($data['genderError']) && empty($data['civilStatusError']) && empty($data['AgeError']) && empty($data['dateOfBirthError']) && empty($data['ReligionError']) && empty($data['NationalityError']) && empty($data['MarriedError']) && empty($data['currentStreetNoError']) && empty($data['currentBarangayError']) && empty($data['currentMunicipalityError']) && empty($data['permanentStreetNoError']) && empty($data['permanentBarangayError']) && empty($data['permanentMunicipalityError']) && empty($data['fatherFullNameError']) && empty($data['fatherOccupationError']) && empty($data['fatherContactError']) && empty($data['motherFullNameError']) && empty($data['motherOccupationError']) && empty($data['motherContactError']) && empty($data['guardianFullNameError']) && empty($data['guardianOccupationError']) && empty($data['guardianContactError']) && empty($data['noSiblingError']) && empty($data['birthOrderError']) && empty($data['IncomeError']) && empty($data['elemSchoolError']) && empty($data['elemAddressError']) && empty($data['elemGraduateError']) && empty($data['secondarySchoolError']) && empty($data['secondaryAddressError']) && empty($data['secondaryGraduateError']) && empty($data['seniorHsSchoolError']) && empty($data['seniorHsAddressError']) && empty($data['seniorHsGraduateError']) && empty($data['alsSchoolError']) && empty($data['alsAddressError']) && empty($data['alsGraduateError']) && empty($data['collegeSchoolError']) && empty($data['collegeAddressError']) && empty($data['collegeGraduateError']) && empty($data['medicationError']) && empty($data['allergicToError']) && empty($data['specifyOtherError']) && empty($data['medicalHistoryError']) && empty($data['applicantContactError']) && empty($data['applicantEmailError']) && empty($data['reportCardError']) && empty($data['goodMoralError']) && empty($data['oneByOneError']) &&  empty($data['conditionError'])){
                // empty($data['honorDismisalError']) &&
                    $users_id = $_SESSION['id'];
                    // $newNameFour
                    if( $this->userModel->addApplicationRecord($users_id, $data, $newNameOne, $newNameTwo, $newNameThree,$control_no,$semester,$academic_year)){
                            $this->userModel->addControlNo($users_id,$control_no);
                            header('location:' . URLROOT . '/students/profile');
                            move_uploaded_file($tmp_nameOne,$reportCard);
                            move_uploaded_file($tmp_nameTwo,$goodMoral);
                            move_uploaded_file($tmp_nameThree,$oneByOne);
                            // move_uploaded_file($tmp_nameFour,$honorDismissal);
                        
                       

                    }
                    else{
                        die('Something went wrong');
                    }
    
            }
            
            
        }
        
            
            $this->view('admissions/form', $data);
    }




}