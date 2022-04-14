<?php

class Admin {
    private $db;
    

    public function __construct() {
        $this->db = new Database;
    }





    public function findAllUsers() {
        $this->db->query('SELECT * FROM users ORDER BY created_at DESC');

        $results = $this->db->resultSet();
        
        return $results;
        $this->db->query = NULL;
    }
    

    public function searchByInput($data){
        $this->db->query('SELECT * FROM users WHERE lastname LIKE :lastname OR email LIKE :email OR firstname LIKE :firstname');
        $search = '%' . $data['search'] . '%';
        $this->db->bind(':lastname', $search);
        $this->db->bind(':email', $search);
        $this->db->bind(':firstname', $search);

        if($this->db->rowCount() > 0 ) {
        $results = $this->db->resultSet();
            
        if($results){
            return $results;
        }else{
            return false;
        }
        
        }
        $this->db->query = null;
        
        

    } 

    // search by subject
   






    public function findUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');

        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
        return $row;
        
    }

    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');

        $this->db->bind(':email',$email);

        if($this->db->rowCount() > 0) {
            return true;

        } else {
            return false;
        }

    }
    public function updateUserById($data){
        $this->db->query("UPDATE users SET firstname =:firstname, lastname =:lastname, email =:email WHERE id =:id");

        // bind
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':email',  $data['email']);
        
        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = null;


    }


    public function deleteUser($id){
        $this->db->query("DELETE FROM users WHERE id = :id");

        // bind
        $this->db->bind(':id', $id);
         // execute
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        
    }
// find all applicants on onlineapproval
    public function findAllApplicant($status) {
        $this->db->query('SELECT * FROM applicant_form WHERE status NOT LIKE :status');
        $this->db->bind(':status',$status);

        $results = $this->db->resultSet();
        
        return $results;
    }

    public function findApplicantById($id) {
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :id');

        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
        return $row;
        
    }


    // search applicant in online approval
    public function searchByInputInApproval($data){
        $this->db->query('SELECT * FROM applicant_form WHERE LastName LIKE :lastname OR applicantEmail LIKE :email OR firstName LIKE :firstname OR status LIKE :status');
        $search = '%' . $data['search'] . '%';
        $this->db->bind(':lastname', $search);
        $this->db->bind(':email', $search);
        $this->db->bind(':firstname', $search);
        $this->db->bind(':status', $search);


        if($this->db->rowCount() > 0 ) {
        $results = $this->db->resultSet();
            
        if($results){
            return $results;
        }else{
            return false;
        }
        
        }
        $this->db->query = NULL;
    }

    
    


    // change applicant status
    public function UpdateApplicantStatus($data){
        $this->db->query("UPDATE applicant_form SET status =:status WHERE id =:id");

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':status', $data['status']);
        
        // execute
        // LOSenrollment.system
        if($this->db->execute()){
            $to = $data['email'];
            $subject = "Notice of Admission";
            $message = "<a href='http://localhost/CvSU-Gentri-Enrollment/pages/home'>Login</a><br><br><br>" . "\r\n";
            $message .= "Please confirm your Slot. <br><br><br>" . "\r\n";
            $message .= "Submit your complete original requirements to the Office of the Registrar within 1 week. Remember your CONTROL-NO! This will be ask upon submission of requirements.";
            $headers = "From: oracionmike@gmail.com" . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($to, $subject, $message, $headers);
            

            
            return true;
        }else{
            return false;
        }
        $this->db->query = null;
    }

    





    // admin update password
    public function updatePassword($data, $hashedpass){
        $this->db->query("UPDATE users SET password = :password WHERE id =:id");

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':password', $hashedpass);

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = null;
    }
    
    
    
    // Get all semester
    public function getAllSemester(){
        $this->db->query('SELECT * FROM semester ORDER BY created_at DESC');

        $results = $this->db->resultSet();
        
        return $results;
    }
    // get selection semester
    public function getAllSelectionSemester(){
        $this->db->query('SELECT * FROM semester_option ORDER BY created_at DESC');

        $results = $this->db->resultSet();
        
        return $results;
    }

    // add semester
    public function addSemester($data){
        $this->db->query(' INSERT INTO semester (semester, year, yearFrom) VALUES (:semester, :year, :yearFrom)');

        $this->db->bind(':semester', $data['semester']);
        $this->db->bind(':year', $data['year']);
        $this->db->bind(':yearFrom', $data['yearFrom']);


         // execute
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = NULL;

        
    }


    // find semester value to update semester
    public function findSemesterById($id){
        $this->db->query('SELECT * FROM semester WHERE id = :id');

        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
        return $row;

        $this->db->query = NULL;
    }

    // update semester
    public function updateSemesterById($data){
        $this->db->query("UPDATE semester SET semester = :semester, year = :year WHERE id =:id");

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':semester', $data['semester']);
        $this->db->bind(':year', $data['year']);
        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = null;

    }
    // delete semester by id
    public function deleteSemesterById($id){
        $this->db->query("DELETE FROM semester WHERE id = :id");

        // bind
        $this->db->bind(':id', $id);
         // execute
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = NULL;
    }

    public function getSemesterById($id){
        $this->db->query('SELECT * FROM semester WHERE id = :id');

        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
        return $row;

        $this->db->query = NULL;
    }

    public function setSemesterById($semesterId,$newStatus){
        $this->db->query('UPDATE semester SET status = :status WHERE id = :id');
        
        $this->db->bind(':id', $semesterId);
        $this->db->bind(':status', $newStatus);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = NULL;
    }

    // get the updated Status
    public function getTheUpdatedSemester($semesterId){
        $this->db->query('SELECT * FROM semester WHERE id = :id');

        $this->db->bind(':id', $semesterId);
        
        $row = $this->db->single();
        return $row;

        $this->db->query = NULL;
    }

    public function unSetActiveSemById($id,$status){
        $this->db->query('UPDATE semester SET status = :status WHERE id = :id');
        
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = NULL;

    }


    // programs


    public function getAllPrograms(){
        $this->db->query('SELECT * FROM program ORDER BY created_at DESC');

        $results = $this->db->resultSet();
        
        return $results;

    }

    public function addPrograms($data,$newName){
        $this->db->query(' INSERT INTO program (name, image,description) VALUES (:name, :image, :description)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $newName);
        $this->db->bind(':description', $data['description']);


         // execute
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = NULL;
    }

    public function getProgramById($id){
        $this->db->query('SELECT * FROM program WHERE id = :id');

        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
        return $row;

        $this->db->query = NULL;

    }

    public function updateProgramById($data,$newName){
        $this->db->query('UPDATE program SET name = :name, image = :image, description = :description WHERE id = :id');
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':image',$newName);
        $this->db->bind(':description',$data['description']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = NULL;

    }
    public function deleteProgramById($id){
        $this->db->query("DELETE FROM program WHERE id = :id");

        // bind
        $this->db->bind(':id', $id);
         // execute
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = null;
    }

    public function searchProgramByInput($data){
        $this->db->query('SELECT * FROM program WHERE name LIKE :name ');
        $search = '%' . $data['search'] . '%';
        $this->db->bind(':name', $search);
        if($this->db->rowCount() > 0 ) {
        $results = $this->db->resultSet();
            
        if($results){
            return $results;
        }else{
            return false;
        }
       
        }
        $this->db->query = null;
        
    }


    // subjects course section
    public function getAllSubjects(){
        $this->db->query('SELECT * FROM subject ORDER BY created_at ASC');
        $results = $this->db->resultSet();
        
        return $results;

    }

    // program search
    public function searchSubjects($data){
        $this->db->query('SELECT * FROM subject WHERE program = :program AND yearLevel = :yearLevel' );
    
        $this->db->bind(':program', $data['program']);
        $this->db->bind(':yearLevel', $data['yearLevel']);
        if($this->db->rowCount() > 0 ) {
            $row = $this->db->resultSet();
        
            if($row){
                return $row;
            }else{
                return false;
            }
           
        } 
       

    }
   

    public function getYearFromSubject(){
        $this->db->query('SELECT * FROM subject ORDER BY id DESC LIMIT 1');
        $results = $this->db->single();
        
        if($results){
            return $results->yearFrom;
           

        } else {
            return false;
        }
        $this->db->query = null;
    }

    public function getSchedCode(){
        $this->db->query('SELECT * FROM subject ORDER BY id DESC LIMIT 1');
        $results = $this->db->single();
        
        if($results){
            return $results->sched_code;
           

        } else {
            return false;
        }
        $this->db->query = null;
    }
    public function getMaxSchedCode(){
        $this->db->query('SELECT * FROM subject ORDER BY id DESC LIMIT 1');
        $results = $this->db->single();
        
        if($results){
            return $results->id;
           
        } else {
            return false;
        }
        $this->db->query = null;
    }
    

    
    public function semesterId($data){
        $this->db->query('SELECT * FROM semester WHERE year = :year ');
        $this->db->bind(':year', $data['semester']);
        $row = $this->db->single();
        return $row;

        $this->db->query = NULL;
    }

    

    public function getYearFrom($id){
        $this->db->query('SELECT * FROM semester WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
           
       
    }

   public function addSubject($data,$sched_code){
    $this->db->query(' INSERT INTO subject ( yearFrom, program, yearLevel, sched_code, course_code,  title, lec_units, lab_units, lec_hours, lab_hours, preReq) VALUES ( :yearFrom, :program, :yearLevel, :sched_code, :course_code,  :title, :lec_units, :lab_units, :lec_hours, :lab_hours, :preReq )');
       
    $this->db->bind(':yearFrom',$data['yearFroms']);
    $this->db->bind(':program', $data['program']);
    $this->db->bind(':sched_code',$sched_code);
    $this->db->bind(':yearLevel', $data['yearLevel']);
    $this->db->bind(':course_code',$data['course_code']);
    $this->db->bind(':title',$data['title']);
    $this->db->bind(':lec_units',$data['lec_units']);
    $this->db->bind(':lab_units',$data['lab_units']);
    $this->db->bind(':lec_hours',$data['lec_hours']);
    $this->db->bind(':lab_hours',$data['lab_hours']);
    $this->db->bind(':preReq',$data['pre-req']);

    if($this->db->execute()){ 
        return true;
    }else{
        return false;
    }
    $this->db->query = NULL;

   }
    

//    get all yearlevel
   public function getAllyearLevel(){
    $this->db->query('SELECT * FROM yearLevel ORDER BY created_at ASC ');
    $results = $this->db->resultSet();
    if($results){
        return $results;
    }else{
        return false;
    }
    
    $this->db->query = null;

   }
//    get all programs
   public function selectAllprogram(){
        $this->db->query('SELECT * FROM program ORDER BY id ASC');

        $results = $this->db->resultSet();
        
        return $results;

    }



    public function updateApplicantStat($data,$users_id){
        $this->db->query('UPDATE applicant_form SET status = :status WHERE users_id = :id');

        $status = "Pre-Enrolled";
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':status', $status);
       

        
        // execute
        // LOSenrollment.system
        if($this->db->execute()){
            $to = $data['email'];
            $subject = "Pre-Enrolled";
            $message = "<a href='http://localhost/CvSU-Gentri-Enrollment/pages/selectSubject?users_id=$users_id'>Login</a><br><br><br>" . "\r\n";
            $message .= " <br><br><br>" . "\r\n";
            $message .= "Please select your Applied Course and submit Thank you.";
            $headers = "From: oracionmike@gmail.com" . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($to, $subject, $message, $headers);
            
            return true;
        }else{
            return false; 
        }
        $this->db->query = null;
    }
    public function findAllApplicantEnrolled($status){
        $this->db->query('SELECT * FROM applicant_form WHERE status = :status');
        $this->db->bind(':status',$status);
       
        $results = $this->db->resultSet();
        
        return $results;
    }


    public function findSubjectById($id){
        $this->db->query('SELECT * FROM subject WHERE id = :id');
        $this->db->bind(':id',$id);
       
        $results = $this->db->single();
        
        return $results;
    }





    public function deleteSubjectById($id){
        $this->db->query("DELETE FROM subject WHERE id = :id");

        // bind
        $this->db->bind(':id', $id);
         // execute
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = null;




    }

    public function getSubjectById($id){
        $this->db->query('SELECT * FROM subject WHERE id = :id');
        $this->db->bind(':id',$id);
       
        $results = $this->db->single();
        
        return $results;

    }

    public function updateSubject($data){
        $this->db->query('UPDATE subject SET yearLevel = :yearLevel, program = :program, course_code = :course_code, title = :title, lec_units = :lec_units, lab_units = :lab_units, lec_hours = :lec_hours, lab_hours = :lab_hours, preReq = :preReq WHERE id = :id');
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':program', $data['program']);
        $this->db->bind(':yearLevel', $data['yearLevel']);
       
        $this->db->bind(':course_code', $data['course_code']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':lec_units', $data['lec_units']);
        $this->db->bind(':lab_units', $data['lab_units']);
        $this->db->bind(':lec_hours', $data['lec_hours']);
        $this->db->bind(':lab_hours', $data['lab_hours']);
        $this->db->bind(':preReq', $data['pre-req']);
       
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = NULL;


    }
    public function searchSubjectByInput($data){
        $this->db->query('SELECT * FROM subject WHERE course_code LIKE :course_code OR title LIKE :title ');
        $search = '%' . $data['search'] . '%';
       
        $this->db->bind(':course_code', $search);
        $this->db->bind(':title', $search);
        

        if($this->db->rowCount() > 0 ) {
        $results = $this->db->resultSet();
            
        if($results){
            return $results;
        }else{
            return false;
        }
       
        }
        $this->db->query = null;
        
    }
     

    public function findAppliUsercantById($id){
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');
        $this->db->bind(':users_id',$id);

        $results = $this->db->single();
        
        return $results;



    }
    // update the status on rejected to blank
    public function updateStatusApp($data){
        $this->db->query('UPDATE applicant_form SET status = :status WHERE users_id = :id');
        $id = $data['users_id'];
        $status = "";
        $this->db->bind(':id', $data['users_id']);
        $this->db->bind(':status', $status);
        
        if($this->db->execute()){
            $to = $data['email'];
            $subject = $data['subject'];
            $message = "<a href='http://localhost/CvSU-Gentri-Enrollment/pages/home'>CvSU General Trias City Campus</a><br><br><br>" . "\r\n";
            $message .= " <br><br><br>" . "\r\n";
            $message .= $data['message'];
            $headers = "From: oracionmike@gmail.com" . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($to, $subject, $message, $headers);

            return true;
            
        }else{
            return false;
        }
        $this->db->query = null;


    }

  


    public function deleteForm($data){
        $this->db->query("DELETE FROM applicant_form WHERE id = :id");

        // bind
        $this->db->bind(':id', $data['formId']);
         // execute
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = null;

 

    }

    public function getSubjectofStudent($id){
        $this->db->query('SELECT * FROM users_subjects WHERE users_id = :users_id');
        $this->db->bind(':users_id', $id);
        if($this->db->rowCount() > 0 ) {
            $results = $this->db->resultSet();
                
            if($results){
                return $results;
            }else{
                return false;
            }
           
            }
            $this->db->query = NULL;
    }
    
    public function studentInfo($id){
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');
        $this->db->bind(':users_id', $id);
        if($this->db->rowCount() > 0 ) {
            $results = $this->db->single();
                
            if($results){
                return $results;
            }else{
                return false;
            }
           
            }
            $this->db->query = NULL;


    } 


    public function validateStudent($data){
        $this->db->query('UPDATE applicant_form SET student_no = :student_no, section = :section, validated = :validated, status = :status WHERE users_id = :users_id');
        $validated = 2;
        $status = "Enrolled";
        $this->db->bind(':users_id' , $data['users_id']);
        $this->db->bind(':validated', $validated);
        $this->db->bind(':status' , $status);
        $this->db->bind(':student_no',$data['studentNo']);
        $this->db->bind(':section',$data['section']);

        if($this->db->execute()){
            
            return true;

        }else{
            return false;
        }
        $this->db->query = null;


    }



    public function getTotalUsers(){
        $this->db->query('SELECT COUNT(email) AS count FROM users WHERE userLevel = :userLevel');
        $userLevel = 1;
        $this->db->bind(':userLevel', $userLevel);
       $results = $this->db->single();

       if($results){
           return $results->count;
       }else{
           return false;
       }
    }
    public function getTotalSemester(){
        $this->db->query('SELECT COUNT(status) AS count FROM semester ORDER BY id');
        $results = $this->db->single();

        if($results){
            return $results->count;
        } else{
            return false;   
        }


    }
    public function getTotalProgram(){
        $this->db->query('SELECT COUNT(id) AS count FROM program ORDER BY created_at');
        $results = $this->db->single();

        if($results){
            return $results->count;
        } else{
            return false;   
        }
    }
    public function getTotalEnrolled(){
        $this->db->query('SELECT COUNT(id) AS count FROM applicant_form WHERE status = :status');
        $status = "Enrolled";
        $this->db->bind(':status', $status);

        $results = $this->db->single();

        if($results){
            return $results->count;
        } else{
            return false;   
        }
    }

    public function getTotalCourse(){
        $this->db->query('SELECT COUNT(id) AS count FROM subject ORDER BY created_at');
        
       

        $results = $this->db->single();

        if($results){
            return $results->count;
        } else{
            return false;   
        }
    }

    public function getTotalApproval(){
        $this->db->query('SELECT COUNT(id) AS count FROM applicant_form WHERE status IN ("Evaluation","Exam/Interview","For Submission","Pre-Enrolled" )');
        
        $results = $this->db->single();

        if($results){
            return $results->count;
        } else{
            return false;   
        }
    }

    // this is to hide the delete btn
    public function findUserInAppli($id){
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');
        $this->db->bind(':users_id', $id);
        $results = $this->db->single();

        if($this->db->rowCount() > 0 ) {
            $results = $this->db->single();
                
            if($results){
                return $results->status;
            }else{
                return false;
            }
           
            }
            $this->db->query = NULL;

    }




}