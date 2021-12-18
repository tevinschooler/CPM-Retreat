<?php 
 $tile='Sucess';
 require_once 'includes/header.php';
// require_once 'includes/auth_check.php';
 require_once 'db/conn.php';
 require_once 'sendemail.php';

 if(isset($_POST['submit'])){
  //extract values from the $_post array
     $fname = $_POST['firstname'];
     $lname = $_POST['lastname'];
     $dob = $_POST['dob'];
     $email = $_POST['email'];
     $contact = $_POST['contact'];
     $package = $_POST['package'];
     

     $orig_file = $_FILES["avatar"]["tmp_name"];
     $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
     $target_dir = 'uploads/';
     $destination = "$target_dir$contact.$ext";
     move_uploaded_file($orig_file,$destination);


    

      $isSuccess=$crud->insertMembers($fname,$lname,$dob,$email,$contact,$package,$destination);
      $packageName =$crud->getpackageById($package);
      
          if($isSuccess){
              SendEmail::SendMail($email, 'Thank you for being apart of our anual retreat', 'You have successfully registerted for this year retreat');
            include 'includes/sucessmassage.php';
        }
        else{
            include 'includes/error.php';
        }

        }
?>
<style>

<?php include 'css/site.css'; ?>

</style>

<h1 class="text-center text-sucess ">You Have Been Registered! </h1>

<img src="<?php echo $destination; ?>" class="rounded-circle" style="width: 20%; height: 20%" />
 <div class="card-body"  style="width: 20rem;">
   <h5 class="card-title"><?php echo $_POST['firstname'].'  '. $_POST['lastname'] ?>
         </h5>
   <h6 class="card-subtitle mb-2 text-muted"> Package of choice: <?php echo $packageName['package_name'];  ?> </h6>

   <p class="card-text">
                 Email Adress:<?php echo $_POST['email'] ?> </p> </br>

      <p class="card-text">
                Contact Number: <?php echo $_POST['contact'];  ?>
            </p>
    <p class="card-text">
               Date Of Birth:<?php echo $_POST['dob'] ?> </p>

   <p class="card-text">Thank you for wanting to be apart of this experence.</p>

 </div>
 
 
 
<br>
<br>
<br>
<br>


<?php require_once 'includes/footer.php'   ?>