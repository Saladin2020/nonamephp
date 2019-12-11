<main role="main" class="container">
    <h1>Appointment</h1>
</main>
<main role="main" class="container">
    <div class="card">

        <div class="card-body">
            <p><a href="<?php echo $var['CRUDROUTE'] . 'create'; ?>" class="btn btn-success btn-lg"><i class="fas fa-user-plus"></i> เพิ่ม</a>
            </p>
            <table class="table table-bordered">
                <thead class="text-center">
                <form method="POST" action="">
                    <tr>
                        <th scope="col">ค้นหา</th>
                        <?php foreach ($var['RESULT']['COLSTATUS'] as $key): ?>
                            <th scope="col">
                                <input type="text" class="form-control" name="<?php echo $key['Field']; ?>">
                            </th>
                        <?php endforeach; ?>
                        <th scope="col"  colspan="3">
                            <button type="submit" class="btn btn-warning btn-md btn-block"><i class="fas fa-search"></i></button>
                        </th>
                    </tr>
                </form>
                <tr>
                    <th scope="col">#</th>
                    <?php foreach ($var['RESULT']['COLHEAD'] as $key): ?>
                        <th scope="col"><?php echo $key; ?></th>
                    <?php endforeach; ?>
                    <th scope="col"  colspan="3">จัดการ</th>
                </tr>
                </thead>
                <tbody>
                    <?php $cnum = $var['ROWNUMBER']; ?>
                    <?php foreach ($var['RESULT']['DATA'] as $key => $data): ?>
                        <tr>
                            <td><?php echo $cnum; ?></td>
                            <?php foreach ($var['RESULT']['COLSTATUS'] as $col): ?>
                                <td><?php echo $data[$col['Field']]; ?></td>
                            <?php endforeach; ?>
                            <td>
                                <form method="POST" action="<?php echo $var['CRUDROUTE'] . 'update'; ?>">
                                    <?php foreach ($var['RESULT']['COLSTATUS'] as $col): ?>
                                        <?php if ($col['Key'] === 'PRI'): ?>
                                            <input type="hidden" name="<?php echo $col['Field']; ?>" value="<?php echo $data[$col['Field']]; ?>">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-edit"></i> แก้ไข</button>
                                </form>
                            </td>
                            <td>
                                <form name="delete_<?php echo $cnum; ?>" method="POST" action="<?php echo $var['CRUDROUTE'] . 'delete'; ?>">
                                    <?php foreach ($var['RESULT']['COLSTATUS'] as $col): ?>
                                        <?php if ($col['Key'] === 'PRI'): ?>
                                            <input type="hidden" name="<?php echo $col['Field']; ?>" value="<?php echo $data[$col['Field']]; ?>">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <button onclick="validateDelete(<?php echo $cnum; ?>)" type="submit" class="btn btn-danger btn-sm btn-block"><i class="fas fa-trash-alt"></i> ลบ</button>
                                </form>
                            </td>
                        </tr>
                        <?php $cnum++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php //echo $var['PAGENUMBER'];?>
            <?php if ($var['PAGENUMBER'] > 1 && $var['STATEFIND'] == ""): ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $var['CRUDROUTE'] . 'read?pg=0'; ?>">
                                <span>&laquo;</span>
                            </a>
                        </li>
                        <?php for ($pnum = 0; $pnum < $var['PAGENUMBER']; $pnum++): ?>
                            <li class="page-item"><a class="page-link" href="<?php echo $var['CRUDROUTE'] . 'read?pg=' . $pnum; ?>"><?php echo $pnum + 1; ?></a></li>
                        <?php endfor; ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $var['CRUDROUTE'] . 'read?pg=' . ($var['PAGENUMBER'] - 1); ?>">
                                <span>&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </div>
    <br>
</main>
<script type="text/javascript">
    function validateDelete(index) {
        event.preventDefault(); // prevent form submit
        var form = document.forms["delete_" + index]; // storing the form
        swal({
            title: "Delete",
            text: "คุณมั่นใจที่จะลบข้อมูลนี้?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm)
                    {
                        form.submit();
                    } else {
                        swal.close();
                        //swal("You are not redirected!", "success");
                    }
                }
        );
    }
</script>