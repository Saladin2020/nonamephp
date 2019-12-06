<nav class="navbar navbar-light fixed-top navbar-expand-md" style="background-color: rgba(255, 255, 255, 0.8);box-shadow: 0 2px 2px -2px rgba(0,0,0,.2);">
    <div class="container-fluid text-center">
        <a class="navbar-brand" href="#">
            <img src="<?php echo $var['BASEURL'] . '/asset/images/zip.svg'; ?>" width="32" height="32"><?php echo '    Lambstech'; ?>
        </a>
        <?php if (true): ?>
            <button data-toggle="collapse" class="navbar-toggler"    data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-md-flex justify-content-md-end align-items-md-center" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <img src="<?php echo $var['BASEURL'] . '/asset/images/zip.svg'; ?>" height="20" class="d-inline-block align-top" alt="">
                            <span class="text-muted" style="font-size: 10px;"><?php //echo $this->Session_model->getsess('fname') . ' ' . $this->Session_model->getsess('lname'); ?></span>
                        </a>              
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo $var['BASEURL'] . '/index.php/logout'; ?>">Logout</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</nav>