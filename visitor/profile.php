

<?php
//including the database connection file
include_once("../admin/connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM user");
?>

<html>
<head>
    <title>Homepage</title>
</head>

<body>
<a href="../index.php">Home</a> |
<br/><br/>

<!--<table width='80%' border=0>-->
<!--    <tr bgcolor='#CCCCCC'>-->
<!--        <td>First Name</td>-->
<!--        <td>Last Name</td>-->
<!--        <td>Email</td>-->
<!--        <td>Phone</td>-->
<!--        <td>Address</td>-->
<!--        <td>City</td>-->
<!--        <td>Country</td>-->
<!--        <td>Birth Date</td>-->
<!--        <td>Description</td>-->
<!--    </tr>-->
<!--    --><?php
//    while($res = mysqli_fetch_array($result)) {
//        echo "<tr>";
//        echo "<td>".$res['first_name']."</td>";
//        echo "<td>".$res['last_name']."</td>";
//        echo "<td>".$res['email']."</td>";
//        echo "<td>".$res['phone']."</td>";
//        echo "<td>".$res['address']."</td>";
//        echo "<td>".$res['city']."</td>";
//        echo "<td>".$res['country']."</td>";
//        echo "<td>".$res['birth_date']."</td>";
//        echo "<td>".$res['description']."</td>";
//    }
//    ?>
<!--</table>-->
<div style="text-align: left!important;">
<?php
while($res = mysqli_fetch_array($result)) {
echo "<div>First name:". $res['first_name']."</div>";
echo "<div>Last name:". $res['last_name']."</div>";
echo "<div>Email:". $res['email']."</div>";
echo "<div>Phone:". $res['phone']."</div>";
echo "<div>Address:". $res['address']."</div>";
echo "<div>City:". $res['city']."</div>";
echo "<div>Country:". $res['country']."</div>";
echo "<div>Birth Date:". $res['birth_date']."</div>";
echo "<div>Description:". $res['description']."</div>";
}
?>
</div>
</body>
</html>
