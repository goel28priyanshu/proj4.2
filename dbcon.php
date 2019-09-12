<?php

$conn=mysqli_connect('localhost','root','') or die("Unable to connect mysql server.");
 $sql="Create database quizdb";
 $rec=mysqli_query($conn,$sql);

 
mysqli_close($conn);
 ?>