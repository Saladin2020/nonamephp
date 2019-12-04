<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $var['TITLE']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo $var['BASEURL'] . '/asset/images/zip.ico'; ?>">
        <link rel="stylesheet" href="<?php echo $var['BASEURL'] . '/asset/css/bootstrap.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $var['BASEURL'] . '/asset/fonts/kanit.css'; ?>">
        <style>
            body {
                font-family: 'Kanit', sans-serif;
                padding-top: 2rem;
                background-color: black;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <h1 style="color: white;"><?php echo $var['HEADERNAME']; ?></h1>
            <br>
            <div class="row">
                <div class="col-sm">
                    <div style="background-color: indigo;" class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label style="color: white;">URL</label>
                                    <input style="background-color: white;" name="url" type="text" class="form-control" placeholder="" required="">
                                </div>
                                <button type="submit" class="btn btn-danger">GET</button>
                                <a class="btn btn-light" href="<?php echo $var['BASEURL'] . '/index.php/home'; ?>">CLEAR</a>
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
                        <div style="background-color: black;" class="card">
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
        <script src="<?php echo $var['BASEURL'] . '/asset/js/jquery.min.js'; ?>"></script>  
        <script src="<?php echo $var['BASEURL'] . '/asset/js/popper.min.js'; ?>"></script>
        <script src="<?php echo $var['BASEURL'] . '/asset/js/bootstrap.min.js'; ?>"></script>
    </body>
</html>
