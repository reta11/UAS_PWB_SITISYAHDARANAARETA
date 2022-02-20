<?php
$record = mysqli_query($con, "SELECT id, kelas, SUM(jumlah) as jumlah, harga FROM stock GROUP BY kelas");
?>
<div class="col-sm-12 mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cek Stock</h4>
            <table class="table table-bordered table-hover" style="margin-top: 40px;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Nilai Persediaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                    ?>
                    <?php while ($stock = mysqli_fetch_assoc($record)) : ?>
                        <tr>
                            <th scope="row"><?=$no++;?></th>
                            <td><?= $stock['kelas']; ?></td>
                            <td><?= $stock['jumlah']; ?></td>
                            <td><?= number_format($stock['harga']) ?></td>
                            <td><?= number_format($stock['jumlah'] * $stock['harga']) ?></td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</div>