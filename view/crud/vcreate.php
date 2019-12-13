<main role="main" class="container">
    <h1>Appointment</h1>
</main>
<main role="main" class="container">
    <div class="card">
        <div class="card-body">
            <?php if (isset($var['RESULT']['STATUSINSERT'])): ?>
                <div class="<?php echo ($var['RESULT']['STATUSINSERT'] == 'Complete') ? 'alert alert-success' : 'alert alert-danger'; ?>" role="alert">
                    <?php echo $var['RESULT']['STATUSINSERT']; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="">
                <?php foreach ($var['RESULT']['NAMEPOST'] as $key => $value): ?>
                    <div class="form-group">
                        <label><?php echo $var['RESULT']['NAMEHEAD'][$value['Field']]; ?></label>
                        <input name="<?php echo $value['Field']; ?>" type="text" class="form-control" placeholder="" required="">
                    </div>
                <?php endforeach; ?>
                <button  type="submit" class="btn btn-success btn-lg btn-block"><i class="fas fa-user-plus"></i> เพิ่ม</button>
                <a href="<?php echo $var['CRUDROUTE'] . 'read'; ?>" class="btn btn-secondary btn-lg btn-block"><i class="fas fa-window-close"></i> ยกเลิก</a>
            </form>
        </div>
    </div>
    <br>
</main>
