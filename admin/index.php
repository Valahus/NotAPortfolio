<?php session_start(); ?>
<html>
<head>
    <title>Homepage</title>
    <link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="header">
    Welcome to my portfolio!</div>
<?php
if(isset($_SESSION['valid'])) {
    include("connection.php");
    $result = mysqli_query($mysqli, "SELECT * FROM user");
    ?>

    Welcome <?php echo $_SESSION['first_name'] ?> ! <a href='logout.php'>Logout</a><br/>
    <br/>
    <a href='about/profile.php'>About me</a>
    <a href='projects/projects.php'>My projects</a>
    <br/>
    <?php
} else {
    echo "You must be logged in to view this page.<br/><br/>";
    echo "<a href='login.php'>Login</a>" ;
}
?>
<div id="footer">
    Created by Mihai BOSIICA
</div>
</body>
</html>
