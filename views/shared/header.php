<html>
    <head>
        <link href="/examblog/styles/main-styles.css" rel="stylesheet">
    </head>
    <body>
        <header style="background-color: greenyellow">
            <h1>App header</h1>
            <?php
                if(!empty($this->logged_user)){
                    echo("<p>Hello, {$this->logged_user["username"]}!</p>");
                }
            ?>
        </header>
        <div id="main-content">