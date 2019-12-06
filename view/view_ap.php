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
                <button type="submit" class="btn btn-secondary btn-lg btn-block">GET</button>
            </form>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label style="color: black;">ชื่อ</label>
                    <input style="background-color: white;" name="username" value="<?php if (isset($var['RESULT']['FNAME'])) echo $var['RESULT']['FNAME']; ?>" type="text" class="form-control" placeholder="" required="">
                </div>
                <div class="form-group">
                    <label style="color: black;">นามสกุล</label>
                    <input style="background-color: white;" name="username" value="<?php if (isset($var['RESULT']['LNAME'])) echo $var['RESULT']['LNAME']; ?>" type="text" class="form-control" placeholder="" required="">
                </div>
                <div class="form-group">
                    <label style="color: black;">เพศ</label>
                    <input style="background-color: white;" name="username" value="<?php if (isset($var['RESULT']['LINETOKEN'])) echo $var['RESULT']['LINETOKEN']; ?>" type="text" class="form-control" placeholder="" required="">
                </div>
                <div class="form-group">
                    <label style="color: black;">อายุ</label>
                    <input style="background-color: white;" name="username" value="<?php if (isset($var['RESULT']['FNAME'])) echo $var['RESULT']['FNAME']; ?>" type="text" class="form-control" placeholder="" required="">
                </div>
                <div class="form-group">
                    <label style="color: black;">DATE</label>
                    <input style="background-color: white;" name="date" type="datetime-local" class="form-control" placeholder="" required="">
                </div>
                <div class="form-group">
                    <label style="color: black;">CASE</label>
                    <input style="background-color: white;" name="password" type="text" class="form-control" placeholder="" required="">
                </div>
                <div class="form-group">
                    <label style="color: black;">NOTE</label>
                    <input style="background-color: white;" name="password" type="text" class="form-control" placeholder="" required="">
                </div>
                <button type="submit" class="btn btn-secondary btn-lg btn-block">ENTER</button>
            </form>
        </div>
    </div>
</main>