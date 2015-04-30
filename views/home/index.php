<div class="col-md-6 col-md-push-1">
    <h1>Home view</h1>
    <?php foreach($posts as $post ): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title link">
                            <?php
                                $post_path = DX_ROOT_URL . 'posts/view/' . $post["id"];
                                echo("<a href='{$post_path}'>{$post["title"]}</a>");
                                echo("<p class='pull-right'>Viewed - {$post["visits"]}</p>");
                            ?>
                        </h3>
                    </div>

                    <div class="panel-body wordwrap">
                        <?php echo(substr($post["body"], 0, 250) . "...")?>
                    </div>

                    <div class="panel-footer">
                        <?php
                            echo("<span>Posted by - {$post["username"]}</span>");
                            echo("<span class='float-right'>{$post["date_created"]}</span>");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<div class="col-md-5 pull-right col-xs-12">
    <h3>Recent posts</h3>
    <div class="list-group">
        <?php foreach($recent_posts as $recent_post):
            $recent_post_path = DX_ROOT_URL . 'posts/view/' . $recent_post["id"];
            ?>
            <a href="<?php echo($recent_post_path)?>" class="list-group-item">
                <h4 class="list-group-item-heading">
                    <?php echo($recent_post["title"]);?>
                </h4>
                <p class="list-group-item-text"><?php echo(substr($recent_post["body"], 0, 20) . "...")?></p>
                <p class="list-group-item-text bold margin2"><?php echo($recent_post["username"])?></p>
                <p class="list-group-item-text bold italic margin2"><?php echo($recent_post["date_created"])?></p>
            </a>
        <?php endforeach ?>
    </div>

    <h3>Most popular tags</h3>
    <?php foreach($popular_tags as $key=>$value):
        $search_post_path = DX_ROOT_URL . 'home/search/' . $key;
        ?>
        <a href="<?php echo($search_post_path)?>" class="list-group-item">
            <h4 class="list-group-item-heading">
                <span class="label label-primary"><?php echo($key);?></span>
                <span class="badge"><?php echo($value)?></span>
            </h4>
        </a>
    <?php endforeach ?>
</div>