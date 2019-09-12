<?php
$conn=mysqli_connect('localhost','root','','quizdb');

$t="CREATE table s_register(
    s_id int(10) not null auto_increment primary key,
    user VARCHAR(30) Primary key,
    email VARCHAR(30),
    mob INT(10),
    password VARCHAR(50) 
    )";

  mysqli_query($conn,$t);

 $u="CREATE TABLE answers(
    aid int(11) NOT NULL PRIMARY KEY,
    qid int(11) NOT NULL,
    student_id int(11) NOT NULL,
    answer int(10) NOT NULL
    )";

  mysqli_query($conn,$u);

  $v="CREATE TABLE questions (
    qid int(11) NOT NULL auto_increment primary key,
    que varchar(5000) NOT NULL primary key,
    choice1 varchar(500) NOT NULL,
    choice2 varchar(500) NOT NULL,
    choice3 varchar(500) NOT NULL,
    choice4 varchar(500) NOT NULL,
    correct_ans varchar(12) NOT NULL
  )";

   mysqli_query($conn,$v);

   mysqli_close($conn);
   ?>
