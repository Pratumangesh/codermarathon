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
      
    
    $username = $_POST["username"]; 
	$email = $_POST["email"];
    $password = $_POST["password"]; 

	
	
	
            
    $conn = mysqli_connect("localhost", "pratiksha", "pass", "login");
    $sql = "Select username from user where username='$username'";
    
    $result = mysqli_query($conn,$sql);
    
    $num = mysqli_num_rows($result); 
	
    if($num == 0) {
        
    
           # $hash = password_hash($password, PASSWORD_DEFAULT);
                
            // Password Hashing is used here.
			
            $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email','$password')";
    
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
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>

</body>
</html>
