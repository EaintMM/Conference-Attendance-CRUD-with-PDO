<?php
    class crud{
        // private database object
        private $db;

        // constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        // insert the attendee
        public function insertAttendee($fname,$lname,$dob,$email,$phone,$expertise){
            try{
                // define sql statement to be executed
                $sql = "INSERT INTO attendee(firstname,lastname,dateofbirth,email,phone,expertise_id) VALUES(:fname,:lname,:dob,:email,:phone,:expertise)";
                // prepare sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':expertise',$expertise);
                // execute statement
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }

        }

        // reterive the attendee
        public function getAttendees(){
            try{
                $sql = "SELECT * FROM attendee a inner join expertise e on a.expertise_id = e.expertise_id";
            $result = $this->db->query($sql);
            return $result;
            } catch(PDOExeception $e){
                echo $e->getMessage();
                return false;
            }
            
        }

        // reterive the expertise
        public function getExpertise(){
            try{
                $sql = "SELECT * FROM expertise";
                $result = $this->db->query($sql);
                return $result;
            } catch(PDOExeception $e){
                echo $e->getMessage();
                return false;
            }
            
        }

        // get one attendee details
        public function getAttendeesDetails($id){
            try{
                $sql = "SELECT * FROM attendee a inner join expertise e on a.expertise_id = e.expertise_id WHERE attendee_id=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOExeception $e){
                echo $e->getMessage();
                return false;
            }
            
        }

        // update the attendee
        public function editAttendee($id,$fname,$lname,$dob,$email,$phone,$expertise){
            try{
                // define sql statement to be executed
                $sql = "UPDATE attendee SET firstname=:fname,lastname=:lname,dateofbirth=:dob,email=:email,phone=:phone,expertise_id=:expertise WHERE attendee_id=:id";
                // prepare sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':expertise',$expertise);
                // execute statement
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }

        }

        // delete seleted attendee
        public function deleteAttendee($id){
            try{
                $sql = "DELETE from attendee WHERE attendee_id=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
            
        }
        


    }
?>