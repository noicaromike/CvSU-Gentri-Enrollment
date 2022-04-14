<?php

class Admission {
    private $db;
    

    public function __construct() {
        $this->db = new Database;
    }

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


    /**
     * post the max control no
     *  */ 
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

    /**
     * add control no. for new applicant and transferee
     *  */ 

    public function addControlNo($users_id, $control_no){
        $this->db->query(' INSERT INTO control_no (users_id, control_no) VALUES (:users_id, :control_no)');
       
        
        $this->db->bind(':users_id', $users_id);
        $this->db->bind(':control_no', $control_no);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        $this->db->query = null;
    }

    // Application Type
    public function getApplicationType(){
        $this->db->query('SELECT * FROM application_type ORDER BY id DESC');
        $results = $this->db->resultSet();
        return $results;
        $this->db->query = null;
    }

    public function getSemesterActive($active){
        $this->db->query('SELECT * FROM semester WHERE status = :status');
        $this->db->bind(':status', $active);
        $row = $this->db->single();
        return $row;
        $this->db->query = NULL;

    }
    // $newNameFour
    public function addApplicationRecord($users_id, $data, $newNameOne, $newNameTwo, $newNameThree,$control_no,$semester,$academic_year){
        $this->db->query('INSERT INTO applicant_form (applicationType, firstCourse, secondCourse, thirdCourse,firstName,MiddleName, LastName, suffix, gender, civilStatus, Age, dateOfBirth, Religion, Nationality, Married, currentStreetNo, currentBarangay, currentMunicipality, permanentStreetNo, permanentBarangay, permanentMunicipality, fatherFullName, fatherOccupation, fatherContact, motherFullName, motherOccupation, motherContact, guardianFullName, guardianOccupation, guardianContact, noSibling, birthOrder, Income, elemSchool, elemAddress, elemGraduate, secondarySchool, secondaryAddress, secondaryGraduate, seniorHsSchool, seniorHsAddress, seniorHsGraduate, alsSchool, alsAddress, alsGraduate, collegeSchool, collegeAddress, collegeGraduate, medication, allergicTo, specifyOther, medicalHistory, applicantContact, applicantEmail, reportCard, goodMoral,oneByOne, status, users_id, control_no,semester,academic_year) VALUES (:applicationType, :firstCourse, :secondCourse, :thirdCourse, :firstName, :MiddleName, :LastName, :suffix, :gender, :civilStatus, :Age, :dateOfBirth, :Religion, :Nationality, :Married, :currentStreetNo, :currentBarangay, :currentMunicipality, :permanentStreetNo, :permanentBarangay, :permanentMunicipality, :fatherFullName, :fatherOccupation, :fatherContact, :motherFullName, :motherOccupation, :motherContact, :guardianFullName, :guardianOccupation, :guardianContact, :noSibling, :birthOrder, :Income, :elemSchool, :elemAddress, :elemGraduate, :secondarySchool, :secondaryAddress, :secondaryGraduate, :seniorHsSchool, :seniorHsAddress, :seniorHsGraduate, :alsSchool, :alsAddress, :alsGraduate, :collegeSchool, :collegeAddress, :collegeGraduate, :medication, :allergicTo, :specifyOther, :medicalHistory, :applicantContact, :applicantEmail, :reportCard, :goodMoral, :oneByOne,  :status, :users_id, :control_no, :semester,:academic_year)');
        // :honorDismissal,
        // honorDismissal, 
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








    public function login($userName, $password) {
        $this->db->query('SELECT * FROM users WHERE userName = :userName');

        // bind the value
        $this->db->bind(':userName', $userName);
        
        if($this->db->rowCount() > 0 ) {
            $row = $this->db->single();
            $hashedPassword = $row->password;
            if(password_verify($password, $hashedPassword)){
                return $row;
            }else{
                return false;
            }
        } 
        $this->db->query = null;



    }



    public function findAllCourse(){
        $this->db->query('SELECT * FROM course ORDER BY create_at ASC');

        $results = $this->db->resultSet();

        return $results;
        $this->db->query = null;
    }






    public function GetControlNoById($id){
        $this->db->query('SELECT * FROM control_no WHERE users_id = :users_id');

        $this->db->bind(':users_id', $id);
        
        $row = $this->db->single();
        return $row;
        $this->db->query = null;
    }



}