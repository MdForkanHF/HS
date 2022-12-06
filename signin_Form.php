<?php
$Servername="localhost";
$Username="root";
$password="";
$database_name="signin";

$conn=mysqli_connect($Servername,$Username,$password,$database_name);
//now check the connection
if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}
 if(isset($_POST['save']))
{
    $First Name = $_POST['First Name'];
    $Last Name = $_POST['Last Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $phone = $_POST['Confirm Password'];
 
    $sql_query = "INSERT INTO signin_Form(First Name,Last Name,Email,Password,mobile) VALUES ('$First Name','$Last Name','$Email','$Password','$phone')";

     if (mysqli_query($conn, $sql_query))
    {
         echo "New Details Entry inserted successfully !";
    }
    else
    {
          echo "Error: " .$sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>