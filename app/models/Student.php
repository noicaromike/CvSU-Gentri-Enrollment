<?php

class Student {
    private $db;
    

    public function __construct() {
        $this->db = new Database;
    }

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

    public function authenticate($email,$password) {

        $this->db->query('SELECT * FROM users WHERE email = :email');

            // bind the value
            $this->db->bind(':email', $email);
            
            if($this->db->rowCount() > 0 ) {
                $row = $this->db->single();
                $hashedPassword = $row->password;
                if(password_verify($password, $hashedPassword)){
                    return $row;
                }else{
                    return false;
                }
            } 
            

    }
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

    //enroll btn close
    public function getUserById($id){
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');
        $this->db->bind(':users_id', $id);

        if($this->db->rowCount() > 0) {
            return true;

        } else {
            return false;
        }

    }


    // get user_id form
    public function findUserInApplicantById($id) {
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');

        $this->db->bind(':users_id', $id);
        
        $row = $this->db->single();
        return $row;
        
    }

    // get the user id from applicant
   


    public function findApplicantById($id){
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');
       
        $this->db->bind(':users_id',$id);
       
        $row = $this->db->single();
        return $row;
        

    }
    public function updateStatusById($data,$status){
        $this->db->query("UPDATE applicant_form SET status = :status WHERE users_id =:id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':status', $status);
       
        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = NULL;
    }

    public function setActiveStatus($active){
        $this->db->query('SELECT * FROM semester WHERE status = :status');
       
        $this->db->bind(':status',$active);
        if($this->db->rowCount() > 0) {
            return true;

        } else {
            return false;
        }
        
    }
    public function getActiveStatus($active){
        $this->db->query('SELECT * FROM semester WHERE status = :status');
       
        $this->db->bind(':status',$active);
        $row = $this->db->single();
        return $row;
        $this->db->query = NULL;
        
    }

   

    //edit information 
    public function getGender(){
        $this->db->query('SELECT * FROM gender ORDER BY id ASC');
        $results = $this->db->resultSet();

        return $results;
        $this->db->query = null;
    }
    public function getAllCourses(){
        $this->db->query('SELECT * FROM program ORDER BY id ASC');

        $results = $this->db->resultSet();

        return $results;
        $this->db->query = null;


    }
    public function getCivilStatus(){
        $this->db->query('SELECT * FROM civil_status ORDER BY id ASC');

        $results = $this->db->resultSet();

        return $results;
        $this->db->query = null;

    }

    public function getBirthOrder(){
        $this->db->query('SELECT * FROM birth_order ORDER BY id ASC');
        $results = $this->db->resultSet();

        return $results;
        $this->db->query = null;
    }

    public function getAllincome(){
        $this->db->query('SELECT * FROM family_income ORDER BY id ASC');

        $results = $this->db->resultSet();

        return $results;
        $this->db->query = NULL;
    }

    public function getAllmedHistory(){
        $this->db->query('SELECT * FROM medical_history ORDER BY id ASC');

        $results = $this->db->resultSet();

        return $results;
        $this->db->query = NULL;
    }
    public function getApplicationType(){
        $this->db->query('SELECT * FROM application_type ORDER BY id DESC');
        $results = $this->db->resultSet();
        return $results;
        $this->db->query = null;
    }
    public function getApplicantById($id){
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');

        $this->db->bind(':users_id',$id);
       
        $row = $this->db->single();
        return $row;
        $this->db->query = NULL;
    }


    // *****

    // 
    public function getSemesterActive($active){
        $this->db->query('SELECT * FROM semester WHERE status = :status');
        $this->db->bind(':status', $active);
        $row = $this->db->single();
        return $row;
        $this->db->query = NULL;

    }
    

    // get applicant by id
    public function getStudentById($id){
        $this->db->query('SELECT * FROM applicant_form WHERE users_id = :users_id');

        $this->db->bind(':users_id', $id);
        $row = $this->db->single();
        return $row;
        $this->db->query = NULL;


    }



    // control no
    public function getMaxControlNo(){
        $this->db->query('SELECT * FROM control_no ORDER BY control_no DESC LIMIT 1');
        $results = $this->db->single();
        
        if($results){
            return $results->control_no;
        } else {
            return false;
        }
        $this->db->query = null;
        
        
    }




   
    // $newNameFour,
    //update student info
    public function updateApplicant($users_id, $data, $newNameOne, $newNameTwo, $newNameThree, $control_no,$semester,$academic_year){
        $this->db->query('UPDATE applicant_form SET applicationType = :applicationType, firstCourse = :firstCourse, secondCourse = :secondCourse, thirdCourse = :thirdCourse, firstName = :firstName,MiddleName = :MiddleName, LastName = :LastName, suffix = :suffix, gender = :gender, civilStatus = :civilStatus, Age = :Age, dateOfBirth = :dateOfBirth, Religion = :Religion, Nationality = :Nationality, Married = :Married, currentStreetNo = :currentStreetNo, currentBarangay = :currentBarangay, currentMunicipality = :currentMunicipality, permanentStreetNo = :permanentStreetNo, permanentBarangay = :permanentBarangay, permanentMunicipality = :permanentMunicipality, fatherFullName = :fatherFullName, fatherOccupation = :fatherOccupation, fatherContact = :fatherContact, motherFullName = :motherFullName, motherOccupation =  :motherOccupation, motherContact = :motherContact, guardianFullName =  :guardianFullName, guardianOccupation = :guardianOccupation, guardianContact = :guardianContact, noSibling = :noSibling, birthOrder = :birthOrder, Income = :Income, elemSchool = :elemSchool, elemAddress = :elemAddress, elemGraduate = :elemGraduate, secondarySchool = :secondarySchool, secondaryAddress = :secondaryAddress, secondaryGraduate = :secondaryGraduate, seniorHsSchool = :seniorHsSchool, seniorHsAddress = :seniorHsAddress, seniorHsGraduate = :seniorHsGraduate, alsSchool = :alsSchool, alsAddress = :alsAddress, alsGraduate = :alsGraduate, collegeSchool = :collegeSchool, collegeAddress = :collegeAddress, collegeGraduate = :collegeGraduate, medication = :medication, allergicTo = :allergicTo, specifyOther = :specifyOther, medicalHistory = :medicalHistory, applicantContact = :applicantContact, applicantEmail = :applicantEmail, reportCard = :reportCard, goodMoral = :goodMoral,oneByOne = :oneByOne, status = :status, control_no = :control_no,semester = :semester,academic_year = :academic_year WHERE  users_id = :users_id');
        // honorDismissal = :honorDismissal,
        $this->db->bind(':academic_year',$academic_year);
        $this->db->bind(':semester',$semester);
        $this->db->bind(':applicationType',$data['applicationType']);
        $this->db->bind(':firstCourse',$data['firstCourse']);
        $this->db->bind(':secondCourse',$data['secondCourse']);
        $this->db->bind(':thirdCourse',$data['thirdCourse']);
        $this->db->bind(':firstName',$data['firstName']);
        $this->db->bind(':MiddleName',$data['MiddleName']);
        $this->db->bind(':LastName',$data['LastName']);
        $this->db->bind(':suffix',$data['suffix']);
        $this->db->bind(':gender',$data['gender']);
        $this->db->bind(':civilStatus',$data['civilStatus']);
        $this->db->bind(':Age',$data['Age']);
        $this->db->bind(':dateOfBirth',$data['dateOfBirth']);
        $this->db->bind(':Religion',$data['Religion']);
        $this->db->bind(':Nationality',$data['Nationality']);
        $this->db->bind(':Married',$data['Married']);
        $this->db->bind(':currentStreetNo',$data['currentStreetNo']);
        $this->db->bind(':currentBarangay',$data['currentBarangay']);
        $this->db->bind(':currentMunicipality',$data['currentMunicipality']);
        $this->db->bind(':permanentStreetNo',$data['permanentStreetNo']);
        $this->db->bind(':permanentBarangay',$data['permanentBarangay']);
        $this->db->bind(':permanentMunicipality',$data['permanentMunicipality']);
        $this->db->bind(':fatherFullName',$data['fatherFullName']);
        $this->db->bind(':fatherOccupation',$data['fatherOccupation']);
        $this->db->bind(':fatherContact',$data['fatherContact']);
        $this->db->bind(':motherFullName',$data['motherFullName']);
        $this->db->bind(':motherOccupation',$data['motherOccupation']);
        $this->db->bind(':motherContact',$data['motherContact']);
        $this->db->bind(':guardianFullName',$data['guardianFullName']);
        $this->db->bind(':guardianOccupation',$data['guardianOccupation']);
        $this->db->bind(':guardianContact',$data['guardianContact']);
        $this->db->bind(':noSibling',$data['noSibling']);
        $this->db->bind(':birthOrder',$data['birthOrder']);
        $this->db->bind(':Income',$data['Income']);
        $this->db->bind(':elemSchool',$data['elemSchool']);
        $this->db->bind(':elemAddress',$data['elemAddress']);
        $this->db->bind(':elemGraduate',$data['elemGraduate']);
        $this->db->bind(':secondarySchool',$data['secondarySchool']);
        $this->db->bind(':secondaryAddress',$data['secondaryAddress']);
        $this->db->bind(':secondaryGraduate',$data['secondaryGraduate']);
        $this->db->bind(':seniorHsSchool',$data['seniorHsSchool']);
        $this->db->bind(':seniorHsAddress',$data['seniorHsAddress']);
        $this->db->bind(':seniorHsGraduate',$data['seniorHsGraduate']);
        $this->db->bind(':alsSchool',$data['alsSchool']);
        $this->db->bind(':alsAddress',$data['alsAddress']);
        $this->db->bind(':alsGraduate',$data['alsGraduate']);
        $this->db->bind(':collegeSchool',$data['collegeSchool']);
        $this->db->bind(':collegeAddress',$data['collegeAddress']);
        $this->db->bind(':collegeGraduate',$data['collegeGraduate']);
        $this->db->bind(':medication',$data['medication']);
        $this->db->bind(':allergicTo',$data['allergicTo']);
        $this->db->bind(':specifyOther',$data['specifyOther']);
        $this->db->bind(':medicalHistory',$data['medicalHistory']);
        $this->db->bind(':applicantContact',$data['applicantContact']);
        $this->db->bind(':applicantEmail',$data['applicantEmail']);
        $this->db->bind(':reportCard',$newNameOne);
        $this->db->bind(':goodMoral',$newNameTwo);
        $this->db->bind(':oneByOne',$newNameThree);
        // $this->db->bind(':honorDismissal',$newNameFour);
        $this->db->bind(':status',$data['status']);
        $this->db->bind(':users_id', $users_id);
        $this->db->bind(':control_no',$control_no);


 
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = null;
    
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
    public function getSubjectFromSubject($id){
        $this->db->query('SELECT * FROM users_subjects WHERE users_id = :users_id');
        $this->db->bind(':users_id',$id);
        
        if($this->db->rowCount() > 0 ) {
            $row = $this->db->resultSet();
            
            if($row){
                return $row;
            }else{
                return false;
            }
           
        } 
        
       

    }

    public function checkStatusUser($id){
        $this->db->query('SELECT status FROM applicant_form WHERE users_id = :users_id');
        $this->db->bind(':users_id', $id);
        
        $results = $this->db->single();

        return $results;

        $this->db->query = NULL;
    }






}