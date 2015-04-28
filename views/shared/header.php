<html>
    <head>
        <link href="/examblog/styles/main-styles.css" rel="stylesheet">
    </head>
    <body>
        <header style="background-color: greenyellow">
            <h1>App header</h1>
            <?php
                $logged_user = \Lib\Auth::get_instance()->get_logged_user();
            ?>
        </header>
        <div id="main-content">