<?php
session_start();

$user = 'root';
$password = '123456';
$database = 'InternetCafe';
$servername = 'localhost:3310';

$mysqli = new mysqli($servername, $user, $password, $database);
if ($mysqli->connect_error) {
	die('Connect Error(' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

$sql = "SELECT * FROM InternetCafe.Customer WHERE CUS_USER = '$username'";
$result = $mysqli->query($sql);
//$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <style>
        table {
            border-collapse: collapse;
            width: 500px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>

</head>

<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <table>
        <tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Membership Status</th>
            <th>Assigned Computer</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['CUS_ID']; ?></td>
                <td><?php echo $row['CUS_FNAME']. " " . $row['CUS_LNAME']; ?></td>
                <td><?php echo $row['CUS_MEMBERSHIP_STAT']; ?></td>
                <td><?php echo $row['PC_ID']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>