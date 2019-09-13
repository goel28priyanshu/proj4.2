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
                <th>Que_id</th>
                <th>Question</th>
            </tr>

            <?php
            
            $conn=mysqli_connect('localhost','root','','quizdb') or die("unable to connect database");
            $sql="SELECT * from questions";
            $rec=mysqli_query($conn,$sql);
            echo "All the questions present";

            while($r=mysqli_fetch_array($rec)){

            ?>
            <tr>
                <td><?php echo $r['qid']; ?></td>
                <td><?php echo $r['que']; ?></td>
            </tr>

            <?php
            }
            echo "Note:Learn the Que_id of question,if you want to delete";
            mysqli_close($conn);
            ?>

        </table>
    </body>
</html>
