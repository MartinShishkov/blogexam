<div class="col-sm-6 col-sm-push-3">
    <form method="post" class="form-horizontal">
        <fieldset>
            <legend>Login</legend>

            <?php
                if(!isset($_SESSION["formToken"])){
                    $_SESSION["formToken"] = uniqid(mt_rand(), true);
                }
            ?>

            <input type="text" name="formToken" value="<?php echo($_SESSION["formToken"]) ?>" hidden="">
            <div class="form-group">
                <label for="username" class="col-lg-2 control-label">Username</label>
                <div class="col-lg-10">
                    <input class="form-control" name="username" id="username" placeholder="Username..." type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                    <input class="form-control" name="password" id="inputPassword" placeholder="Password" type="password">
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