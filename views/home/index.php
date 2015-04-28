<h1>Home view</h1>

<?php foreach($posts as $post ): ?>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo($post["title"])?>
                    </h3>
                </div>
                <div class="panel-body">
                    <?php echo($post["body"])?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>