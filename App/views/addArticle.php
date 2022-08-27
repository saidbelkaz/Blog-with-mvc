<?php
if (isset($_POST['submit'])) {
    $add=new ArticleController();
    $r=$add->addArticle();
}
?>


<div class="addArticle">
    <!-- <h1>
        <php if(isset($_POST['submit'])){print_r($r);}?>  => test error
    </h1> -->
        <form method="POST" enctype='multipart/form-data'>
            <table>
                <tr>
                    <td><label for="name">Title :</label></td>
                    <td><input type="text" name="title"placeholder="title..."></td>
                </tr>
                <tr>
                    <td><label for="Content">Content :</label></td>
                    <td><textarea name="Content" placeholder=' Content ...'></textarea></td>
                </tr>
                <tr>
                    <td><label for="imgs">imgs :</label></td>
                    <td><input type="file" name="imgs"></td>
                </tr>
                <tr>
                    <td colspan=2><input type="submit" value="Ajouter" name="submit" class="sub" disabled></td>
                </tr>
            </table>
        </form>
</div>