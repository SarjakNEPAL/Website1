<HTML>
    <style>

    </style>
    <body>
        
<?php
    $Logged=false;
    $existence=false;
    $e= $_POST["User"];
    $s= $_POST["pass"];
    $conn= new mysqli("localhost","root","","users");
    $query="select * from logininfo";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {
        $userID= $row['Username'];
        $userPSS= $row['Password'];
        if($userID==$e)
        {
               if($userPSS==$s)
               {
                 $Logged=true;
                 echo("Logged in");
               }
               else
               {
                echo '<script >alert("Wrong Password")</script>';
                $Logged=False;
               }
               $existence=true;
            
        }
        else
        {
            $Logged=False;
        }
    }
    if($existence==False)
    {
        echo '<script>alert("User not found")</script>';
      
    }
    $conn->close();
    if($Logged==false)
    {
        include("../HTML/HOME.html");
    }
    

?>
<script>
        
    </script>
</body>
</HTML>