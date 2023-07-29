<html>
<body>
<?php
    $isok=false;
    $e= $_POST["User"];
    $s= $_POST["pass"];
    echo("connecting to database....."."<br>");
    $conn= new mysqli("localhost","root","","users");
    if($conn->connect_error)
    {
        echo ("database conection failed");
    }
    else{
        echo("Connection Successful..."."<br>");
    }
  
    echo (" Creating New Account"."<br>");
        $sql="insert into logininfo(Username,Password) values(?,?)";
         $stmt=$conn->prepare($sql);
        $stmt->bind_param('ss',$e,$s);
              
        if ($stmt->execute()) {
            echo "New record created successfully";
            $isok=true;
           } else {
            echo "Unable to create record";
    }
$conn->close();
if($isok==true)
{
    include("../HTML/success.html");
}
?>

</body>
</html>
