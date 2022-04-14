<?php

class Page {
    private $db;
    

    public function __construct() {
        $this->db = new Database;
    }


    public function login($email,$password) {

        $this->db->query('SELECT * FROM users WHERE email = :email');

            // bind the value
            $this->db->bind(':email', $email);
            
            if($this->db->rowCount() > 0 ) {
                $row = $this->db->single();
                $verified = $row->verified;
                $hashedPassword = $row->password;
                if(password_verify($password, $hashedPassword)){
                    return $row;
                }else{
                    return false;
                }
            } 
            

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

    public function signup($data, $hashedpass){
       $this->db->query('INSERT INTO users (firstname, lastname, email, password, vkey, userLevel) VALUES (:firstname, :lastname, :email, :password, :vkey, :userLevel)');
        $vkey = md5(time().$data['email']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $hashedpass);
        $this->db->bind(':vkey', $vkey);
        $this->db->bind(':userLevel', $data['userLevel']);
        
        if($this->db->execute()) {
            $to = $data['email'];
            $subject = "Email verification";
            $message = "<a href='http://localhost/CvSU-Gentri-Enrollment/pages/verification?vkey=$vkey'>Register Account</a>";
            $headers = "From: oracionmike@gmail.com" . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($to, $subject, $message, $headers);

            return true;
        }else{
            return false;
        }
      
    }
    public function getvkey($vkey){
        $this->db->query('SELECT verified,vkey FROM users WHERE verified = 0 AND vkey = :vkey LIMIT 1');
        $this->db->bind(':vkey',$vkey);

        if($this->db->rowCount() == 1 ) {
            $row = $this->db->single();
            $dbvkey = $row->vkey;
            if($vkey == $dbvkey){
                $this->db->query('UPDATE users SET verified = 1 WHERE vkey = :vkey LIMIT 1');
                $this->db->bind(':vkey', $vkey);
                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
                $this->db->query = NULL;

            }
            

        } 
    }


    // important
    public function getUsers_id($users_id){
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');
        $this->db->bind(':users_id',$users_id);
        if($this->db->rowCount() > 0 ) {
            $row = $this->db->single();
            
            if($row){
                return $row;
            }else{
                return false;
            }
           
        } 
       
    }
 
    
    public function selectAllprogram(){
        $this->db->query('SELECT * FROM program ORDER BY id ASC');

        $results = $this->db->resultSet();
        
        return $results;

    }
    
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

    public function findUserOnApplicant($users){
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');
        $this->db->bind(':users_id',$users);
        if($this->db->rowCount() > 0 ) {
            $row = $this->db->single();
        
            if($row){
                return $row;
            }else{
                return false; 
            }
           
        } 

    }

    public function collectProgram(){
        $this->db->query('SELECT * FROM program ORDER BY created_at DESC');
        $results = $this->db->resultSet();

        return $results;


    }

    public function collectyearlevels(){
        $this->db->query('SELECT * FROM yearlevel ORDER BY created_at');
        $results = $this->db->resultSet();

        return $results;


    }
    public function collectSubjects(){
        $this->db->query('SELECT * FROM subject ORDER BY created_at');
        $results = $this->db->resultSet();

        return $results;


    }


    public function getAllinfo($id){
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');
        $this->db->bind(':users_id', $id);

        if($this->db->rowCount() > 0 ) {
            $row = $this->db->single();
            
            if($row){
                return $row;
            }else{
                return false;
            }
           
        } 


    }

    public function getAllsubject($id){
        $this->db->query('SELECT * FROM users_subjects WHERE users_id = :users_id');
        $this->db->bind(':users_id', $id);
        if($this->db->rowCount() > 0 ) {
            $row = $this->db->resultSet();
            
            if($row){
                return $row;
            }else{
                return false;
            }
           
        }  
    }
    // add subjects
    public function studentSubjects($data){
        $this->db->query('INSERT INTO users_subjects (users_id, semester, program, yearLevel, sched_code, course_code, title, lec_units, lab_units, lec_hours, lab_hours, preReq) VALUES (:users_id, :semester, :program, :yearLevel, :sched_code, :course_code, :title, :lec_units, :lab_units, :lec_hours, :lab_hours, :preReq )');

        $this->db->bind(':users_id', $data['users_id']);
        $this->db->bind(':semester', $data['semester']);
        $this->db->bind(':program', $data['program']);
        $this->db->bind(':yearLevel', $data['yearLevel']);
        $this->db->bind(':sched_code', $data['sched_code']);
        $this->db->bind(':course_code', $data['course_code']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':lec_units', $data['lec_units']);
        $this->db->bind(':lab_units', $data['lab_units']);
        $this->db->bind(':lec_hours', $data['lec_hours']);
        $this->db->bind(':lab_hours', $data['lab_hours']);
        $this->db->bind(':preReq', $data['preReq']);

        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = NULL;

 
    }
    // get semester from application form
    public function getSemesterFromApplication($id){
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');
        $this->db->bind(':users_id', $id);
        if($this->db->rowCount() > 0 ) {
            $row = $this->db->single();
            
            if($row){
                return $row;
            }else{
                return false;
            }
           
        }  
        
    }





    // select id on subject listining table
    public function selectUserfromSubject($id){
        $this->db->query('SELECT * FROM users_subjects WHERE users_id = :users_id');
        $this->db->bind(':users_id', $id);
        if($this->db->rowCount() > 0 ) {
            $row = $this->db->resultSet();
            
            if($row){
                return $row;
            }else{
                return false;
            }
           
        } 
        $this->db->query = NULL;
    }

    public function getSubjectFromSubject($subject_id){
        $this->db->query('SELECT * FROM subject WHERE id = :subject_id');
        $this->db->bind(':subject_id', $subject_id);
       $results = $this->db->single();
       if($results){
           return $results;
       }else{
           return false;
       }



    }

    public function deleteSubjectSelected($data){
        $this->db->query('DELETE FROM users_subjects WHERE id = :id AND users_id = :users_id');

        $this->db->bind(':id',$data['subject_id']);
        $this->db->bind(':users_id',$data['users_id']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = NULL;


    }
 
    
    
    
    public function checkAndUpdate($id){
        $this->db->query('UPDATE applicant_form SET status = :status, validated = :validated WHERE users_id = :users_id');
        $validated = 1;
        $status = "Pre-Enrolled";
        $this->db->bind(':users_id',$id);
        $this->db->bind(':status', $status);
        $this->db->bind(':validated',$validated);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = NULL;  

    }




}