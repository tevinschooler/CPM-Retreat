<?php  

  /* 
$host='127.0.0.1';
        $db='cpm_mem_ret22';
        $user='root';
        $pass='';
        $charset ='utf8mb4';

        $dsn= "mysql:host=$host; dbname=$db; charest=$charset";
        $conn = new mysqli('localhost', 'root', '', 'cpm_mem_ret22');

 */
   
       
     $host='bzkedmxa9xorzlivoddw-mysql.services.clever-cloud.com';
        $db='bzkedmxa9xorzlivoddw';
        $user='uaajgj9wa90e3ay5';
        $pass='qZbE0NvwSP7OiS8dhp8U';
        $charset ='utf8mb4';

        $dsn= "mysql:host=$host; dbname=$db; charest=$charset";

        $conn = new mysqli('bzkedmxa9xorzlivoddw-mysql.services.clever-cloud.com', 'uaajgj9wa90e3ay5', 'qZbE0NvwSP7OiS8dhp8U', 'bzkedmxa9xorzlivoddw');




       

        try{
                $pdo = new PDO($dsn, $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                echo '<span class="badge bg-success"> </span>';

        } catch(PDOException $e) {

          throw new PDOException($e->getMessage("Database it offline"));
          
        }

        require_once 'crud.php';
        require_once 'user.php';
        $crud=new crud($pdo);
        $user=new user($pdo);

        $user->insertUser("admin","password");
?>
