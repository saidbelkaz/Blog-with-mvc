<?php
if (isset($_POST['submit'])) {
    $add=new ArticleController();
    $add->login();
}
?>
<nav>
    <div class="nav-bar">
        <a href="#"><img src="<?php echo BASE_URL;?>App/views/images/Blog.jpg" alt="logo"></a>
        <a href="<?php echo BASE_URL ?>signup" class="butt">Sign Up</a>
    </div>
</nav>
<div class="login">
    <div class="signin">
        <form method="post">
            <table>
                <tr>
                    <td><label>Email :</label></td>
                    <td><input type="email" name="login-email" placeholder='xxxx@xx.xx'></td>
                </tr>
                <tr>
                    <td><label>Password :</label></td>
                    <td><input type="text" name="login-password" placeholder="*************"></td>
                </tr>
                <tr>
                    <td colspan=2><input type="submit" name="submit" value="login" class="log"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
