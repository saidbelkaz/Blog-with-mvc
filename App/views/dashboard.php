<?php
    $data = new ArticleController();
    $res=$data->getLastArticle();

    $data = new ArticleController();
    $r=$data->getArticleRefu();

    $data = new ArticleController();
    $repo=$data->getAllorders();

    $data = new ArticleController();
    $allusers=$data->getAllusers();

    if (isset($_POST['delete'])) {
        $data = new ArticleController();
        $data->delete_article();
    }
    if (isset($_POST['accepte'])) {
        $data = new ArticleController();
        $data->AccepteArticle();
    }
    if (isset($_POST['refuse'])) {
        $data = new ArticleController();
        $data->RefuseArticle();
    }
    if (isset($_POST['ajouter'])) {
        $data = new ArticleController();
        $data->addUserDash();
    }
    if (isset($_POST['del-user'])) {
        $data = new ArticleController();
        $data->delete_user();
    }


?>
<div class="dashbord">
    <div class="nav-left">
        <ul>
            <li class="nav-act">Article Management</li>
            <li >Users Management</li>
        </ul>
    </div>
    <div class="article-manag">
        <h1>Recent Articles</h1>
        <div class="show-article">
                <table>
                    <thead>
                        <tr>
                            <!-- <td>Id Article</td> -->
                            <td>Title</td>
                            <td>Situation</td>
                            <td colspan=2>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                <?php foreach ($res as $key) {?>     
                    
                    <form method="post">
                        <tr>
                            <td><?php echo $key['titles']?></td>
                            <td class="accepted"><?php echo $key['Situation']?></td>
                            <input type="hidden" name="id_article" value="<?php echo $key['id_article']?>">
                            <td><button type="submit" class="btn-times" name="refuse"><i class="fa fa-times-circle"></i> refuse</button></td>
                            <td><button type="submit" class="btn-trash" name="delete"><i class="fa fa-trash"></i> Delete</button></td>
                        </tr>
                    </form>                                                                                                                                                                                                          
                <?php }?>
                        
                        
                    </tbody>
                </table>
            </div>

        <h1>Articles awaiting acceptance</h1>
        <div class="show-article">
            <table>
                <thead>
                    <tr>
                        <!-- <td>Id Article</td> -->
                        <td>Name User</td>
                            <td>Title</td>
                            <td colspan=2 class="action">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                <?php foreach ($repo as $key) {?>   
                    <form method="post">
                        <tr>
                            <td><?php echo $key['fname'].' '.$key['lname']?></td>
                                <td><?php echo $key['titles']?></td>
                                <input type="hidden" name="id_article" value="<?php echo $key['id_article']?>">
                                <td><button type="submit" class="btn-accept" name="accepte"><i class="fa fa-check-circle"></i> admissions</button></td>
                                <td><button type="submit" class="btn-times" name="refuse"><i class="fa fa-times-circle"></i> refuse</button></td>
                            </tr>
                        </form>                                                                                                                                                                                                          
                        <?php }?>   
                        
                    </tbody>
                </table>
            </div>
            <div class="show-article">
                    <table>
                        <h1>Rejected Articles</h1>
                        <thead>
                            <tr>
                                <!-- <td>Id Article</td> -->
                                <td>Title</td>
                                <td>Situation</td>
                                <td colspan=2>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach ($r as $key) {?>     

                        <form method="post">
                            <tr>
                                <td><?php echo $key['titles']?></td>
                                <td class="not"><?php echo $key['Situation']?></td>
                                <input type="hidden" name="id_article" value="<?php echo $key['id_article']?>">
                                <td><button type="submit" class="btn-accept" name="accepte"><i class="fa fa-check-circle"></i> admissions</button></td>
                                <td><button type="submit" class="btn-trash" name="delete"><i class="fa fa-trash"></i> Delete</button></td>
                            </tr>
                        </form>                                                                                                                                                                                                          
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="users-manag">
            
            <h1 id='h1'><i class="fa fa-plus-square"></i> Ajouter Users </h1>
            <div class="ajouter-users">
                
                <form method="POST" enctype='multipart/form-data'>
                    <table>
                        <tr>
                            <td><label for="full_name">Frist name :</label></td>
                            <td><input type="text" name="Fname" placeholder="Frist name"  required></td>
                        </tr>
                    <tr>
                        <td><label for="full_name">Last name :</label></td>
                        <td><input type="text" name="Lname" placeholder="Last name"  required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email :</label></td>
                        <td><input type="email" name="signup-email" placeholder="xxxxx@xx.xx"  required></td>
                    </tr>
                    <tr>
                        <td><label for="Password">Password :</label></td>
                        <td><input type="text" name="signup-password" placeholder="***********"  required></td>
                    </tr>
                    <tr>
                        <td><label for="profile">Change profile :</label></td>
                        <td><input type="file" name="image" class="file"></td>
                    </tr>
                    <tr>
                        <td><label for="rights">Rights :</label></td>
                        <td><select name="rights" >
                            <option disabled selected>Choose rights... </option>
                            <option value="blogger">blogger</option>
                            <option value="Visitor">Visitor</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td colspan=2><input type="submit" value="Ajouter" name="ajouter" class="up" disabled></td>
                    </tr>
                </table>
            </form>
            </div>

            <div class="AllUsre">
                <div class="show-users">
                    <h1>All Users</h1>
                    <table>
                        <thead>
                            <tr>
                                <!-- <td>Id Article</td> -->
                                <td>Name User</td>
                                <td>Rights</td>
                                <td colspan=2 class="action">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allusers as $key) {?>
                            <form method="post">
                                <tr>
                                    <td><?php echo $key['fname']." ".$key['lname']?></td>
                                    <td><?php echo $key['actions']?></td>
                                    <input type="hidden" name="id_users" value="<?php echo $key['id_users']?>">
                                    <!-- <td><button type="submit" class="btn-edit" name="edit" ><i class="fa fa-edit"></i> Edit</button></td> -->
                                    <td><button type="submit" class="btn-trash" name="del-user"><i class="fa fa-trash"></i> Delete</button></td>
                                </tr>
                            </form>                                                                                                                                                                                                          
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <div class="edit-user">
                <form method="POST" enctype='multipart/form-data'>
                        <h1>Edit User</h1>
                        <table>
                            <tr>
                                <td><label for="full_name">Frist name :</label></td>
                                <td><input type="text" name="fname" value="<php echo $edite['fname']?>"  required></td>
                            </tr>
                            <tr>
                                <td><label for="full_name">Last name :</label></td>
                                <td><input type="text" name="lname" value="<php echo $edite['lname']?>" required></td>
                            </tr>
                            <tr>
                                <td><label for="email">Email :</label></td>
                                <td><input type="email" name="email" value="<php echo $edite['email_users']?>"  required></td>
                            </tr>
                            <tr>
                                <td><label for="rights">Rights :</label></td>
                                <td><select name="rights" >
                                    <option value="<php echo $edite['actions'] ?>"  selected disabled><php echo $edite['actions'] ?></option>
                                    <option value="blogger">blogger</option>
                                    <option value="Visitor">Visitor</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td colspan=2><input type="submit" value="Update" name="Update" class="up" disabled></td>
                            </tr>
                        </table>
                    </form>
            </div> -->
    </div>


</div>

