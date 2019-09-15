<!DOCTYPE html>
<html>
    <head>
        <title>UPDATE RECORD</title>
        <style>
        .q{
                box-shadow: 0 0 3px 0 rgba(0,0,0,0.3);
                background: yellowgreen;
                width: 400px;
                margin: 20px auto;
                padding: 15px;
            }
        form{
                margin:20px auto;
                width: 200px;
            }
        input{
                padding:8px;
                font-size: inherit;
            }
        input[type="text"]{
                display: block;
                margin:2px;
                width:100%;
                border: 1px solid black;
            }
        button{
                display: block;
                padding: 10px 10px;
                margin: 15px;
                width: 70%;
                font-size: 15px;
                display: inline-block;
                margin-left: 40px;
                text-align: center;
                cursor: pointer;
                background: rgba(9, 156, 214, 0.705);
                color: rgb(209, 12, 12);
            }
        input[type="password"]{
                display: block;
                margin:2px;
                width:100%;
                border: 1px solid black;
            }
        
        </style>
    </head>
    <body>
        <div class='q'>
            <form action="stu_update.php" method="POST">
                <input type="text" name="user" placeholder="USER NAME" required>
                <input type="text" name="email" placeholder="EMAIL" required>
                <input type="text" name="mob" placeholder="MOBILE NO" required>
                <button type="submit" value="update" name="submit">UPDATE</button>
            </form>
        </div>
    </body>

<?php
    $conn=mysqli_connect('localhost','root','','quizdb') or die("unable to connect database");
    session_start();

    if(isset($_POST['submit'])){

        $user=$_POST['user'];
        $email=$_POST['email'];
        $mob=$_POST['mob'];
        $si=$_SESSION['id'];
        $sql="SELECT * FROM s_register where user= '$user' and s_id<>'$si'";
        $rec=mysqli_query($conn,$sql);
        $n=mysqli_num_rows($rec);
        if(!$n){
            $query="UPDATE s_register SET user='$user',email='$email',mob='$mob' WHERE s_id='$si' ";
            $res=mysqli_query($conn,$query);
            if($res){
                echo "<script>alert('Student Details Updated Successfully!')</script>";
                header("Refresh:1; url=update.php");
            }
        }
        else{
            echo "<script>alert('USERNAME EXISTS..CHANGE IT')</script>";
            $_SESSION['id']=$si;
            header("Refresh:1; url=stu_update.php");
        }
    }
    mysqli_close($conn);
?>