<?php
$servername = "localhost";
$username="root";
$password = "";
$dbname = "login";
try{
    $conn =new PDO("mysql:host=$servername;
    dbname=$dbname",$username,$password);


    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::
    ERRMODE_EXCEPTION);


    $name = $password = $nameErr = $passwordErr = $error = "" ;

    if($_SERVER["REQUEST_METHOD"] = "POST")
    {
        if (empty(test_input($_POST["username"])))
        {
           $nameErr = "Enter Username";
           echo $nameErr;
        }
        else if (empty(test_input($_POST["password"])))
        {
            $passwordErr = "Enter Password";
            echo $passwordErr;
        }
        else
        {
            $name = test_input($_POST["username"]);
            $password = test_input($_POST["password"]); 
            echo $name.$password;
            $stmt = $conn->query("SELECT id FROM user WHERE name = '$name' and password = '$password';");
        
            if($stmt->execute())
            {
                if ($stmt->rowcount()==1)
                {
                    echo "successfull";
                    session_start();
                    $_SESSION["name"] = $name;
                    header("Location:/");
                } 
                else
                {
                    $error = "username or password didn't match";
                    echo $error;
                }
            }
        }
    }

    }
catch(PDOException $e)
{
    echo"Error: ".$e->getMessage(); 
}

function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

