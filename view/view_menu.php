<style>
    .avatar {
        vertical-align: middle;
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }
    #masearch {
        display: none;
        position: fixed;
        top: 150px;
        left: -20px;
        z-index: 99;
        font-size: 12px;
        border: none;
        outline: none;
        background-color: rgba(255,255,0, .75);
        color: black;
        cursor: pointer;
        padding: 10px;
    }

    #masearch:hover {
        background-color: black;
        color: white;
    }

    .modal-content {
        border-radius: 0;
        border: none;
    }

    .modal-header {
        border-bottom-color: #EEEEEE;
        background-color: transparent;/*#FAFAFA;*/
    }
    .modal.left .modal-dialog {
        position: fixed;
        margin: auto;
        width: 320px;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }

    .modal.left .modal-content {
        height: 100%;
        overflow-y: auto;
    }

    .modal.left .modal-body {
        padding: 15px 15px 80px;
    }

    .modal.left.fade .modal-dialog {
        left: -320px;
        -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
        -o-transition: opacity 0.3s linear, left 0.3s ease-out;
        transition: opacity 0.3s linear, left 0.3s ease-out;
    }

    .modal.left.fade.show .modal-dialog {
        left: 0;
    }
</style>
<div class="modal left fade" id="Search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center" style="background-color: white;">
                <h4>Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>

            <div class="modal-body" style="padding: 0;">

                <ul  class="list-group list-group-flush">
                    <?php
                    $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
                    ?>
                    <?php foreach ($var['SIDEBAR'] as $key => $menu): ?>
                        <li class="list-group-item<?php echo ($uriSegments[3] === $key) ? ' active' : ''; ?>" <?php echo ($uriSegments[3] === $key) ? 'style="background-color: black;"' : ''; ?>>
                            <a style="text-decoration: none;" href="<?php echo $var['BASEURL'] . '/index.php/' . $key; ?>">
                                <img src="<?php echo $var['BASEURL'] . '/asset/images/' . $menu['ICON']; ?>" width="32" height="32">
                                <span <?php echo ($uriSegments[3] === $key) ? 'style="color: white;"' : ''; ?>><?php echo $menu['NAME']; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>     
            </div>
        </div>
    </div>
</div>    
<!--End modal-->
<button style="-ms-writing-mode: tb-rl;
        -webkit-writing-mode: vertical-rl;
        writing-mode: vertical-rl;
        transform: rotate(270deg);
        white-space: nowrap;" id="masearch" data-toggle="modal" data-target="#Search">
    <span class="icon">
        <i class="fas fa-th"></i>
    </span>MENU
</button>


<script>
    document.getElementById("masearch").style.display = "block";
</script>