<?php
if (isset($_POST['submit'])) {
	if (!isset($_GET['id'])) {
		$submit = mysqli_query($con, "INSERT INTO stock VALUES (null, '$_POST[kelas]', '-$_POST[jumlah]', 0, 0, '$_POST[sekolah]')");
	} else {
		$submit = mysqli_query($con, "UPDATE stock SET kelas = '$_POST[kelas]', jumlah = '-$_POST[jumlah]', sekolah = '$_POST[sekolah]' WHERE id = '$_GET[id]'");
	}

	if ($submit) {
		echo "<script>alert('Berhasil menyimpan data');window.location.href='?menu=distribusi'</script>";
	} else {
		echo "<script>alert('Gagal menyimpan data')</script>";
	}
}

if (isset($_GET['id'])) {
	if (isset($_GET['delete'])) {
		$delete = mysqli_query($con, "DELETE FROM stock WHERE id = '$_GET[id]'");
		if ($delete) {
			echo "<script>alert('Berhasil menghapus data');window.location.href='?menu=distribusi'</script>";
		} else {
			echo "<script>alert('Gagal menghapus data')</script>";
		}
	}

	$record = mysqli_query($con, "SELECT * FROM stock WHERE id = '$_GET[id]'");
	$edit = mysqli_fetch_assoc($record);
}

$record = mysqli_query($con, "SELECT * FROM stock WHERE _type = 0");
?>
<div class="col-sm-12 mt-4">
    <form method="POST">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Sekolah</label>
            <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?= @$edit['sekolah'] ?>" required>
        </div>
        <div class="form-group">
            <div class="d-flex">
                <label for="exampleFormControlSelect1" class="mr-3">Kelas</label>
                <?php for ($i = 1; $i <= 6; $i++) : ?>
					<?php if (@$edit): ?>
						<?php if ($edit['kelas'] == $i): ?>
                            <div class="custom-control custom-radio mr-3">
                                <input type="radio" id="kelas-<?= $i ?>" name="kelas" class="custom-control-input" value="<?= $i ?>" required checked>
                                <label class="custom-control-label" for="kelas-<?= $i ?>"><?= $i ?></label>
                            </div>
						<?php else: ?>
                            <div class="custom-control custom-radio mr-3">
                                <input type="radio" id="kelas-<?= $i ?>" name="kelas" class="custom-control-input" value="<?= $i ?>" required>
                                <label class="custom-control-label" for="kelas-<?= $i ?>"><?= $i ?></label>
                            </div>
						<?php endif ?>
					<?php else: ?>
                        <div class="custom-control custom-radio mr-3">
                            <!-- <input type="radio"> -->
                            <input type="radio" id="kelas-<?= $i ?>" name="kelas" class="custom-control-input" value="<?= $i ?>" required>
                            <label class="custom-control-label" for="kelas-<?= $i ?>"><?= $i ?></label>
                        </div>
					<?php endif ?>
				<?php endfor ?>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= @$edit['jumlah'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary float-right" name="submit">Simpan</button>
    </form>
    <div class="card" style="margin-top:70px;">
        <div class="card-body">
            <h4 class="card-title">Distribusi LKS</h4>
            <table class="table table-bordered table-hover" style="margin-top: 40px;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Sekolah</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                    ?>
                    <?php while ($distribution = mysqli_fetch_assoc($record)) : ?>
                        <tr>
                            <th scope="row"><?=$no++;?></th>
                            <td><?= $distribution['sekolah']; ?></td>
                            <td><?= $distribution['kelas']; ?></td>
                            <td><?= abs($distribution['jumlah']) ?></td>
                            <td>
                                <a href="?menu=distribusi&id=<?= $distribution['id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="?menu=distribusi&id=<?= $distribution['id'] ?>&delete=true" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</div>