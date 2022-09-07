<?php
if (isset($_POST['sub'])) {
    $add=new ArticleController();
    $r=$add->addUser();
}
?>

<nav>
    <div class="nav-bar">
        <a href="#"><img src="<?php echo BASE_URL;?>App/views/images/Blog.jpg" alt="logo"></a>
        <a href="<?php echo BASE_URL ?>login" class="butt">Sign In</a>
    </div>
</nav>
<div class="login">
    <div class="signin">
        <form method="POST" enctype='multipart/form-data'>
            <table>
                <tr>
                    <td><label>Ferst Name :</label></td>
                    <td><input type="text" name="Fname" placeholder='Ferst Name'></td>
                </tr>
                <tr>
                    <td><label>Last Name :</label></td>
                    <td><input type="text" name="Lname" placeholder='Last Name'></td>
                </tr>
                <tr>
                    <td><label>Email :</label></td>
                    <td><input type="email" name="signup-email" placeholder='xxxx@xx.xx'></td>
                </tr>
                <tr>
                    <td><label>Password :</label></td>
                    <td><input type="text" name="signup-password" placeholder="*************"></td>
                </tr>
                <tr>
                    <td><label>image :</label></td>
                    <td><input type="file" name="image" class="imgs"></td>
                </tr>
                <tr>
                    <td colspan=2><input type="submit" name="sub" value="login" class="log"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
