<?php 
session_start();
	$data = new ArticleController();
    $resultat=$data->getDetails();
    
	if(isset($_POST['submit'])){
        $addComment = new ArticleController();
		$addComment->addComment();
        header('location: blog');
	}
    $Comment = new ArticleController();
    $resComment=$Comment->getAllComment();
?>

<nav>
    <div class="nav-bar">
        <a href="#"><img src="<?php echo BASE_URL;?>App/views/images/Blog.jpg" alt="logo"></a>
        <ul>
            <li><a href="<?php echo BASE_URL ?>blog" class="active">Blog</a></li>
        </ul>
        <!-- <a href="#" class="butt">Sign in</a> -->
    </div>
</nav>
<div class="Details">
    
    <div class="title">
        <h1><?= $resultat->titles ?></h1>
    </div>
    <img src="<?php echo BASE_URL;?>App/views/images/<?= $resultat->images ?>" alt="">
    <div class="info">
            <p><?= $resultat->details ?></p>
        </div>  
        <div class="comment">
            <div class="title-comment">
                <h1>Comment</h1>
                <div class="hrr"></div>
            </div>
        <form method="post">
            <table>
                <tr>
                    <td> <u>Add Comment</u>  </td>
                </tr>
                <tr>
                    <input type="hidden" name='idd' value="<?= $resultat->id_article ?>">
                    <td><input type="text" name="name" placeholder='Enter your full name (mandatory) *'></td>
                </tr>
                <tr>
                    <td><textarea name="content" placeholder="Enter your comment ..."></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Send Comment" class="sub" disabled></td>
                </tr>
            </table>
        </form>

        <div class="hrr"></div>
<?php foreach ($resComment as $key) {?>
        <div class="comments-users">
            <div class="info-users">
                <img src="<?php echo BASE_URL;?>App/views/images/User.png" alt="user">
                <div class="inf">
                    <h2><?php echo $key["full_name"];?></h2>
                    <p><?php echo $key["date_comment"];?></p>
                </div>
            </div>
            <div class="comment-content">
                <p><?php echo $key["content"];?></p>
            </div>
                <div class="hr1"></div>
        </div>
    <?php }?>

    </div>
</div>