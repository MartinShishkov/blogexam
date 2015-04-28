<html>
    <head>
        <?php
            $contents_path = DX_ROOT_URL . 'content';
            $styles_path = $contents_path . '/styles';
            $bootstrap_path = $contents_path . '/bootstrap';

            echo("<link href='{$bootstrap_path}/css/bootstrap.min.css' rel='stylesheet'>");
            echo("<link href='{$bootstrap_path}/css/bootstrap-theme.min.css' rel='stylesheet'>");
            echo("<link href='{$bootstrap_path}/js/bootstrap.min.js' rel='stylesheet'>");
            echo("<link href='{$styles_path}/main-styles.css' rel='stylesheet'>");
        ?>
    </head>
    <body>
        <header class="page-header">
            <h1 class="text-center">Blog System</h1>

            <?php
                echo("<ol class='breadcrumb'>");
                    if(!empty($this->logged_user)){
                        echo("<p>Hello, {$this->logged_user["username"]}!</p>");

                        $logout_path = DX_ROOT_URL . 'users/logout';
                        $home_path = DX_ROOT_URL;

                        echo("<li><a href='{$home_path}'>[Home]</a></li>");
                        echo("<li><a href='{$logout_path}'>[Logout]</a></li>");
                    }else{
                        $home_path = DX_ROOT_URL;
                        $login_path = DX_ROOT_URL . 'users/login';
                        $register_path = DX_ROOT_URL . 'users/register';

                        echo("<li><a href='{$home_path}'>[Home]</a></li>");
                        echo("<li><a href='{$login_path}'>[Login]</a></li>");
                        echo("<li><a href='{$register_path}'>[Register]</a></li>");

                    }
                echo("</ol>");
            ?>
        </header>
        <div class="container-fluid">