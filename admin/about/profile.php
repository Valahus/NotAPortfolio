<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("../connection.php");
//fetching data in descending order (lastest entry first)
//$result = mysqli_query($mysqli, "SELECT * FROM projects WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
$result = mysqli_query($mysqli, "SELECT * FROM user");
?>

<html>
<head>
    <title>Homepage</title>
</head>

<body>
<a href="../index.php">Home</a> | <a href="add_projects.html">Add New Project</a> |<a href="profile.php">View Profile</a>| <a href="../logout.php">Logout</a>
<br/><br/>

<table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Address</td>
        <td>City</td>
        <td>Country</td>
        <td>Birth Date</td>
        <td>Description</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$res['first_name']."</td>";
        echo "<td>".$res['last_name']."</td>";
        echo "<td>".$res['email']."</td>";
        echo "<td>".$res['phone']."</td>";
        echo "<td>".$res['address']."</td>";
        echo "<td>".$res['city']."</td>";
        echo "<td>".$res['country']."</td>";
        echo "<td>".$res['birth_date']."</td>";
        echo "<td>".$res['description']."</td>";
        echo "<td><a href=\"edit_profile.php?id=$res[id]\">Edit</a></td>";
    }
    ?>
</table>
</body>
</html>
