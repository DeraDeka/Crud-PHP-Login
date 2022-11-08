
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


<!-- HTML (START)-->
<html>
<head></title>"Crud Login form with session variables used" //made for the sake of submission, sorry sa shit nga design sir<head></title>
<body>
    <!-- Form (START)-->
    <form method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><a href="http://localhost/crud/loginsession/signup.php">Sign Up</a></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="bullshit" value="Login">	      			   
                </td>
            <tr>
        </table>
    </form>
    <!-- Form (END)-->
</body>
</html>
<!-- HTML (END)-->

<?php
    if(isset($_POST["bullshit"]))
    {
        $inputUser = htmlentities($_POST['username']);
        $inputPassword = htmlentities($_POST['password']);

        $res=mysqli_query($link,"select * from account where username='$_POST[username]' AND password='$_POST[password]'");
        while($row=mysqli_fetch_array($res))
        {
            if($inputUser == $row["username"] && $inputPassword == $row["password"])
            { 
                $_SESSION['username'] = htmlentities($_POST['username']);
                $_SESSION['password'] = htmlentities($_POST['password']);
                header('Location: crudform.php'); 
            }
        }
        echo "Username or password is incorrect";
    }
?>
