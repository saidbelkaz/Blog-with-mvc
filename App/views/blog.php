<?php 
session_start();
	$data = new ArticleController();
    $resultat=$data->getAllArticle();

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
<div class="content">
    <div class="bg-imags">
        <img src="<?php echo BASE_URL;?>App/views/images/blog_images.jpg" alt="bg" id="bg-imgs">
    </div>

    <div class="Articles" id="store">
        <div class="nav"><h1>Articles</h1></div>
        <div class="cards">
            <?php
                foreach ($resultat as $row) {?>
                    <form action="details" method="post">
                        <div class="card">
                            <img src="<?php echo BASE_URL;?>App/views/images/<?php echo $row['images'] ?>" alt="Articleimgs">
                            <div class="info">
                                <input type="hidden" name='id' value='<?php echo $row['id_article'] ?>'>
                                <h1><?php echo $row['titles']?></h1>
                            </div>
                            <input type="submit" name='sub' value='Read more ...'>
                        </div>
                    </form>
                <?php } ?>
        </div>
    </div>


</div>

