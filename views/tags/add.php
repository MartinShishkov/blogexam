<div class="col-sm-4 col-sm-push-4">
<form method="post" class="form-horizontal">
    <fieldset>
        <legend>Add a new tag</legend>
        <input type="text" name="formToken" value="<?php echo($_SESSION["formToken"]) ?>" hidden="">
        <div class="form-group">
            <label for="tag_name" class="col-lg-2 control-label">Name:</label>
            <div class="col-lg-10">
                <input class="form-control" name="tag_name" id="tag_name" placeholder="Tag..." type="text">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
</form>
</div>