<div style="color: <?php echo ($var['sts']) ? 'royalblue' : 'gray'; ?>;margin: 5px 20px 5px;padding: 1px 12px;background-color: <?php echo ($var['sts']) ? '#ddffdd' : '#ffffcc'; ?>;border-left: 6px solid <?php echo ($var['sts']) ? '#4CAF50' : '#ffeb3b'; ?>;">
    <p><img width="32" src="<?php echo $var['BASEURL'] . '/asset/images/' . (($var['sts']) ? 'check.svg' : 'warning.svg'); ?>" /> <strong><?php echo ($var['sts']) ? "SUCCESS >> " : "EMPTY__ >> "; ?></strong><?php echo $var['msg']; ?></p>
</div>