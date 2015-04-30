<div class="row">
    <div class="col-xs-4 col-xs-push-3">
        <form method="post">
            <input type="text" name="formToken" value="<?php echo($_SESSION["formToken"]);?>" hidden="">
            <div class="input-group margin-10-bottom">
                <span class="input-group-addon" id="basic-addon1">Title*</span>
                <input type="text" name="post-title" class="form-control" placeholder="Title..." aria-describedby="basic-addon1" required="">
            </div>
            <div class="form-group margin-10-bottom">
                <label for="textArea" class="col-lg-2 control-label">Text:</label>
                <textarea class="form-control" name="post-body" rows="3" id="textArea" placeholder="Text..."></textarea>
            </div>
            <div class="input-group margin-10-bottom">
                <span class="input-group-addon" id="basic-addon1">Tags*</span>
                <input type="text" name="tags" class="form-control" placeholder="Tags..." aria-describedby="basic-addon1" required="">
            </div>
            <div class="input-group">
                <input type="submit" value="Publish" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
