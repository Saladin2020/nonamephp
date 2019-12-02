<style>
    a:link, a:visited {
        background-color: #f44336;
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;

    }

    a:hover, a:active {
        background-color: red;
    }

    .masearch {
        position: fixed;
        top: 150px;
        right: 0px;
        z-index: 99;
        font-size: 12px;
        border: none;
        outline: none;
        color: black;
        cursor: pointer;
    }

    .complete {
        padding: 20px;
        background-color: teal;
        position: fixed;
        top: 150px;
        right: 40%;
        z-index: 99;
        font-size: 50px;
        border: none;
        outline: none;
        color: white;
    }
    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>
<div class="complete">
    <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
    <p style="text-align: center;"><img width="50" src="<?php echo $var['BASEURL'] . '/asset/images/browser.svg'; ?>" /><br>Complete</p>
</div>
<div class="masearch">
    <a href="<?php echo $var['link']; ?>"><img width="32" src="<?php echo $var['BASEURL'] . '/asset/images/zip.svg'; ?>" /><?php echo $var['text']; ?></a>
</div>
