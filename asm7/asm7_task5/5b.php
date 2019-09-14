<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $db = "asm7_debt";

    $conn = new mysqli($servername, $username, $password, $db);

    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }

    $sql = "SELECT * FROM DEBT";
    $sql_due = "SELECT *, DATEDIFF(CAST(CURRENT_TIMESTAMP() AS DATE), due) as late
                FROM DEBT WHERE due < CAST(CURRENT_TIMESTAMP() AS DATE);";
    
    $result = $conn->query($sql);
    $overdue = $conn->query($sql_due);
?>
    <h2>Full records</h2>
    <table border=1>
        <tr align=left>
            <th>Title</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Debt amount</th>
            <th>Due</th>
        </tr>
        
        <?php
            if($result->num_rows >0){
                while ($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>". $row['title']."</td>";
                    echo "<td>". $row['fname']."</td>";
                    echo "<td>". $row['lname']."</td>";
                    echo "<td>". $row['email']."</td>";
                    echo "<td> $". $row['debt']."</td>";
                    echo "<td>". $row['due']."</td>";
                    echo "</tr>"; 
                }
            }

        ?>
    </table>

    <h2>Overdue list</h2>
    <table border=1>
        <tr align=left>
            <th>Title</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Debt amount</th>
            <th>Due</th>
            <th>Late</th>
        </tr>
        
        <?php
            if($overdue->num_rows >0){
                $recipients = "";
                while ($row = $overdue->fetch_assoc()){
                    $title = $row['title'];
                    $debt = $row['debt'];
                    $due = $row['due'];
                    $late = $row['late'];
                    $firstname = $row['fname'];
                    $lastname = $row['lname'];
                    $email = $row['email'];

                    echo "<tr>";
                    echo "<td>". $row['title']."</td>";
                    echo "<td>". $row['fname']."</td>";
                    echo "<td>". $row['lname']."</td>";
                    echo "<td>". $row['email']."</td>";
                    echo "<td>$". $row['debt']."</td>";
                    echo "<td>". $row['due']."</td>";
                    echo "<td>". $row['late']." days </td>";
                    echo "</tr>"; 

                    sendmail($firstname, $lastname, $late, $debt, $email, $title); 
                }
            }

        ?>
    </table>        

    <?php
        function sendmail($firstname, $lastname, $late, $debt, $email, $title){
            $message = "Dear <b>$firstname $lastname</b>,<br><br>
                        Your payment is delayed <b>$late days</b>.<br>
                        Debt amount is: <b>$$debt</b> <br>
                        Please pay the bill as soon as possible.<br><br>
                        Best regards.<hr>";

            mail($email, $title, $message);
        }
    ?>
