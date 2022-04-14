<?php 

    class Pages extends Controller {
        public function __construct(){
            $this->pageModel = $this->model('Page');
        }
        


        public function home(){
            prevention();
            $data=[ 
    
                'title' => 'this is home',
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data=[
    
                    'title' => 'this is home',
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'userLevel' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'verified' => 0,
                    
                ];

                if(empty($data['email'])) {
                    $data['emailError'] = 'Please enter email.';
                }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = 'Please enter correct email address.';
        
                }
                if(empty($data['password'])) {
                    $data['passwordError'] = 'Please enter password.';
                }

                if(empty($data['emailError']) && empty($data['passwordError']) ) {
                    $loggedInUser = $this->pageModel->login($data['email'], $data['password']);
                
                    if($loggedInUser){
                        if($data['verified'] == $loggedInUser->verified){
                        $data['passwordError'] = 'Please verify your account.';
                        }
                        if($data['verified'] != $loggedInUser->verified){
                            $this->createUserSession($loggedInUser); 
                        }        
                    }else{
                        $data['passwordError'] = 'Password or email is incorrect.';
                        $this->view('pages/home', $data);
                    }
                }
                
            }


            $this->view('pages/home',$data);
        }

        public function createUserSession($users) {
            $_SESSION['id'] = $users->id;
            $_SESSION['firstname'] = $users->firstname;
            $_SESSION['lastname'] = $users->lastname;
            $_SESSION['email'] = $users->email;
            $_SESSION['created_at'] = $users->created_at;
            $_SESSION['userLevel'] = $users->userLevel;

            if($_SESSION['userLevel'] == 1) {
            header('Location:' . URLROOT . "/students/profile");
            }
            if($_SESSION['userLevel'] == 0) {
            header('Location:' . URLROOT . "/admins/admin");
            }
        }

        public function logout() {

            if((isLoggedIn())) {
                unset($_SESSION['id']);
                unset($_SESSION['firstname']);
                unset($_SESSION['lastname']);
                unset($_SESSION['email']);
                unset($_SESSION['userLevel']);

                header('location:' . URLROOT . '/pages/home');
            }
    
        }


        public function signup(){
        
            $data=[
    
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

            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                
                $data=[
                'userLevel' => 1,
                'firstname' => trim($_POST['firstname']),
                'lastname' => trim($_POST['lastname']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmpassword' => trim($_POST['confirmpassword']),
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
                    if($this->pageModel->findUserByEmail($data['email'])) {
                            $data['emailError'] = 'Email address is already exist';
                    }
                   
                }
                
                if(empty($data['password'])) {
                    $data['passwordError'] = 'Please enter password.';
                }elseif(strlen($data['password']) < 8 ){
                    $data['passwordError'] = 'Please enter password that at least 8 char.';
                }elseif(preg_match($passwordValidation, $data['password'])){
                    $data['passwordError'] = 'Password must at least one numeric value.';
          
                }
        
                if(empty($data['confirmpassword'])) {
                    $data['confirmpasswordError'] = 'Please confirm password.';
                }else{
                    if($data['password'] != $data['confirmpassword']){
                        $data['confirmpasswordError'] = 'Password do not Match.';
                    }
                }
                if(empty($data['firstnameError']) && empty($data['lastnameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmpasswordError'])) {

                    $pass = $data['password'];
                    $hashedpass = password_hash($pass, PASSWORD_DEFAULT);
                
                    // REGISTER USER FROM MODEL FUNCTION
                    if($this->pageModel->signup($data, $hashedpass)) {
                        
                        header('location:' . URLROOT . '/pages/thankyou');
                    } else {
                        die('Something went wrong');
                    }
                }

            }

            $this->view('pages/signup',$data);
        }


        public function verification(){
            $data =[
                'message' => ''
            ];

            
            if($_SERVER['REQUEST_METHOD'] == "GET") {
                $vkey = $_GET['vkey'];
                
                $data = [
                    'message' => '',
                    'vkey' => $vkey,
                ];
                
                if($data['vkey']){
                    $verification = $this->pageModel->getvkey($data['vkey']);
                    if($verification){
                        $data['message'] = 'Your Account has been verified. you may now login';
                    }else{
                        $data['message'] = 'This Account is invalid or Already verified';
                    }
                }else{
                    die('Something went wrong');
                }
                

            }

            

            $this->view('pages/verification',$data);
        }

        public function thankyou(){

            $data=[
                
            ];





            $this->view('pages/thankyou',$data);
        }



        public function about(){


            $this->view('pages/about');
            
        }

        
        public function program(){
            $programs = $this->pageModel->selectAllProgram();
            $data= [

                'programs' => $programs,

            ]; 

            
            $this->view('pages/program',$data);
            
        }

        public function contact(){




            $this->view('pages/contact');

        }

        public function selectSubject(){

            $data = [
                'users' => '',
                
            ];

            if($_SERVER['REQUEST_METHOD'] == "GET") {

                $users_id = $_GET['users_id'];
                
                $data = [
                    'message' => '',
                    'users_id' => $users_id,
                    'users' => '',
                    
                ];
                
                if($data['users_id']){
                    $users_id = $this->pageModel->getUsers_id($data['users_id']);
                     if($users_id){
                         $data['users'] = $users_id->users_id;
                        


                        header('location:' . URLROOT . '/pages/enrollment/' . $data['users']);
                        
                       
                     }
                    
                }else{
                    die('Something went wrong');
                }
                

            }

            $this->view('pages/selectSubject',$data);
        }

       public function enrollment($users){
        //    id on applicant

        $course = $this->pageModel->findUserOnApplicant($users);
        $programs = $this->pageModel->selectAllprogram();
        $yearLevels = $this->pageModel->getAllyearLevel();
        $subjects = $this->pageModel->collectSubjects();
        $semester = $course->semester . " " . $course->academic_year;
        

        $data = [
            'semester' => $semester,
            'id' => $users,
            'subjects' => $subjects,
            'programs' => $programs,
            'yearLevels'=> $yearLevels,
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
                'id' => $users,
                'semester' => $semester,
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
                $programSearch = $this->pageModel->searchSubjects($data);
                if($programSearch){
                    // this is yearlevel
                    $data['searchItem'] = $programSearch;
                  
                }else{
                    if($programSearch == ""){
                        $data['programsError'] = 'No data found, please search Again.';
                    }
                    else {
                        die('something went wrong');
                    }
                }
              
            }


        }


        // final process


           $this->view('pages/enrollment',$data);
       }

       public function submitted($subject,$id){
            $users = $this->pageModel->getAllsubject($id);
            $users_id = $this->pageModel->getAllinfo($id);
          
            $total = 0;

           $data =[
               'total' => $total,
               'users' => $id,
               'subject' => $subject,
            
                'subjects' => $users,
                'outputsubject' => '',

           ];
          
          
           


            $this->view('pages/submitted',$data);

       }


       public function addnew($subject_id,$id){
            $subject = $this->pageModel->getSubjectFromSubject($subject_id);
            $users = $this->pageModel->getSemesterFromApplication($id);
            $semester = $users->semester . " " . $users->academic_year;
            $data = [

                'users_id' => $id,
                'semester' => $semester,
                'program' => $subject->program,
                'yearLevel' => $subject->yearLevel,
                'sched_code' => $subject->sched_code,
                'course_code' => $subject->course_code,
                'title' => $subject->title,
                'lec_units' => $subject->lec_units,
                'lab_units' => $subject->lab_units,
                'lec_hours' => $subject->lec_hours,
                'lab_hours' => $subject->lab_hours,
                'preReq' => $subject->preReq,

            ];  
                     
            
            if($this->pageModel->studentSubjects($data)){

                header('location:' . URLROOT . '/pages/submitted/' . $subject_id . "/" . $id);

            }
            $this->view('pages/addnew',$data);
       }

       public function removeSubject($subject_id,$id){
          $confirmSubject = $this->pageModel->getSubjectFromSubject($subject_id);
            $data = [
                'subject_id' => $subject_id,
                'users_id' => $id,

            ];

            if($data){
              $deleted = $this->pageModel->deleteSubjectSelected($data);
              
               if($deleted){
                    header('location:' . URLROOT . '/pages/submitted/' . $subject_id . "/" . $id);
               }else{
                   die('Something Went Wrong');
               }

                

            }


            $this->view('pages/removeSubject',$data);
       }


       public function evaluate($id){
        $users_id = $this->pageModel->checkAndUpdate($id);
        $data = [

            'id' => $id,
            'usersUpdated' => $users_id,

        ];

        



        $this->view('pages/evaluate',$data);


       }
       


    }

   