<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("../connection.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    $title = $_POST['title'];
    $picture = $_POST['picture'];
    $description = $_POST['description'];

    // checking empty fields
    if(empty($title) || empty($picture) || empty($description)) {

        if(empty($title)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }

        if(empty($picture)) {
            echo "<font color='red'>Picture field is empty.</font><br/>";
        }

        if(empty($description)) {
            echo "<font color='red'>Description field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE project SET title='$title', picture='$picture', description='$description' WHERE id=$id");

        //redirectig to the display page. In our case, it is view.php
        header("Location: projects.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM project WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $title = $res['title'];
    $picture = $res['picture'];
    $description = $res['description'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
<a href="../index.php">Home</a> | <a href="projects.php">View Projects</a> | <a href="../logout.php">Logout</a>
<br/><br/>
<form name="form1" method="post" action="edit_projects.php">
    <table border="0">
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?php echo isset($title) ? $title : '' ?>"></td>
        </tr>
        <tr>
            <td>Picture</td>
            <td><input type="text" name="picture" value="<?php echo isset($picture) ? $picture : '' ?>"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="description" value="<?php echo isset($description) ? $description : '' ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>
