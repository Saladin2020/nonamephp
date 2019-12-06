<main role="main" class="container">
    <h1><?php echo $var['HEADERNAME']; ?></h1>
</main>
<main role="main" class="container">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <img width="80" src="<?php echo $var['BASEURL'] . '/asset/images/bell.svg'; ?>">
            </div>
            <br>
            <p>
                ขอบคุณ
            </p>
            <form action="" method="POST">
                <input hidden="" name="endjob" value="yConcept">
                <button type="submit" class="btn my-primary btn-lg btn-block">ปิด</button>
            </form>
        </div>
    </div>
</main>
