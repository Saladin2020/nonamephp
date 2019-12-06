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
            <p>LINE</p>
            <p>
                โบรกเกอร์สโรชาสวีท โรลออน สไปเดอร์เทียมทานมะกัน เยอร์บีรา ฟีเวอร์ นายพรานทาวน์สามแยก พลานุภาพติวเทควันโดไฟแนนซ์มาร์ช แซวแทกติคแหม็บก๊วนตู้เซฟ ชัวร์ สเต็ปไบเบิลกลาสวอลล์ สติกเกอร์แฟ็กซ์เสือโคร่งเลดี้ ยะเยือกนอมินี ฮันนีมูนซูเปอร์แฟร์ คลิปไฟแนนซ์แชเชือนวิทย์ ไนท์สงบสุขแฟกซ์เกรย์ เทรลเลอร์มายองเนสราสเบอร์รีปิโตรเคมี
            </p>
            <form action="https://notify-bot.line.me/oauth/authorize" method="GET">
                <input hidden="" name="response_type" value="code">
                <input hidden="" name="client_id" value="xniVUOq3E2vhAcmxbBSamG">
                <input hidden="" name="redirect_uri" value="<?php echo $var['RESULT']['LINE_REDIRECT_URI']; ?>">
                <input hidden="" name="scope" value="notify">
                <input hidden="" name="state" value="yConcept">
                <button type="submit" class="btn my-primary btn-lg btn-block">รับการแจ้งเตือน</button>
            </form>
        </div>
    </div>
</main>
