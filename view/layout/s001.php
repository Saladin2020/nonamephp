<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $var['TITLE']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo $var['BASEURL'] . '/asset/images/zip.ico'; ?>">
        <link rel="stylesheet" href="<?php echo $var['BASEURL'] . '/asset/css/bootstrap.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $var['BASEURL'] . '/asset/fonts/fontawesome-all.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $var['BASEURL'] . '/asset/fonts/font-awesome.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $var['BASEURL'] . '/asset/fonts/ionicons.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $var['BASEURL'] . '/asset/fonts/fontawesome5-overrides.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $var['BASEURL'] . '/asset/fonts/kanit.css'; ?>">
        <style>
            body {
                font-family: 'Kanit', sans-serif;
                padding-top: 4.5rem;
                padding-bottom: 4.5rem;
                /*background-color: indigo;*/
            }
            .footer {
                font-size: 8px;
                left: 0;
                position: fixed;
                bottom: 0;
                width: 100%;
                color: grey;
                text-align: center;
                background-color: rgba(255, 255, 255, 0.8);
            }
        </style>
    </head>
    <body>
        <?php for ($i = 0; $i < count($section); $i++): ?>
            <?php if ($section[$i]) echo $section[$i]; ?>
        <?php endfor; ?>
        <script src="<?php echo $var['BASEURL'] . '/asset/js/jquery.min.js'; ?>"></script>  
        <script src="<?php echo $var['BASEURL'] . '/asset/js/popper.min.js'; ?>"></script>
        <script src="<?php echo $var['BASEURL'] . '/asset/js/bootstrap.min.js'; ?>"></script>
    </body>
</html>
