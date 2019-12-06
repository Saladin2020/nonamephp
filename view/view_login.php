<div class="container-fluid">
    <h1><?php echo $var['HEADERNAME']; ?></h1>
    <br>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label style="color: black;">USERNAME</label>
                            <input style="background-color: white;" name="username" type="text" class="form-control" placeholder="" required="">
                        </div>
                        <input type="hidden" name="token" value="<?php echo $var['TOKEN']; ?>">
                        <div class="form-group">
                            <label style="color: black;">PASSWORD</label>
                            <input style="background-color: white;" name="password" type="text" class="form-control" placeholder="" required="">
                        </div>
                        <button type="submit" class="btn btn-secondary btn-lg btn-block">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($var['RESULT']) && $var['RESULT'] !== ''): ?>
        <?php //print_r($var['result']); ?>
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="card bg-danger">
                    <div class="card-body">
                        <div class="form-group">
                            <?php print_r($var['RESULT']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <br>
</div>