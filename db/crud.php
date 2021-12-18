<?php   
        class crud{
            // private database object
            private $db;
            // constructor to initialize private varibale to the databse connnetion
            function __construct($conn){
                $this->db =$conn;
            }

       public function insertMembers($fname, $lname, $dob, $email, $contact, $package, $avatar_path){
               try {
            $sql ="INSERT INTO members (firstname,lastname,dateofbirth,email,contactnumber,package_id,avatar_path)
            VALUES(:firstname, :lastname, :dateofbirth, :email,:contactnumber, :package_id, :avatar_path)";
                            $stmt= $this-> db->prepare($sql);
                            $stmt->bindparam(':firstname', $fname);
                            $stmt->bindparam(':lastname', $lname);
                            $stmt->bindparam(':dateofbirth', $dob);
                            $stmt->bindparam(':email', $email);
                            $stmt->bindparam(':contactnumber', $contact);                            
                            $stmt->bindparam(':package_id', $package);
                            $stmt->bindparam(':avatar_path', $avatar_path);

                    $stmt->execute();
                    return true;
               } catch (PDOException $e) {
                   echo $e->getMessage();
                   return false;
               }
        
            } 

            public function editAttendee($id,$fname, $lname, $dob, $email, $contact, $package){
                try {
                    $sql= "UPDATE `members` SET `firstname`= :fname,`lastname`= :lname,
                    `dateofbirth`= :dob, `email` = :email, `contactnumber` = :contact,`package_id`=:$package 
                     WHERE `members_id` = :id";
                     $stmt= $this-> db->prepare($sql);
                     $stmt->bindparam(':id', $id);
                     $stmt->bindparam(':firstname', $fname);
                     $stmt->bindparam(':lastname', $lname);
                     $stmt->bindparam(':dateofbirth', $dob);
                     $stmt->bindparam(':contactnumber', $contact);
                     $stmt->bindparam(':email', $email);
                     $stmt->bindparam(':package_id', $$package);
                    
                     $stmt->execute();
                     return true;
                    
                } catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
                    }             
                    
            }

            public function getAttendeeDetails($id){
                try{
                    $sql ="SELECT * FROM members a inner join packages s  on a.package_id = s.package_id
                    where member_id=:id";
                   $stmt = $this->db->prepare($sql);
                   $stmt->bindparam(':id', $id);
                   $result =$stmt->execute();
                   $result= $stmt->fetch();
                   return $result;

                }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
                
            }

            public function deleteMemeber($id){
                try {
                    $sql= "delete from members where members_id= :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam('id', $id);
                    $stmt->execute();
                return true;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
                

            }

            public function getMembers(){
            $sql ="SELECT * FROM `members` a inner join packages s  on a.package_id = s.`package_id`";
                $result= $this->db->query($sql);
                return $result;
            }

            public function getpackages(){
                $sql ="SELECT * FROM `packages`";
                $result= $this->db->query($sql);
                return $result;
            }

            public function getpackageById($id){
                try{
                    $sql = "SELECT * FROM `packages` where package_id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id', $id);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;
                }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
                
            }

        }


?>