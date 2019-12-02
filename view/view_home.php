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
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <h1><?php echo $var['HEADERNAME']; ?></h1>
            <br>
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>URL</label>
                                    <input name="url" type="text" class="form-control" placeholder="--url--" required="">
                                </div>
                                <button type="submit" class="btn btn-primary">GET</button>
                                <a class="btn btn-light" href="<?php echo $var['BASEURL'] . '/index.php/home'; ?>">CLEAR</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($var['result'])): ?>
                <?php //print_r($var['result']); ?>
                <br>
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea readonly="" class="form-control" rows="10">
                                        <?php print_r($var['result']); ?>
                                    </textarea>
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
