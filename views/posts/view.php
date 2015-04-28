<div class="row">
    <div class="col-sm-6 col-sm-push-3 col-xs-12">
        <div class="panel panel-primary wordwrap cool">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo($post["title"])?></h3>
            </div>
            <div class="panel-body">
                <?php echo($post["body"])?>
            </div>
            <div class="panel-footer">
                <?php echo($post["date_created"])?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 col-sm-push-3 col-xs-12">
        <form method="post">
            <input type="text" name="post_id" value="<?php echo($post["id"])?>" hidden="">

            <div class="input-group margin-10-bottom">
                <span class="input-group-addon" id="basic-addon1">Required</span>
                <input type="text" name="author_name" class="form-control" placeholder="Name..." aria-describedby="basic-addon1" required="">
            </div>
            <div class="input-group margin-10-bottom">
                <span class="input-group-addon" id="basic-addon1">Optional</span>
                <input type="email" name="author_email" class="form-control" placeholder="Email..." aria-describedby="basic-addon1">
            </div>
            <div class="form-group margin-10-bottom">
                <label for="textArea" class="col-lg-2 control-label">Comment:</label>
                <div class="col-lg-10">
                    <textarea class="form-control" name="body" rows="3" id="textArea"></textarea>
                </div>
            </div>

            <div class="input-group">
                <input type="submit" value="OK" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php foreach($comments as $comment): ?>
    <div class="row">
        <div class="col-md-6 col-md-push-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <?php
                                echo($comment["author_name"]);

                                if(!empty($comment["author_email"])){
                                    echo("<p class='pull-right'>{$comment["author_email"]}</p>");
                                }
                            ?>
                        </h3>
                    </div>
                    <div class="panel-body wordwrap">
                        <?php echo($comment["body"])?>
                    </div>

                    <div class="panel-footer">
                        <?php echo($comment["date_created"])?>
                    </div>
                </div>
        </div>
    </div>
<?php endforeach ?>
