<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("../connection.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $birth_date = $_POST['birth_date'];
    $description = $_POST['description'];


    // checking empty fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($country) || empty($birth_date) || empty($description)) {

        if (empty($first_name)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }
        if (empty($last_name)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }
        if (empty($email)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }
        if (empty($phone)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }
        if (empty($address)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }
        if (empty($city)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }

        if (empty($country)) {
            echo "<font color='red'>Picture field is empty.</font><br/>";
        }

        if (empty($birth_date)) {
            echo "<font color='red'>Description field is empty.</font><br/>";
        }
        if (empty($description)) {
            echo "<font color='red'>Description field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE user SET first_name='$first_name', last_name='$last_name', email='$email', phone='$phone', address='$address', city='$address', country='$country',birth_date='$birth_date',description='$description' WHERE id=$id");

        //redirectig to the display page. In our case, it is view.php
        header("Location: profile.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM user where id='$id'");

while ($res = mysqli_fetch_array($result)) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $birth_date = $_POST['birth_date'];
    $description = $_POST['description'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
<a href="../index.php">Home</a> | <a href="../projects/projects.php">View Projects</a> |<a href="profile.php">View
    Profile</a> | <a href="../logout.php">Logout</a>
<br/><br/>
<form name="form1" method="post" action="edit_profile.php">
    <h1>HELLO <?php echo isset($first_name) ? $first_name : '' ?></h1>
    <table border="0">
        <tr>
            <td>First Name</td>
            <td><input type="text" name="first_name" value="<?php echo isset($first_name) ? $first_name : '' ?>"></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="last_name" value="<?php echo isset($last_name) ? $last_name : '' ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo isset($email) ? $email : '' ?>"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" value="<?php echo isset($phone) ? $phone : '' ?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo isset($address) ? $address : '' ?>"></td>
        </tr>
        <tr>
            <td>City</td>
            <td><input type="text" name="city" value="<?php echo isset($city) ? $city : '' ?>"></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><input type="text" name="country" value="<?php echo isset($country) ? $country : '' ?>"></td>
        </tr>
        <tr>
            <td>Birth Date</td>
            <td><input type="text" name="birth_date" value="<?php echo isset($birth_date) ? $birth_date : '' ?>"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="description" value="<?php echo isset($description) ? $description : '' ?>"></td>
        </tr>

        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>
