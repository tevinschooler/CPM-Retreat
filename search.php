<?php 
 $tile='search';
 require_once 'includes/header.php' ;
 require_once 'includes/auth_check.php';

 require_once 'db/conn.php' ; 
    
 $results =$crud->getMembers();

 
?>
 <h1>Attendee Search Window</h1>  
   <hr>
<div class="container">

   <div class="col-md-8 col-md-offset-3" style="margin-top: 1%;">

   <?php 
     if(isset($_GET['search'])){
        $searchKey = $_GET['search'];
        $sql = "SELECT * FROM members WHERE `FirstName` LIKE '%$searchKey%%' OR `LastName` LIKE '%$searchKey%%'
        ";
     }else
         
     $sql = "SELECT * FROM Members";
     $lookup = $conn->query($sql);
   ?>

   <form action="" method="GET" style="width: 100%;"> 
     <div class="col-md-6">
        <input type="text" name="search" class='form-control' placeholder="Search" value=<?php echo @$_GET['search']; ?> > 
     </div>
   </form>

    
   <br> 
   <br>
</div>


<table class="table table-hover">
  <tr>


     <th>First Name</th>
     <th>Last Name</th>
     <th>Date Of Birth</th>
     <th>Email</th>
     <th>contactnumber</th>
      <th>Package</th>
     <th>Profile Image</th>
     

  </tr>
   
  <?php while( $row = $lookup->fetch_object() ): ?>
    
  <tr>
   
     <td><?php echo $row->firstname?></td>
     <td><?php echo $row->lastname?></td>
     <td><?php echo $row->dateofbirth?></td>
     <td><?php echo $row->email?></td>   
     <td><?php echo $row->contactnumber?></td> 
     <td><?php echo $row->package_id ?></td>
     
     <td><?php echo $row->avatar_path ?></td>
     <td>
            </td>

     
    
  </tr>
  <?php endwhile; ?>
</table>

<br/><br/><br/><br/>

<?php include_once 'includes/footer.php'?>
