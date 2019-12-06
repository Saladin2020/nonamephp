<div class="container-fluid">
    <h1><?php echo $var['HEADERNAME']; ?></h1>
    <br>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label style="color: black;">เลขบัตรประจำตัวประชาชน</label>
                            <input minlength="13" maxlength="13" style="background-color: white;" name="cid" type="text" class="form-control" placeholder="" required="">
                        </div>
                        <?php if (isset($var['RESULT']['NOTNUMERIC'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $var['RESULT']['NOTNUMERIC']; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($var['RESULT']['NOTFOUND'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $var['RESULT']['NOTFOUND']; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($var['RESULT']['ALREADY'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $var['RESULT']['ALREADY']; ?>
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="btn my-primary btn-lg btn-block">ตรวจสอบ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>