<?php

session_start();
$conn=mysqli_connect('localhost','root','','quizdb') or die("Unable to connect to mysql server.");

$q=$_POST['ques'];
$o1=$_POST['opt1'];
$o2=$_POST['opt2'];
$o3=$_POST['opt3'];
$o4=$_POST['opt4'];
$c_ans=$_POST['corr'];

if(isset($_POST['add'])){
    $c_pass=md5($_POST['pass']);
    $sql="Select * from admin where password='$c_pass' ";
    $rec=mysqli_query($conn,$sql);
    $n=mysqli_num_rows($rec);

    if($n==1){
        $sql="Select * from questions where que='$q' ";
        $rec=mysqli_query($conn,$sql);
        $n=mysqli_num_rows($rec);

        if($n==0){
            if($o1!=$o2 && $o1!=$o3 && $o1!=$o4 && $o2!=$o3 && $o2!=$o4 && $o3!=$o4){
                if(!preg_match("/^[a-d]*$/",$c_ans) or strlen($c_ans)==1){
                    $ins="Insert into questions (que,choice1,choice2,choice3,choice4,correct_ans) values('$q','$o1','$o2','$o3','$o4','$c_ans')";
                    $r=mysqli_query($conn,$ins);
                    echo "<script> alert('QUESTION ADDED SUCESSFULLY') </script>";
                }
                else{
                    echo "<script> alert('Correct answer must be any of four option') </script>";
                }
            }
            else{
                echo "<script> alert('No two options will be same') </script>";
            }
        }
        else{
            echo "<script> alert('Question Exists') </script>";
        }
    }
    else{
        echo "<script> alert('Check your password') </script>";
    }

}

mysqli_close($conn);

?>
