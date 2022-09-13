<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php

include 'db.php'; 
$exists=false;

    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
      
    
    $name = $_POST["name"];
	$mobile = $_POST["mobile"];
	$address = $_POST["address"];
	$email = $_POST["email"];
   

	
	
	
            
    $conn = mysqli_connect("localhost", "pratiksha", "pass", "login");
    $sql = "Select username from employee where name='$name'";
    
    $result = mysqli_query($conn,$sql);
    
    $num = mysqli_num_rows($result); 
	
    if($num == 0) {
        
    
           # $hash = password_hash($password, PASSWORD_DEFAULT);
                
            // Password Hashing is used here.
			
            $sql = "Update employee  SET '$mobile'='','$address'='','$email'='' WHERE name='$name'";
			#UPDATE CUSTOMERS SET ADDRESS = 'Pune' WHERE ID = 6;
    
            $result = mysqli_query($conn, $sql);
			 header("location: login.php");
    
            if ($result) {
                $showAlert = true; 
            }

        } 
        else { 
             echo "Passwords do not match"; 
        }      
    }// end if 
	
  
  
    
//end if   
    
?>


<div class="form">
<h1>Add Employee</h1>
<form name="registration" action="" method="post">
<input type="text" name="name" placeholder="Name" required />
<input type="text" name="mobile" placeholder="Mobile number" required />
<input type="text" name="address" placeholder="Address" required />
<input type="text" name="email" placeholder="Email" required />
<input type="submit" name="submit" value="SUBMIT" />
</form>
</div>
</body>
</html>
