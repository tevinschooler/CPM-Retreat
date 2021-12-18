<?php   
 require_once 'db/conn.php' ;


if(isset($_POST['submit'])){
    //extract values from the $_post array
       $id = $_POST['id'];
       $fname = $_POST['firstname'];
       $lname = $_POST['lastname'];
       $dob = $_POST['dob'];
       $email = $_POST['email'];
       $contact = $_POST['contact'];
       $package = $_POST['package'];

       $result =$crud->editAttendee($id,$fname, $lname, $dob, $email, $contact, $package);

       if($result){
        header('Location: records.php');
    }
        else{
            include 'includes/error.php';
        }
    }
    else{
        include 'includes/error.php';
    }
 

?>