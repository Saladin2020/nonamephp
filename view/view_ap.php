<main role="main" class="container">
    <h1>Appointment</h1>
</main>
<main role="main" class="container">
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label style="color: black;">HN/CID</label>
                    <input style="background-color: white;" name="hncid" type="text" class="form-control" placeholder="" required="">
                </div>
                <?php if (isset($var['RESULT']['NOTFOUND'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $var['RESULT']['NOTFOUND']; ?>
                    </div>
                <?php endif; ?>
                <button type="submit" class="btn btn-warning btn-lg btn-block">GET</button>
            </form>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label style="color: black;">เลขบัตรประจำตัวประชาชน</label>
                    <input style="background-color: white;" name="cid_number" value="<?php if (isset($var['RESULT']['CID'])) echo $var['RESULT']['CID']; ?>" type="text" class="form-control" placeholder="" readonly="">
                </div>
                <div class="form-group">
                    <label style="color: black;">HN</label>
                    <input style="background-color: white;" name="hn_number" value="<?php if (isset($var['RESULT']['HN'])) echo $var['RESULT']['HN']; ?>" type="text" class="form-control" placeholder="" readonly="">
                </div>
                <div class="form-group">
                    <label style="color: black;">ชื่อ</label>
                    <input style="background-color: white;" name="fname" value="<?php if (isset($var['RESULT']['FNAME'])) echo $var['RESULT']['FNAME']; ?>" type="text" class="form-control" placeholder="" readonly="">
                </div>
                <div class="form-group">
                    <label style="color: black;">นามสกุล</label>
                    <input style="background-color: white;" name="lname" value="<?php if (isset($var['RESULT']['LNAME'])) echo $var['RESULT']['LNAME']; ?>" type="text" class="form-control" placeholder="" readonly="">
                </div>
                <div class="form-group">
                    <label style="color: black;">เพศ</label>
                    <input style="background-color: white;"  value="<?php if (isset($var['RESULT']['SEX'])) echo ($var['RESULT']['SEX'] == 1) ? 'ชาย' : 'หญิง'; ?>" type="text" class="form-control" placeholder="" readonly="">
                    <input type="hidden" name="sex" value="<?php if (isset($var['RESULT']['SEX'])) echo $var['RESULT']['SEX']; ?>">
                </div>
                <div class="form-group">
                    <label style="color: black;">อายุ</label>
                    <input style="background-color: white;" value="<?php if (isset($var['RESULT']['BDATE'])) echo DateTime::createFromFormat('Y-m-d', $var['RESULT']['BDATE'], new DateTimeZone('Asia/Bangkok'))->diff(new DateTime('now', new DateTimeZone('Asia/Bangkok')))->y; ?>" type="text" class="form-control" placeholder="" readonly="">
                    <input type="hidden" name="age" value="<?php if (isset($var['RESULT']['BDATE'])) echo $var['RESULT']['BDATE']; ?>">
                </div>
                <div class="form-group">
                    <label style="color: black;">วันที่นัดหมาย</label>
                    <input style="background-color: white;" name="apdate" type="date" class="form-control" placeholder="" required="" >
                </div> 
                <div class="form-group">
                    <label style="color: black;">เวลานัดหมาย</label>
                    <input style="background-color: white;" name="aptime" type="time" class="form-control" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label style="color: black;">รายละเอียดการนัด</label>
                    <textarea rows="5" style="background-color: white;" name="order" class="form-control" placeholder="" required=""></textarea>
                </div>
                <div class="form-group">
                    <label style="color: black;">NOTE</label>
                    <textarea rows="5" style="background-color: white;" name="note"  class="form-control" placeholder="" ></textarea>
                </div>
                <button type="submit" class="btn btn-dark btn-lg btn-block">ENTER</button>
            </form>
        </div>
    </div>
</main>