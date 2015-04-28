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
        <header style="background-color: greenyellow">
            <h1>App header</h1>
            <?php
                if(!empty($this->logged_user)){
                    echo("<p>Hello, {$this->logged_user["username"]}!</p>");
                    echo("<a href='#'>[Logout]</a>");
                }else{
                    $login_path = DX_ROOT_URL . 'users/login';
                    $register_path = DX_ROOT_URL . 'users/register';

                    echo("<a href='{$login_path}'>[Login]</a>");
                    echo("<a href='{$register_path}'>[Register]</a>");
                }
            ?>
        </header>
        <div class="container-fluid">