<?php
$username=filter_input(INPUT_POST,'name');
$password=filter_input(INPUT_POST,'password');
if(!empty($username))
{
   if(!empty($password)) {
       $host = "localhost";
       $dbusername = "root";
       $dbpassword ="";
       $dbname = "student";
       //create connection
       $conn = new mysqli ($host,$dbusername,$dbpassword, $dbname);
       if (mysqli_connect_error()){
           die('Connect Error('.mysqli_connect_errno().')' . mysqli_connect_error());
       }
       else
       {
           $sql="INSERT INTO account (name,password) values ('$username','$password')";
           if($conn->query($sql))
           {
               echo"New record is inserted successfully";
           }
           else{
               echo "Error:".$sql."<br>".$conn->error;
           }
           $conn->close();
       }
   }
    else
    {
    echo "Password should not be empty";
        die();
    }
}
  else
    {
    echo "Username should not be empty";
        die();
    }
?>