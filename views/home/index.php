<div class="col-md-5 col-md-push-1">
    <h3>All posts</h3>
    <?php foreach($this->posts as $post ): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title link">
                            <?php
                                $post_path = DX_ROOT_URL . 'posts/view/' . $post["id"];
                                echo("<a href='{$post_path}'>{$post["title"]}</a>");
                                echo("<p class='pull-right'>Viewed : {$post["visits"]}</p>");
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
    <div class="row">
        <div class="col-xs-12">
            <nav>
                <ul class="pager">
                    <?php
                        $current_page = 0;

                        if(isset($_GET["page"])){
                            $current_page = $_GET["page"];
                            if($current_page < 0){
                                $current_page = 0;
                            }
                        }

                        $search = isset($_GET["search"]) ? "&search=" . $_GET["search"] : "";
                        $next_page = DX_ROOT_URL . "home?page=" . ($current_page + 1) .  $search;

                        if( !($current_page - 1 < 0 ) ){
                            $previous_page = DX_ROOT_URL . "home?page=" . ($current_page - 1) . $search;
                        }
                        else{
                            $previous_page = DX_ROOT_URL . "home?page=" . 0 . $search;
                        }
                    ?>

                    <li><a href="<?php echo($previous_page)?>">Previous</a></li>
                    <li><a href="<?php echo($next_page)?>">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="col-md-4 pull-right col-md-pull-1 col-xs-12">
    <h3>Recent posts</h3>
    <div class="list-group">
        <?php foreach($this->recent_posts as $recent_post):
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
    <?php foreach($this->popular_tags as $key=>$value):
            $search_post_path = DX_ROOT_URL . 'home?page=0&search=' . $key;
        ?>
        <a href="<?php echo($search_post_path)?>" class="list-group-item">
            <h4 class="list-group-item-heading">
                <span class="label label-primary"><?php echo($key);?></span>
                <span class="badge"><?php echo($value)?></span>
            </h4>
        </a>
    <?php endforeach ?>

    <h3>All tags</h3>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php foreach($this->all_tags as $tag_name):
                $search_post_path = DX_ROOT_URL . 'home?page=0&search=' . $tag_name;
                ?>
                <div class="margin3 display-inline">
                    <a href="<?php echo($search_post_path);?>">
                        <span class="label label-success"><?php echo($tag_name);?></span>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

