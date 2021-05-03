

<?php
//including the database connection file
include_once("../admin/connection.php");
//fetching data in descending order (lastest entry first)
//$result = mysqli_query($mysqli, "SELECT * FROM projects WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
$result = mysqli_query($mysqli, "SELECT * FROM project");
?>

<html>
<head>
    <title>Homepage</title>
</head>

<body>
<a href="../index.php">Home</a> |
<br/><br/>

<table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>Title</td>
        <td>Picture</td>
        <td>Description</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$res['title']."</td>";
        echo "<td>".$res['picture']."</td>";
        echo "<td>".$res['description']."</td>";
    }
    ?>
</table>
</body>
</html>
