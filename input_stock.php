<?php
if (isset($_POST['submit'])) {
	if (!isset($_GET['id'])) {
		$submit = mysqli_query($con, "INSERT INTO stock VALUES (null, '$_POST[kelas]', '$_POST[jumlah]', '$_POST[harga]', 1, null)");
	} else {
		$submit = mysqli_query($con, "UPDATE stock SET kelas = '$_POST[kelas]', jumlah = '$_POST[jumlah]', harga = '$_POST[harga]' WHERE id = '$_GET[id]'");
	}

	if ($submit) {
		echo "<script>alert('Berhasil menyimpan data');window.location.href='?menu=input_stock'</script>";
	} else {
		echo "<script>alert('Gagal menyimpan data')</script>";
	}
}

if (isset($_GET['id'])) {
	if (isset($_GET['delete'])) {
		$delete = mysqli_query($con, "DELETE FROM stock WHERE id = '$_GET[id]'");
		if ($delete) {
			echo "<script>alert('Berhasil menghapus data');window.location.href='?menu=input_stock'</script>";
		} else {
			echo "<script>alert('Gagal menghapus data')</script>";
		}
	}

	$record = mysqli_query($con, "SELECT * FROM stock WHERE id = '$_GET[id]'");
	$edit = mysqli_fetch_assoc($record);
}

$record = mysqli_query($con, "SELECT * FROM stock WHERE _type = 1");
?>
<div class="col-sm-12 mt-4">
    <form method="POST">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Kelas</label>
            <select class="form-control" id="kelas" name="kelas" required>
                <?php for ($i = 1; $i <= 6; $i++) : ?>
                    <?php if (@$edit): ?>
                        <?php if ($edit['kelas'] == $i): ?>
                            <option value="<?= $i ?>" selected><?= $i ?></option>
                        <?php else: ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endif ?>
                    <?php else: ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endif ?>
                <?php endfor ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= @$edit['jumlah'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= @$edit['harga'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary float-right" name="submit">Simpan</button>
    </form>
    <div class="card" style="margin-top:70px;">
        <div class="card-body">
            <h4 class="card-title">Data Stock LKS</h4>
            <table class="table table-bordered table-hover" style="margin-top: 40px;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Nilai Persediaan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $jumLKS = 0;
                        $totPersediaan = 0;
                    ?>
                    <?php while ($stock = mysqli_fetch_assoc($record)) : ?>
                        <tr>
                            <th scope="row"><?=$no++;?></th>
                            <td><?= $stock['kelas']; ?></td>
                            <td><?= $stock['jumlah']; ?></td>
                            <td><?= number_format($stock['harga']) ?></td>
                            <td><?= number_format($stock['jumlah'] * $stock['harga']) ?></td>
                            <td>
                                <a href="?menu=input_stock&id=<?= $stock['id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="?menu=input_stock&id=<?= $stock['id'] ?>&delete=true" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data?')">Hapus</a>
                            </td>
                        </tr>
                        <?php
                            $jumLKS += $stock['jumlah'];
                            $totPersediaan += $stock['jumlah'] * $stock['harga'];
                        ?>
                    <?php endwhile ?>
                </tbody>
            </table>
            <table class="table table-bordered table-hover" style="margin-top: 40px;">
                <tr>
                    <th scope="col">Jumlah LKS Seluruh</th>
                    <td>
                        <input type="text" class="form-control" value="<?= $jumLKS ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <th scope="col">Total Nilai Persediaan</th>
                    <td><input type="text" class="form-control" value="<?= number_format($totPersediaan) ?>" readonly></td>
                </tr>
            </table>
        </div>
    </div>
</div>
