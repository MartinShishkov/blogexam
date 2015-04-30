<html>
    <head>
        <?php
            $contents_path = DX_ROOT_URL . 'content';
            $styles_path = $contents_path . '/styles';
            $bootstrap_path = $contents_path . '/bootstrap';

            echo("<script src='{$bootstrap_path}/js/jquery-2.1.3.min.js'></script>");
            echo("<script src='{$bootstrap_path}/js/bootstrap.min.js'></script>");
            echo("<link href='{$bootstrap_path}/css/bootstrap.min.css' rel='stylesheet'>");
            echo("<link href='{$bootstrap_path}/css/bootstrap-theme.min.css' rel='stylesheet'>");
            echo("<link href='{$styles_path}/main-styles.css' rel='stylesheet'>");
        ?>
    </head>
    <body>
        <header>
            <h1 class="text-center">Blog System</h1>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <?php
                                $home_path = DX_ROOT_URL;
                                echo("<li><a href='{$home_path}'>Home</a></li>");

                                if(!empty($this->logged_user)){
                                    $posts_add_path = DX_ROOT_URL . 'posts/add';
                                    $tags_add_path = DX_ROOT_URL . 'tags/add';
                                    $logout_path = DX_ROOT_URL . 'users/logout';

                                    echo("<li><a href='{$posts_add_path}'>Publish</a></li>");
                                    echo("<li><a href='{$tags_add_path}'>New Tag</a></li>");
                                    echo("<li><a href='{$logout_path}'>Logout{ <span class='dotted'>{$this->logged_user["username"]}</span> }</a></li>");
                                }else{
                                    $login_path = DX_ROOT_URL . 'users/login';
                                    $register_path = DX_ROOT_URL . 'users/register';

                                    echo("<li><a href='{$login_path}'>Login</a></li>");
                                    echo("<li><a href='{$register_path}'>Register</a></li>");
                                }
                            ?>
                        </ul>
                        <form method="post" class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <?php
                if(isset($_POST["search"])){
                    $tag_name = trim($_POST["search"]);
                    if(!empty($tag_name)){
                        $search_location = DX_ROOT_URL . 'home/search/' . $tag_name;

                        header("Location: " . $search_location);
                    }
                    else{
                        echo("Empty tag names are not allowed!");
                    }
                }
            ?>
        </header>
        <div class="container-fluid page-wrap">
            <div class="row">