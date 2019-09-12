<?php
session_start();

$conn=mysqli_connect('localhost','root','','quizdb') or die('Unable to connect to MySQL server.....');

$_SESSION['user']='';

if(isset($_POST['login'])){
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $c_pass=md5($pass);

    $sql="Select * from s_register where user='$user' and password='$c_pass' ";
    $rec=mysqli_query($conn,$sql);
    $n=mysqli_num_rows($rec);
    if($n==1){
        $_SESSION['user']=$user;
        echo "<script>alert('Logged in Successfully!!')</script>";
        header("Refresh:1; url=instruction_page.html");    #after login the interface student face
    }

    else{
        echo "<script>alert('Check your password or username!<br>Redirecting back.....login again...')</script>";
        header("Refresh:1; url=__________________________________");        #login page again
    }
    
    }

    mysqli_close($conn);
}
