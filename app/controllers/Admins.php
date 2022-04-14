<?php 

    class Admins extends Controller {
        public function __construct(){
            $this->adminModel = $this->model('Admin');
        }
        
        public function admin(){
            prevention();
            guard();
           
           $totalUsers = $this->adminModel->getTotalUsers();
           $totalSemester = $this->adminModel->getTotalSemester();
           $totalProgram = $this->adminModel->getTotalProgram();
           $totalEnrolled = $this->adminModel->getTotalEnrolled();
           $totalCourse = $this->adminModel->getTotalCourse();
           $totalApproval = $this->adminModel->getTotalApproval();

            $data = [   
                
                'total_users' => $totalUsers,
                'total_semester' => $totalSemester,
                'totalProgram' => $totalProgram,
                'totalEnrolled' => $totalEnrolled,
                'totalCourse' => $totalCourse,
                'totalApproval' => $totalApproval,   
            ];
            
            $this->view('admins/admin',$data);
        }

        
        public function addProgram(){
            prevention();
            guard();
           
            $data = [
                'name' => '',
                'image' => '',
                'description' => '',
                'nameError' => '',
                'imageError' => '',
                'descriptionError' => ''

            ];

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $file = $_FILES['image'];
                $image = $_FILES['image']['name'];
                $data = [
                    'name' => trim($_POST['name']),
                    'image' => $image,
                    'description' => trim($_POST['description']),
                    'nameError' => '',
                    'imageError' => '',
                    'descriptionError' => ''
    
                ];

                $upload_dir = "../public/applicantimage/";
                $tmp_name = $_FILES['image']['tmp_name'];
                $size = $_FILES['image']['size'];
                $error = $_FILES['image']['error'];
                $type = $_FILES['image']['type'];
                $fileExt = explode('.',$data['image']);
                $fileActualExt = strtolower(end($fileExt));
                $maxSize = 2000000;
                $n1 = rand(1,10); 
                $n2 = date("ymd"); 
                $n3 = time(); 
                @$newName = $n1 . $n2 . $n3 . "." . $fileActualExt;
                $allowed = array('image/jpg','image/jpeg','image/png');
                $image = $upload_dir.$newName;

                if(empty($data['image'])){
                    $data['imageError'] = 'Please select image';
                }
                if(!in_array($type, $allowed)){
                    $data['imageError'] = 'Please select image only.';
                }
                elseif($size > $maxSize){
                    $data['imageError'] = 'The size file must be less than 2MB';
                }
                
                if(empty($data['name'])){
                    $data['nameError'] = 'Please enter a course title';
                }
                if(empty($data['description'])){
                    $data['descriptionError'] = 'Please enter a description.';
                }
                if(empty($data['nameError']) && empty($data['imageError']) && empty($data['descriptionError'])){
                    if($this->adminModel->addPrograms($data,$newName)){
                        header('location:' . URLROOT . '/admins/program');
                        move_uploaded_file($tmp_name,$image);
                    }else{
                        die('Something went wrong');
                    }
                }

            }
            $this->view('admins/addProgram',$data);
        }

        public function program(){
            prevention();
            guard();
            $programs = $this->adminModel->getAllPrograms();

            $data = [
                'search' => '',
                'searchError' => '',
                'programs' => $programs,
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $programs = $this->adminModel->getAllPrograms();
                
                $data =[
                    'programs' => $programs,
                    'search' => trim($_POST['search']),
                    'searchError' => '',
                    'searchItem' => ''
                ];
                
                if(empty($data['search'])){
                    $data['searchError'] = 'Search by Title.';
                }
                if(empty($data['searchError'])){
                    $lookfor = $this->adminModel->searchProgramByInput($data);
                    
                    if($lookfor){
                        $data['searchItem'] = $lookfor;
                        
                    }
                    else{
                        if($lookfor != $data['search']){
                            $data['searchError'] = 'No data found, please search by title.';
                        }
                        else {
                            die('something went wrong');
                        }
                    }
                }
    
            }
            $this->view('admins/program',$data);
        }

        public function editProgram($id){
            prevention();
            guard();
            $programs = $this->adminModel->getProgramById($id);
            
            $data = [
                'id' => $id,
                'programs' => $programs,
                'name' => '',
                'image' => '',
                'description' => '',
                'nameError' => '',
                'imageError' => '',
                'descriptionError' => ''

            ];

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $file = $_FILES['image'];
                $image = $_FILES['image']['name'];
                $data = [
                    'id' => $id,
                    'programs' => $programs,
                    'name' => trim($_POST['name']),
                    'image' => $image,
                    'description' => trim($_POST['description']),
                    'nameError' => '',
                    'imageError' => '',
                    'descriptionError' => ''
                ];

                $upload_dir = "../public/applicantimage/";
                $tmp_name = $_FILES['image']['tmp_name'];
                $size = $_FILES['image']['size'];
                $error = $_FILES['image']['error'];
                $type = $_FILES['image']['type'];
                $fileExt = explode('.',$data['image']);
                $fileActualExt = strtolower(end($fileExt));
                $maxSize = 2000000;
                $n1 = rand(1,10); 
                $n2 = date("ymd"); 
                $n3 = time(); 
                @$newName = $n1 . $n2 . $n3 . "." . $fileActualExt;
                $allowed = array('image/jpg','image/jpeg','image/png');
                $image = $upload_dir.$newName;

                if(empty($data['image'])){
                    $data['imageError'] = 'Please select image';
                }
                if(!in_array($type, $allowed)){
                    $data['imageError'] = 'Please select image only.';
                }
                elseif($size > $maxSize){
                    $data['imageError'] = 'The size file must be less than 2MB';
                }
                
                if(empty($data['name'])){
                    $data['nameError'] = 'Please enter a course title';
                }
                if(empty($data['description'])){
                    $data['descriptionError'] = 'Please enter a description';
                }
                
                if(empty($data['imageError']) && empty($data['nameError']) && empty($data['descriptionError'])){
                    
                    if($this->adminModel->updateProgramById($data, $newName)){
                        header('location:' . URLROOT . '/admins/program');
                        @unlink('../public/applicantimage/' . $programs->image);
                        move_uploaded_file($tmp_name,$image);
                    }
                    else{
                        die('Something went wrong');
                    }

                }
            }

            $this->view('admins/editProgram',$data);
        }

        public function deleteProgram($id){
            prevention();
            guard();
            
            $programs = $this->adminModel->getProgramById($id);
            $data=[
                'delete' => $programs,
                'id' => $id

            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if($this->adminModel->deleteProgramById($id)){
                    header('location:' . URLROOT . '/admins/program');
                    @unlink('../public/applicantimage/' . $programs->image);
                }else{
                    die('Something went wrong');
                }
            }

            $this->view('admins/deleteProgram',$data);
        }

        // course section
        public function course(){
            prevention();
            guard();
            
            $subjects = $this->adminModel->getAllSubjects();
            $sched_code = $this->adminModel->getMaxSchedCode();
            $programs = $this->adminModel->selectAllprogram();
            $yearLevels = $this->adminModel->getAllyearLevel();
           
            $data = [
                'sched_code' => $sched_code,
                'subjects' => $subjects,
                'programs' => $programs,
                'yearLevels' => $yearLevels,
                'program' => '',
                'yearLevel' => '',
                'programsError' => '',
                'yearLevelError' => '',
         
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING);
                $program = filter_input(INPUT_POST, 'program', FILTER_SANITIZE_STRING);
                $yearLevel = filter_input(INPUT_POST, 'yearLevel', FILTER_SANITIZE_STRING);
                $data = [
                    'sched_code' => $sched_code,
                    'subjects' => $subjects,
                    'programs' => $programs,
                    'yearLevels' => $yearLevels,
                    'program' => $program,
                    'yearLevel' => $yearLevel,
                    'programsError' => '',
                    'yearLevelError' => '',
                  
                ];

                if(empty($data['program'])){
                    $data['programsError'] = 'Please select Program';
                }
                if(empty($data['yearLevel'])){
                    $data['yearLevelError'] = 'Please select year';
                }
                if(empty($data['programsError']) && empty($data['yearLevelError'])){
                    // this is program 
                    $programSearch = $this->adminModel->searchSubjects($data);
                    if($programSearch){
                        // this is yearlevel
                        $data['searchItem'] = $programSearch;
                      
                    }else{
                        if($programSearch == ""){
                            $data['programsError'] = 'No data found.';
                        }
                        else {
                            die('something went wrong');
                        }
                    }
                  
                }
            }

            $this->view('admins/course',$data);
        }

        // subject offering
        public function subjectOffering($id){
            prevention();
            guard();

            $yearFromSubject = $this->adminModel->getYearFromSubject();
            $yearFroms = $this->adminModel->getYearFrom($id);
            $yearFrom = $yearFroms->yearFrom;
            $sched_code = $this->adminModel->getSchedCode();
            // display on front
            $programs = $this->adminModel->selectAllprogram();
            $yearLevels = $this->adminModel->getAllyearLevel();
           
            $data=[
                
                'id' => $id,
                'yearFroms' => $yearFrom,
                'newSched' => $yearFrom . "10001",
                'sched_code' => $sched_code,
                'yearFromSubject' => $yearFromSubject,
                'course_code' => '',
                'title' => '',
                'lec_units' => '',
                'lab_units' => '',
                'lec_hours' => '',
                'lab_hours' => '',
                'pre-req' => '',
                'program' => '',
                'yearLevel' => '',
                'programs' => $programs,
                'yearLevels'=> $yearLevels, 
                'course_codeError' => '',
                'titleError' => '',
                'lec_unitsError' => '',
                'lab_unitsError' => '',
                'lec_hoursError' => '',
                'lab_hoursError' => '',
                'pre-reqError' => '', 
                'yearLevelError' => '',
                'programsError' => '',
            ];

           if($_SERVER['REQUEST_METHOD']== "POST"){
               $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
               $program = filter_input(INPUT_POST, 'program', FILTER_SANITIZE_STRING);
               $yearLevel = filter_input(INPUT_POST, 'yearLevel', FILTER_SANITIZE_STRING);
               
                $data=[
                    'id' => $id,
                    'yearFroms' => $yearFrom,
                    'newSched' => $yearFrom . "10001",
                    'yearFromSubject' => $yearFromSubject,
                    'sched_code' => $sched_code,
                    'programs' => $programs,
                    'yearLevels'=> $yearLevels, 
                   
                    'course_code' => trim($_POST['course_code']),
                    'title' => trim($_POST['title']),
                    'lec_units' => trim($_POST['lec_units']),
                    'lab_units' => $_POST['lab_units'],
                    'lec_hours' => trim($_POST['lec_hours']),
                    'lab_hours' => $_POST['lab_hours'],
                    'pre-req' => trim($_POST['pre-req']),
                    'sectionError' => '',
                    'course_codeError' => '',
                    'titleError' => '',
                    'lec_unitsError' => '',
                    'lab_unitsError' => '',
                    'lec_hoursError' => '',
                    'lab_hoursError' => '',
                    'pre-reqError' => '',
                    'program' => $program,
                    'yearLevel' => $yearLevel,
                    'yearLevelError' => '',
                    'programsError' => '',

                ];
                    $sched_code = "";
                    if(empty($data['sched_code'])){
                        $sched_code = $data['newSched'];
                    }else{
                        if($data['yearFroms'] != $data['yearFromSubject']){
                            $sched_code = $data['newSched'];
                        }elseif(!empty($data['sched_code'])){
                            $sched_code = $data['sched_code'] + 1;
                        }
                    }
                
                 
                if(empty($data['program'])){
                        $data['programsError'] = 'Please select Program';
                }
                if(empty($data['yearLevel'])){
                        $data['yearLevelError'] = 'Please select year';
                }   
                    
                if(empty($data['course_code'])){
                    $data['course_codeError'] = 'Please enter a course code.'; 
                }
                elseif(strlen($data['course_code']) < 5 ){
                $data['course_codeError'] = 'Please enter course-code that at least 5 char.';
                }
                if(empty($data['title'])){
                    $data['titleError'] = 'Please enter a title.';
                }
                if($data['lec_units'] == ""){
                    $data['lec_unitsError'] = 'Please enter a Lec Units.';
                }
                if($data['lab_units'] == ""){
                    $data['lab_unitsError'] = 'Please enter a Lab Units.';
                }
                if($data['lec_hours'] == ""){
                    $data['lec_hoursError'] = 'Please enter a Lec hours.';
                }
                if($data['lab_hours'] == ""){
                    $data['lab_hoursError'] = 'Please enter a Lab hours.';
                }
                if(empty($data['pre-req'])){
                    $data['pre-reqError'] = 'Please enter a PRE.REQ.';
                }
              
                
                if(empty($data['course_codeError']) && empty($data['titleError']) && empty($data['lec_unitsError']) && empty($data['lab_unitsError']) && empty($data['lec_hoursError']) && empty($data['lab_hoursError']) && empty($data['pre-reqError']) && empty($data['programsError']) && empty($data['yearLevelError'])  ){

                    if($this->adminModel->addSubject($data,$sched_code)){

                         header('location:' . URLROOT . '/admins/subjectOffering/' . $data['id']);

                    }else{
                        die('Something went Wrong');
                    }
                }
           }

            $this->view('admins/subjectOffering',$data);

        }


        public function deleteSubject($id){
            prevention();
            guard();
            $subject = $this->adminModel->findSubjectById($id);
            
            $data=[
                'subject' => $subject,
                'id' => $id,
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if($this->adminModel->deleteSubjectById($id)){
                    header('location:' . URLROOT . '/admins/course');
                    
                }else{
                    die('Something went wrong');
                }
            }
            $this->view('admins/deleteSubject',$data);

        }

        public function updateSubject($id){
            prevention();
            Guard();
            $subjects = $this->adminModel->getSubjectById($id);
            $programs = $this->adminModel->selectAllprogram();
            $yearLevels = $this->adminModel->getAllyearLevel();
            
            $data = [
                
                'id' => $id,
                'subjects' => $subjects,
                'course_code' => '',
                'title' => '',
                'lec_units' => '',
                'lab_units' => '',
                'lec_hours' => '',
                'lab_hours' => '',
                'pre-req' => '',
                'program' => '',
                'yearLevel' => '',
                'programs' => $programs,
                'yearLevels'=> $yearLevels, 
                'course_codeError' => '',
                'titleError' => '',
                'lec_unitsError' => '',
                'lab_unitsError' => '',
                'lec_hoursError' => '',
                'lab_hoursError' => '',
                'pre-reqError' => '', 
                'yearLevelError' => '',
                'programsError' => '',

            ];

           if($_SERVER['REQUEST_METHOD']== "POST"){
               $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
               $program = filter_input(INPUT_POST, 'program', FILTER_SANITIZE_STRING);
               $yearLevel = filter_input(INPUT_POST, 'yearLevel', FILTER_SANITIZE_STRING);
               
               $data=[
                'id' => $id,
                'subjects' => $subjects,
                'programs' => $programs,
                'yearLevels'=> $yearLevels, 
                'course_code' => trim($_POST['course_code']),
                'title' => trim($_POST['title']),
                'lec_units' => trim($_POST['lec_units']),
                'lab_units' => $_POST['lab_units'],
                'lec_hours' => trim($_POST['lec_hours']),
                'lab_hours' => $_POST['lab_hours'],
                'pre-req' => trim($_POST['pre-req']),
                'course_codeError' => '',
                'titleError' => '',
                'lec_unitsError' => '',
                'lab_unitsError' => '',
                'lec_hoursError' => '',
                'lab_hoursError' => '',
                'pre-reqError' => '',
                'program' => $program,
                'yearLevel' => $yearLevel,
                'yearLevelError' => '',
                'programsError' => '',

            ];
                  
                    
                if(empty($data['program'])){
                    $data['programsError'] = 'Please select new Program or Re-select';
                }
                if(empty($data['yearLevel'])){
                    $data['yearLevelError'] = 'Please select new Year Level or Re-select';
                } 
                
                if(empty($data['course_code'])){
                    $data['course_codeError'] = 'Please enter course code.';
                }
                if(empty($data['title'])){
                    $data['titleError'] = 'Please enter a title.';
                }
                if($data['lec_units'] == ""){
                    $data['lec_unitsError'] = 'Please enter a Lec Units.';
                }
                if($data['lab_units'] == ""){
                    $data['lab_unitsError'] = 'Please enter a Lab Units.';
                }
                if($data['lec_hours'] == ""){
                    $data['lec_hoursError'] = 'Please enter a Lec hours.';
                }
                if($data['lab_hours'] == ""){
                    $data['lab_hoursError'] = 'Please enter a Lab hours.';
                }
                if(empty($data['pre-req'])){
                    $data['pre-reqError'] = 'Please enter a PRE.REQ.';
                }
              
                
                if( empty($data['yearLevelError']) && empty($data['programsError']) && empty($data['course_codeError']) && empty($data['titleError']) && empty($data['lec_unitsError']) && empty($data['lab_unitsError']) && empty($data['lec_hoursError']) && empty($data['lab_hoursError']) && empty($data['pre-reqError']) ){

                    
                    if($this->adminModel->updateSubject($data)){


                         header('location:' . URLROOT . '/admins/course');

                    }else{
                        die('Something went Wrong');
                    }
                }


           } 

            $this->view('admins/updateSubject',$data);

        }




        




        public function setSubject(){
            prevention();
            guard();
            $yearLevel = $this->adminModel->getAllyearLevel();
            $subjects = $this->adminModel->getAllSubjects();
           
            $data = [

                'section' => '',
                'course_code' => '',
                'title' => '',
                'Lec_units'=> '',
                'Lab_units'=> '',
                'Lec_hours'=> '',
                'Lab_hours'=> '',
                'subjects' => $subjects,
                'programs' => $programs,
                'yearLevel'=> $yearLevel,
                'sectionError' => '',
                'course_codeError' => '',
                'titleError' => '',
                'Lec_unitsError'=> '',
                'Lab_unitsError'=> '',
                'Lec_hoursError'=> '',
                'Lab_hoursError'=> '',
                'yearLevelError'=> '',
                'programsError' => '',

            ];
           
            $this->view('admins/setSubject',$data);
        }



        public function setSchedCode(){
           
            $semesters = $this->adminModel->getAllSemester();
            
            $data=[
                'selectSem' => $semesters,
                'semester'=> '',
                'semesterError' => '',
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $semester = filter_input(INPUT_POST, 'semester', FILTER_SANITIZE_STRING);
                $data=[
                    'selectSem' => $semesters,
                    'semester'=> $semester,
                    'semesterError' => '',

                ];

                if(empty($data['semester'])){
                    $data['semesterError'] = 'Please select sem to generate.';
                }
                if(empty($data['semesterError'])){
                    $sched = $this->adminModel->semesterId($data);
                    if($sched){
                       
                        header('location:' . URLROOT . '/admins/subjectOffering/' . $sched->id);

                        
                    }else{
                        die('something went wrong');
                    }
                    
                }
                
            }

            $this->view('admins/setSchedCode',$data);
        }
        
       





        // create semester
        public function semester(){
            prevention();
            guard();
            $semesters = $this->adminModel->getAllSemester();
            $semesterPicker = $this->adminModel->getAllSelectionSemester();
            
            $data=[
                'semesters' => $semesters,
                'select_sem' => $semesterPicker,
                'semester' => '',
                'year' => '',
                'yearFrom' => '',
                'yearTo' => '',
                'yearFromError' => '',
                'yearToError' => '',
                'semesterError' => '',
                
            ];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $semester = filter_input(INPUT_POST, 'semester', FILTER_SANITIZE_STRING);
                $data = [
                    'semesters' => $semesters,
                    'select_sem' => $semesterPicker,
                    'semester' => $semester,
                    'year'=> '',
                    'yearFrom' => trim($_POST['yearFrom']),
                    'yearTo' => trim($_POST['yearTo']),
                    'yearFromError' => '',
                    'yearToError' => '',
                    'semesterError' => '',
                    
                ];
                if(empty($data['semester'])){
                    $data['semesterError'] = 'Please pick a Semester.';
                }
                if(empty($data['yearFrom'])){
                    $data['yearFromError'] = 'Please enter a year.';
                }
                if(empty($data['yearTo'])){
                    $data['yearToError'] = 'Please enter a year.';
                }
                if(empty($data['semesterError']) && empty($data['yearFromError']) && empty($data['yearToError'])){
                    $data['year'] = $data['yearFrom'] ."-". $data['yearTo'];
                    if($this->adminModel->addSemester($data)){
                        
                        header('location:' . URLROOT . '/admins/semester');
                    } else{
                        die('Something went wrong');
                    }
                }

            }
            

            $this->view('admins/semester',$data);
        }

        public function message(){
            prevention();
            guard();
            $data = [
                'message'=> '',
                'messageError' =>'',
                
            ];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data =[
                    'message'=> trim($_POST['message']),
                    'messageError' =>'',
                ];
                if(empty($data['message'])){
                    $data['messageError'] = 'Please enter a message.';
                }

            }
        }


        // update semester
        public function updateSemester($id){
            
            $semesterPicker = $this->adminModel->getAllSelectionSemester();
            $sem = $this->adminModel->findSemesterById($id);
            $data = [
                'id' => $id,
                'sem' => $sem,
                'select_sem' => $semesterPicker,
                'semester' => '',
                'year' => '',
                'yearError' => '',
                'semesterError' => '',
            ];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $semester = filter_input(INPUT_POST, 'semester', FILTER_SANITIZE_STRING);
                
                $data = [
                    'id' => $id,
                    'sem' => $sem,
                    'select_sem' => $semesterPicker,
                    'semester' => $semester,
                    'year' => trim($_POST['year']),
                    'yearError' => '',
                    'semesterError' => '',
                ];
                if(empty($data['semester'])){
                    $data['semesterError'] = 'Please pick a Semester.';
                }
                if(empty($data['year'])){
                    $data['yearError'] = 'Please enter a year.';
                }
                if(empty($data['semesterError']) && empty($data['yearError']) ){
                    if($this->adminModel->updateSemesterById($data)){
                        header('location:' . URLROOT . '/admins/semester');
                        
                    } else{
                        die('Something went wrong');
                    }
                }

            }


            $this->view('admins/updateSemester',$data);
        }

        // delete Semester by Id
        public function deleteSemester($id) {
            prevention();
            guard();
            $sem = $this->adminModel->findSemesterById($id);
            $data=[
                'sem' => $sem,
                'id' => $id,
              ];

              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if($this->adminModel->deleteSemesterById($id)){
                    header('location:' . URLROOT . '/admins/semester');
                }else{
                    die('Something went wrong');
                }


                }



            $this->view('admins/deleteSemester',$data);
        }


        // create session sem 
        public function createSessionSem($id){
            prevention();
            guard();
            $semester = $this->adminModel->getSemesterById($id);
            
            $semesterId = $semester->id;
            if($semester){
                $newStatus = "Active";
                $setSemester = $this->adminModel->setSemesterById($semesterId,$newStatus);
                
                if($setSemester){
                    $semester = $this->adminModel->getTheUpdatedSemester($semesterId);
                    $this->isSetSemester($semester);
                }else{
                    die('Something went wrong');
                }
            }
                
        }
       
        // set Semester
        public function isSetSemester($semester){
            prevention();
            guard();
            $_SESSION['semester_id'] = $semester->id;
            $_SESSION['status'] = $semester->status;
            $_SESSION['semester'] = $semester->semester;
            $_SESSION['year'] = $semester->year;
            
            header('location:' . URLROOT . '/admins/semester');

            
        }
        // log out session Sem
        public function unSetSem(){
            prevention();
            guard();
            if(semStart()){
                $id = $_SESSION['semester_id'];
                $status = "Closed";
                if($this->adminModel->unSetActiveSemById($id,$status)){
                    unset($_SESSION['semester_id']);
                    unset($_SESSION['status']);
                    unset($_SESSION['semester']);
                    unset($_SESSION['year']);
                    
                    
                header('location:' . URLROOT . '/admins/semester');
                }

            }
            
        }





        public function onlineapproval(){
            prevention();
            guard();
            $status = "Enrolled";
            $applicantform = $this->adminModel->findAllApplicant($status);
            $data = [
                'applicant' => $applicantform,
                'search' => '',
                'searchError' => ''
            ];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'applicant' => $applicantform,
                    'search' => trim($_POST['search']),
                    'searchError' => ''
                ];

                if(empty($data['search'])){
                    $data['searchError'] = 'Search by First name, Last name email, Status.';
                }
                if(empty($data['searchError'])){
                    $search = $this->adminModel->searchByInputInApproval($data);
                    
                    if($search){
                        $data['searchItem'] = $search;
                        
                    }
                    else{
                        if($search != $data['search']){
                            $data['searchError'] = 'No data found.';
                        }
                        else {
                            die('something went wrong');
                        }
                    }
                }


            }
   
            $this->view('admins/onlineapproval', $data);
        }

        public function users(){
            prevention();
            guard();
            
            $users = $this->adminModel->findAllUsers();
            
            
            $data = [
                'users' => $users,
                'search' => '',
                'searchError' => '',
                
                
            ];
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'users' => $users,
                    'search' => trim($_POST['search']),
                    'searchError' => '',
                    

                ];
                
                if(empty($data['search'])){
                    $data['searchError'] = 'Please search by name and email.';
                }
                if(empty($data['searchError'])){
                    $search = $this->adminModel->searchByInput($data);
                    
                    if($search){
                        $data['searchItem'] = $search;
                        
                    }
                    else{
                        if($search != $data['search']){
                            $data['searchError'] = 'No data found.';
                        }
                        else {
                            die('something went wrong');
                        }
                    }
                }


            }



            $this->view('admins/users',$data);
        }



        public function deleteUser($id) {
            prevention();
            guard();
            $useralreadyhaverecord = $this->adminModel->findUserInAppli($id);
            
            $user = $this->adminModel->findUserById($id);
            $data=[
                'user' => $user,
                'id' => $id,
                'status' => $useralreadyhaverecord,
              ];

              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                
                
                if($this->adminModel->deleteUser($id)){
                    header('location:' . URLROOT . '/admins/users');
                    
                    
                }else{
                    
                    die('Something went wrong');
                }


                }



            $this->view('admins/deleteUser',$data);
        }

        public function updateUser($id) {
            prevention();
            guard();
            $user = $this->adminModel->findUserById($id);
            $data=[
                'user' => $user,
                'id' => $id,
                'firstname' => '',
                'lastname' => '',
                'email' => '',
                'password' => '',
                'confirmpassword' => '',
                'firstnameError' => '',
                'lastnameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmpasswordError' => ''
              ];

              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data=[
                    'user' => $user,
                    'id' => $id,
                    'firstname' => trim($_POST['firstname']),
                    'lastname' => trim($_POST['lastname']),
                    'email' => trim($_POST['email']),
                    'password' => '',
                    'confirmpassword' => '',
                    'firstnameError' => '',
                    'lastnameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmpasswordError' => ''
                  ];
                  
                  $nameValidation = "/^[a-zA-Z\s]+$/";
            
                  $numberValidation = "/^[0-9]*$/";
              
                  $passwordValidation = "/^(.{0,7}|[a-z]*|[^\d]*)$/i";
  
                  if(empty($data['firstname'])) {
                      $data['firstnameError'] = 'Please enter a name.';
                      
                  }elseif(!preg_match($nameValidation, $data['firstname'])){
                      $data['firstnameError'] = 'Please input letters only.';
                      
                  }
                  if(empty($data['lastname'])) {
                      $data['lastnameError'] = 'Please enter last name.';
                  }elseif(!preg_match($nameValidation, $data['lastname'])){
                      $data['lastnameError'] = 'Please input letters only.';
            
                  }
                  if(empty($data['email'])) {
                      $data['emailError'] = 'Please enter email address.';
                  }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                      $data['emailError'] = 'Please enter correct email address.';
          
                  }else{

                      if($data['email'] != $data['user']->email){

                        if($this->adminModel->findUserByEmail($data['email'])) {
                            $data['emailError'] = 'Email address is already exist';
                        }
                      }
                     
                  }
                  if(empty($data['firstnameError']) && empty($data['lastnameError']) && empty($data['emailError'])) {

                        if($this->adminModel->updateUserById($data)){

                            header('location:' . URLROOT . '/admins/users');
                        }
                  }

                


            }

            $this->view('admins/updateUser',$data);
        }

        //for Evaluation

        public function viewUser($id){
            prevention();
            guard();
            $applicantform = $this->adminModel->findApplicantById($id);
            $status = 'Exam/Interview';
            $id = $applicantform->id;
            $users_id = $applicantform->users_id;
            
            $data = [
                'status' => $status,
                'applicant' => $applicantform,
                'search' => '',
                'searchError' => '',
                'id' => $id,
                'email' => $applicantform->applicantEmail
                
            ];
           
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $email = $applicantform->applicantEmail;
                
                $data = [
                    'status' => $data['status'],
                    'applicant' => $applicantform,
                    'search' => '',
                    'searchError' => '',
                    'email' => $data['email'],
                    'id' => $data['id'],
                ];
                
                if($data['status']){
                    
                    if($this->adminModel->UpdateApplicantStatus($data)){
                        
                        header('location:' . URLROOT . '/admins/onlineapproval');
                    } else{
                        die('Something went wrong');
                    }
                    
                }
            }

            $this->view('admins/viewUser', $data);
        }


        public function updatePassword($id){
            prevention();
            guard();
            $user = $this->adminModel->findUserById($id);
            $data =[
                'user' => $user,
                'id' => $id,
                
                'newPassword' => '',
                'confirmpassword' => '',
                'passwordError' => '',
                'newPasswordError' => '',
                'confirmpasswordError' => '',
                'passwordMatch' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                'user' => $user,
                'email' =>$data['user']->email,
                'id' => $id,
                
                'newPassword' => trim($_POST['newPassword']),
                'confirmpassword' => trim($_POST['confirmpassword']),
                'passwordError' => '',
                'newPasswordError' => '',
                'confirmpasswordError' => '',
                'passwordMatch' => ''
            ];

            if(empty($data['newPassword'])) {
                $data['newPasswordError'] = 'Please enter new password.';
            }
            if(empty($data['confirmpassword'])) {
                $data['confirmpasswordError'] = 'Please enter confirm password.';
            }else{
                if($data['confirmpassword'] != $data['newPassword']){
                    $data['confirmpasswordError'] = 'New Password do not Match.';
                }
            }
            if(empty($data['newPasswordError']) && empty($data['confirmpasswordError'])) {
                    $newpass = $data['newPassword'];
                    $hashedpass = password_hash($newpass, PASSWORD_DEFAULT);
                    
                    if($this->adminModel->updatePassword($data, $hashedpass)) {
                        header('location:' . URLROOT . '/admins/users');
                    } else {
                        die('Something went wrong');
                    }
            }
               
            




             }


            $this->view('admins/updatePassword', $data);
        }

        public function enrolled(){
            prevention();
            guard();
            $status ="Enrolled";
            $applicantform = $this->adminModel->findAllApplicantEnrolled($status);

            $data = [
                'applicant' => $applicantform,
                'search' => '',
                'searchError' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'applicant' => $applicantform,
                    'search' => trim($_POST['search']),
                    'searchError' => ''
                ];

                if(empty($data['search'])){
                    $data['searchError'] = 'Search by First name, Last name email, Status.';
                }
                if(empty($data['searchError'])){
                    $search = $this->adminModel->searchByInputInApproval($data);
                    
                    if($search){
                        $data['searchItem'] = $search;
                        
                    }
                    else{
                        if($search != $data['search']){
                            $data['searchError'] = 'No data found.';
                        }
                        else {
                            die('something went wrong');
                        }
                    }
                }


            }
   
            $this->view('admins/enrolled', $data);
        }

        public function enroll($id){
            prevention();
            guard();
            $applicantform = $this->adminModel->findApplicantById($id);
           
            $users_id = $applicantform->users_id;
            $data= [
                'id' => $id,
                'users_id' => $users_id,
                
                'email' => $applicantform->applicantEmail,
                'status' => $applicantform->status,
            ];
            
            if($data['status'] == "For Submission"){
                $data['status'] = 'Pre-Enrolled';
                
            }

            if($data['status']){
                $this->adminModel->updateApplicantStat($data,$users_id);
                header('location:' . URLROOT . '/admins/enrolled');
                
            }
            $this->view('admins/enroll',$data);
        }

        // send a message to the applicant
        public function reject($id){
            $applicant = $this->adminModel->findAppliUsercantById($id);
            $users_id = $applicant->users_id;
            $email = $applicant->applicantEmail;
            $formId = $applicant->id;
            
            $data = [
                'formId' => $formId,
                'email' => $email,
                'subject' => '',
                'message' => '',
                'subjectError' => '',
                'messageError' => '',
                'status' => '',
                'statusError' => '',

            ];

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'formId' => $formId,
                    'users_id' => $users_id,
                    'email' => $email,
                    'subject' => trim($_POST['subject']),
                    'message' =>  trim($_POST['message']),
                    'subjectError' => '',
                    'messageError' => '',
    
                ];
                
                if(empty($data['subject'])){
                    $data['subjectError'] = 'Please enter a Subject';
                }
                if(empty($data['message'])){
                    $data['messageError'] = 'Please enter a Message';
                }
                if(empty($data['messageError']) && empty($data['subjectError']) ){
                   
                    $updateStatusApplicant = $this->adminModel->updateStatusApp($data);
                        if($updateStatusApplicant){
                            
                            $this->adminModel->deleteForm($data);
                            header('location:' . URLROOT . '/admins/onlineapproval');
                        }else{
                            die('Something Went Wrong');
                        }
                }

            }
            
            $this->view('admins/reject',$data);
        }
         
        
        public function officialEnrolled($id){
            prevention();
            guard();
            $subjects = $this->adminModel->getSubjectofStudent($id);
            $getInfoStudent = $this->adminModel->studentInfo($id);
            $validated = $getInfoStudent->validated;
            $users_id = $getInfoStudent->users_id;
            $total = 0;
            $data = [
                'total' => $total,
                'users_id' => $users_id,
                'validated' => $validated,
                'studentInfo' => $getInfoStudent,
                'subjects' => $subjects,
                'section' => '',
                'studentNo' => '',
                'sectionError' => '',
                'studentNoError' => '', 

 
            ];
            if($data['validated'] == 0){
                $data['validated'] = 'Student is picking...';
            }elseif($data['validated'] == 1){
                $data['validated'] = 'Request for checking';
            }elseif($data['validated'] == 2){
                $data['validated'] = 'Officially Enrolled';
            }
        
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'total' => $total,
                    'users_id' => $users_id,
                    'validated' => $validated,
                    'studentInfo' => $getInfoStudent,
                    'subjects' => $subjects,
                    'section' => trim($_POST['section']),
                    'studentNo' => trim($_POST['studentNo']),
                    'sectionError' => '',
                    'studentNoError' => '',
    
    
                ];
                if($data['validated'] == 0){
                    $data['validated'] = 'Student is picking...';
                }elseif($data['validated'] == 1){
                    $data['validated'] = 'Request for checking';
                }elseif($data['validated'] == 2){
                    $data['validated'] = 'Officially Enrolled';
                }

                if(empty($data['studentNo'])){
                    $data['studentNoError'] = 'Please Enter a Student Number.';
                }
                elseif(strlen($data['studentNo']) < 8 ){
                    $data['studentNoError'] = 'Please enter student number that at least 9 char.';
                }
                
                if(empty($data['section'])){
                    $data['sectionError'] = 'Please Enter student section.';
                }
                if(empty($data['sectionError']) && empty($data['studentNoError'])){
                    $validatedSuccess = $this->adminModel->validateStudent($data);
                    header('location:' . URLROOT . '/admins/enrolled');

                }
            }

            $this->view('admins/officialEnrolled',$data);
        }

}