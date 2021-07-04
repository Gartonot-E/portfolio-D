<?
session_start();
$loginAdmin = 'admin6';
$passwordAdmin = 'admin6';

if($loginAdmin == $_POST['login'] && $passwordAdmin == $_POST['password'])
    $_SESSION['admin6'] = $_POST['login'];
    

if(isset($_SESSION['admin6'])) {
    header('Location: static.php');
} else {
?>
<style>
    body { display: flex; align-items: center; justify-content: center; height: 90vh; background: #040e20; font-family: Arial; color: #fff; }
    form { display: flex; flex-direction: column; }
    form label { margin-bottom: 20px; } 
    form input { width: 100%; padding: 10px 5px; margin-top: 5px; border-radius: 4px; }
    form input[type="submit"] { background: rgb(28, 189, 127); border: none; color: #fff; font-weight: bold; }
</style>
<body>
    <form method="POST">
        <h2>Enter to admin panel</h2>
        <label for="login">
            <span>Login</span>
            <input type="text" name="login" id="login">
        </label>
        <label for="password">
            <span>Password</span>
            <input type="password" name="password" id="password">
        </label>
        <input type="submit" value="Enter">
    </form>  
</body>
<? } ?>