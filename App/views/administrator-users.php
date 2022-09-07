<?php 
	$data = new ArticleController();
    $resultat=$data->getInfoUser();
    
    if (isset($_POST['upd'])) {
        $add=new ArticleController();
        $add->UpdateUsers();
    }
    
    if (isset($_POST['logout'])) {
        $data = new ArticleController();
        $data->logout();
    }
    if (isset($_POST['delete'])) {
        $data = new ArticleController();
        $data->delete_article();
    }

    if (isset($_POST['addArticle'])) {
        $add=new ArticleController();
        $r=$add->addArticle();
    }
    if (isset($_FILES['image'])) {
        $edit=new ArticleController();
        $edit->EditePic();
    }
    $data = new ArticleController();
    $res=$data->getMyArticles();
?>
<nav>
    <div class="nav-bar">
        <a href="#"><img src="<?php echo BASE_URL;?>App/views/images/Blog.jpg" alt="logo"></a>
        <ul>
            <li><a href="<?php echo BASE_URL ?>blog">Blog</a></li>
            <li><a href="<?php echo BASE_URL ?>administrator-users" class="active">administrator</a></li>
        </ul>
        <a href="<?php echo BASE_URL ?>administrator-users" class="info-nav"><?php echo $resultat['fname']." ".$resultat['lname']." ";?><i class="fa fa-user" aria-hidden="true"></i></a>
    </div>
</nav>

<div class="dashbord-user">
    <div class="nav-left">
        <ul>
            <li class="nav-ac">Profile</li>
            <?php if($resultat['actions']=="blogger"){?>
            <li>Article Management</li>
            <?php }?>
        </ul>
        <form method="post">
            <input type="submit" value="logOut" name="logout">
        </form>
    </div>
    
    <div class="content-right-profile">
        <div class="imgs-name">
            <img src="<?php echo BASE_URL;?>App/controllers/images/<?php echo $resultat['profile']?>" alt="profile">
            <p><?php echo $resultat['fname']." ".$resultat['lname']?></p>
            <form method="post" enctype='multipart/form-data'>
                <input type="file" name="image" class="file" id="file" hidden>
                <button type="submit" id="EditePic" name="editepic">Edit picture</button>
            </form>

        </div>
        <div class="hr1"></div>
        <form method="POST" enctype='multipart/form-data'>
            <table>
                <tr>
                    <td><label for="full_name">Frist name :</label></td>
                    <td><input type="text" name="Fname" placeholder="Frist name" value="<?php echo $resultat['fname'] ?>" required></td>
                </tr>
                <tr>
                    <td><label for="full_name">Last name :</label></td>
                    <td><input type="text" name="Lname" placeholder="Last name" value="<?php echo $resultat['lname'] ?>" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td><input type="email" name="email" placeholder="xxxxx@xx.xx" value="<?php echo $resultat['email_users'] ?>" required></td>
                </tr>
                <tr>
                    <td colspan=2><input type="submit" value="Update" name="upd" class="up" disabled></td>
                </tr>
            </table>
        </form>
    </div>

    
    <div class="content-right-article">
        <?php if($resultat['actions']=="blogger"){?>
        <div class="my-articles">
            <div class="title-ajou">
                <h1>My Articles</h1>
                <a><i class="fa fa-plus-square" aria-hidden="true"></i></a>
            </div>
            <div class="show-article">
                <table>
                    <thead>
                        <tr>
                            <!-- <td>Id Article</td> -->
                            <td>Title</td>
                            <td>Situation</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($res as $key ){ ?>
                        <form method="post">
                            <tr>
                                <!-- <td><php echo $key['id_article'] ?></td> -->
                                <td><?php echo $key['titles'] ?></td>
                                <?php if ($key['Situation']=="Wait for acceptance") {?>
                                    <td class="wait"><?php echo $key['Situation'] ?></td>
                                <?php }else if ($key['Situation']=="accepted"){?>
                                        <td class="accepted"><?php echo $key['Situation'] ?></td>
                                <?php }else if($key['Situation']=="did not accept"){?>
                                    <td class="not"><?php echo $key['Situation'] ?></td>
                                <?php }?>
                                <input type="hidden" name="id_article" value="<?php echo $key['id_article']?>">
                                <td><button type="submit" class="btn-trash" name="delete"><i class="fa fa-trash"></i> Delete</button></td>
                            </tr>
                        </form>                                                                                                                                                                                                          
                        <?php } ?>

                        
                    </tbody>
                </table>
            </div>

            <div class="addArticle">
                <!-- <h1>
                    <php if(isset($_POST['submit'])){print_r($r);}?>  => test error
                </h1> -->
                    <form method="POST" enctype='multipart/form-data'>
                        <table>
                            <tr>
                                <td><i class="fa fa-chevron-left" aria-hidden="true"> back</i></td>
                            </tr>
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
                                <td colspan=2><input type="submit" value="Ajouter" name="addArticle" class="sub" disabled></td>
                            </tr>
                        </table>
                    </form>
            </div>
        </div>
        <?php }?>
    </div>       
</div>
