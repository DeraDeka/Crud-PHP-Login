<?php
    //Establish Connection to SQL Database (START)
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="crud_useraccount"; // <--- Name of Database to connect with
    $link=mysqli_connect($servername,$username,$password,$dbname);
    $con=mysqli_select_db($link,$dbname);
    //Establish Connection to SQL Database (END)
    session_start();
    //If logged on, automatically send to crudform.php
    if(isset($_SESSION['username'])){ header('Location: crudform.php'); } 
?>

<!-- HTML Form (Start)-->
<html>
<body>
    <h1>create new account</h1>
    <form name="form1" action="" method="post">
        <table>
            <tr>
                <td>Enter Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Enter Password</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="button" value="Create new account">
                </td>
            <tr>
        </table>
    </form>
</body>
</html>
<!-- HTML Form (End)-->

<?php
    // Insert
    if(isset($_POST["button"]))
    {
        mysqli_query($link,"insert into account values ('$_POST[username]','$_POST[password]')");
        header('Location: index.php');
    }
?>