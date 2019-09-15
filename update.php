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
            <form action="update.php" method="POST">
                <input type="text" name="s_id" placeholder="ENTER STUDENT ID" required>
                <input type="password" name="pass" placeholder="ADMIN PASSWORD" required>
                <button type="submit" value="update" name="submit">SUBMIT</button>
            </form>
        </div>

    </body>
    </html>

<?php
     $conn=mysqli_connect('localhost','root','','quizdb') or die("unable to connect database");
    session_start();

    if(isset($_POST['submit'])){
        $id=$_POST['s_id'];
        $c_pass=md5($_POST['pass']);
        $sql="Select * from admin where password='$c_pass' ";
        $rec=mysqli_query($conn,$sql);
        $n=mysqli_num_rows($rec);
    
        if($n==1){
            $p="SELECT * FROM s_register where s_id='$id' ";
            $rec=mysqli_query($conn,$p);        
            $s=mysqli_num_rows($rec);
            if(!$s){
                echo "<script>STUDENT ID IS INVALID...DO IT AGAIN</script>";
                header("refresh:1; url=update.php");
            }
            else{
                $_SESSION['id']=$id;
                echo "<script>CORRECT INFO...PROCEEDING FURTHER</script>";
                header("refresh:1; url=stu_update.php");
            }
        }
        else{
            echo "<script>PASSWORD IS NOT CORRECT</script>";
            header("refresh:1; url=update.php");
       
        }
    }
    mysqli_close($conn);
?>