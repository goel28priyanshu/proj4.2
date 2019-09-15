<!DOCTYPE html>
<html>
    <head>
        <title>All Questions Available</title>
        <style>
        table,th,td{
            border: 1px solid black;
            border-collapse:collapse;
            text-align: left;
        }
        </style>
    </head>
    <body>
        <table width='50%'>
            <tr>
                <th>POSITION</th>
                <th>ID</th>
                <th>STUDENT NAME</th>
                <th>CONTACT</th>
                <th>E-MAIL</th>
                <th>MARKS OBTAINED</th>
            </tr>

            <?php
            
            $pos=0;
            $conn=mysqli_connect('localhost','root','','quizdb') or die("unable to connect database");
            $sql="SELECT * from result order by n desc";                             //result-a table holds student id(id) and total no of correct ques(n) 
            $rec=mysqli_query($conn,$sql);

            while($r=mysqli_fetch_array($rec)){
                $pos+=1;
                $id=$r['id'];
                $sd="SELECT * FROM s_register where s_id='$id' ";
                $res=mysqli_query($conn,$sd);
                $s=mysqli_fetch_array($res);
            ?>
            <tr>
                <td><?php echo $pos; ?></td>
                <td><?php echo $r['id']; ?></td>
                <td><?php echo $s['user']; ?></td>
                <td><?php echo $s['mob']; ?></td>
                <td><?php echo $s['email']; ?></td>
                <td><?php echo $r['n']; ?></td> 
            </tr>

            <?php
            }

            mysqli_close($conn);
            ?>

        </table>
    </body>
</html>
