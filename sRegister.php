<?php

session_start();
$con=mysqli_connect('localhost','root','','quizdb') or die("Unable to connect");

$x=0;
$user=$_POST['username'];
 $email=$_POST['email'];
 $mob=$_POST['mobile'];
 $pass=$_POST['password'];
 $cpass=$_POST['con_pass'];
 
 if(isset($_POST["Register"])){

    if(!preg_match("/^[a-zA-Z0-9 _]*$/",$user) or strlen($user)<8) {
        echo "<script> alert('In username use only Numerals, Spaces, Underscore & Alphabets and length must be greater or equal to 8')</script>";
        header("Refresh:1;url=_________________");     #register page link
        $x=1;
    }
    if(!preg_match("/^[a-z0-9@_.]*$/",$email) {
        echo "<script> alert('In E-mail use only Numerals, @, Underscore,Full stop And Lower case Alphabets.')</script>";
        header("Refresh:1;url=_________________");     #register page link
        $x=1;
    }
    if(!preg_match("/^[0-9]*$/",$mob) or strlen($mob)!=10) {
        echo "<script> alert('In Mobile use only Numbers and length must be 10.')</script>";
        $x=1;
    }
     
     if($pass!=$cpass){
        echo "<script> alert('Invalid password!!<br>Invalid Password!!!Please Try again...<br>Forwarding again to signup page.')</script>";
        #echo "Invalid Password!!!Please Try again...<br>Forwarding again to signup page.";
        $x=1;
        header("Refresh:1;url=_________________");     #register page link
        }

    if($x==0){
        $crypt_pass=md5($pass);
        
        $sql="select * from  s_register where username = '$user' ";
        $rec=mysqli_query($con,$sql);
        $n=mysqli_num_rows($rec);
        
        if($n==1){
            echo "Username not available.<br>Login with your previous credentials";
            }
            
        else{
            $ins="insert into s_register (user,email,mob,password) values ('$user','$email','$mob','$crypt_pass')";
            mysqli_query($con,$ins);
            echo "Registered Successfully...<br>Login with filled credentials";
            }
         header("Refresh:1; url=%e2%80%aalogin.html");
            
     }
} 

mysqli_close($con);

?>
