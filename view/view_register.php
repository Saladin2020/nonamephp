<div class="container-fluid">
    <h1>
        <?php echo $var['HEADERNAME']; ?>
    </h1>
    <p class="lead text-muted">
        Register
    </p>
    <?php if (isset($var['RESULT']['ACCESS_TOKEN_EXPIRE'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $var['RESULT']['ACCESS_TOKEN_EXPIRE']; ?>
            <a class="btn btn-danger btn-sm" href="<?php echo $var['BASEURL'].'/index.php/notify';?>">ลองอีกครั้ง</a>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label style="color: black;">เลขบัตรประจำตัวประชาชน</label>
                            <input value="<?php if (isset($var['RESULT']['CID'])) echo $var['RESULT']['CID']; ?>" style="background-color: white;" name="cid" type="text" class="form-control"  readonly="">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">HN</label>
                            <input value="<?php if (isset($var['RESULT']['HN'])) echo $var['RESULT']['HN']; ?>" style="background-color: white;" name="hn" type="text" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">ชื่อ-นามสกุล</label>
                            <input value="<?php if (isset($var['RESULT']['FULLNAME'])) echo $var['RESULT']['FULLNAME']; ?>" style="background-color: white;" name="fullname" type="text" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">วันเดือนปีเกิด</label>
                            <input value="<?php if (isset($var['RESULT']['BDATE'])) echo $var['RESULT']['BDATE']; ?>"  style="background-color: white;" name="bdate" type="text" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">เพศ</label>
                            <input value="<?php if (isset($var['RESULT']['SEX'])) echo $var['RESULT']['SEX']; ?>" style="background-color: white;" name="sex" type="text" class="form-control" readonly="">
                        </div>
                        <button type="submit" class="btn my-primary btn-lg btn-block">ยืนยัน</button>
                        <a class="btn my-secondary btn-lg btn-block" href="<?php echo $var['BASEURL'] . '/index.php/welcome'; ?>">ยกเลิก</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>