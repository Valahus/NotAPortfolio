<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<html>
<head>
    <title>Add a new project</title>
</head>

<body>
<?php
//including the database connection file
include_once("../connection.php");

if(isset($_POST['Submit'])) {
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

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO project(title, picture, description, created_at) VALUES('$title','$picture','$description','2020-05-01')");

        //display success message
        echo "<font color='green'>Project added successfully.";
        echo "<br/><a href='projects.php'>View Result</a>";
    }
}
?>
</body>
</html>
