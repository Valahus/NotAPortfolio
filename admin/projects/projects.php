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
$result = mysqli_query($mysqli, "SELECT * FROM project");
?>

<html>
<head>
    <title>Homepage</title>
</head>

<body>
<a href="../index.php">Home</a> | <a href="add_projects.html">Add New Project</a> | <a href="../logout.php">Logout</a>
<br/><br/>

<table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>Title</td>
        <td>Picture</td>
        <td>Description</td>
        <td>Update</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$res['title']."</td>";
        echo "<td>".$res['picture']."</td>";
        echo "<td>".$res['description']."</td>";
        echo "<td><a href=\"edit_projects.php?id=$res[id]\">Edit</a> | <a href=\"delete_projects.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
</table>
</body>
</html>
