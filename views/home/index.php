<h1>Home view</h1>

<?php foreach($posts as $post ): ?>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php
                            $post_path = DX_ROOT_URL . 'posts/view/' . $post["id"];
                            echo("<a href='{$post_path}' class='link'>{$post["title"]}</a>")
                        ?>
                    </h3>
                </div>
                <div class="panel-body wordwrap">
                    <?php echo(substr($post["body"], 0, 100) . "...")?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>