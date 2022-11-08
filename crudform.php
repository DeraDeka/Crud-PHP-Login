<?php
session_start();
$user = $_SESSION['username'];
// Send user back to the shadow realm (index.php) if not logged on
if(isset($user)==0){ header('Location: index.php'); }
?>

<!-- HTML (START)-->
<html>
<body>
    <h1>Welcome! <?php echo $_SESSION['username']; ?></h1>
    <!-- Form (START)-->
    <form method="post">
                    <input type="submit" name="logout" value="Logout">	      			   
                </td>
    </form>
     <!-- Form (END)-->
</body>
</html>
<!-- HTML (END)-->

<?php
    if(isset($_POST["logout"]))
    {
        session_destroy();
        header('Location: crudform.php'); 
    }
?>