<?php

session_start();
$conn=mysqli_connect('localhost','root','','quizdb') or die("Unable to connect to mysql server.");

$q=$_POST['qid'];

if(isset($_POST['del'])){
    $c_pass=md5($_POST['pass']);
    $sql="Select * from admin where password='$c_pass' ";
    $rec=mysqli_query($conn,$sql);
    $n=mysqli_num_rows($rec);

    if($n==1){
       
        $d="DELETE FROM `questions` where qid= $q ";
        mysqli_query($conn,$d);
        echo "<script> alert('DELETED SUCESSFULLY') </script>";
        header('refersh:1;url:show_que.php');

    }
    else{
        echo "<script> alert('Check your password') </script>";
    }

}

mysqli_close($conn);

?>
