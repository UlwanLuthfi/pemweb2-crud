<?php
//buat array scalar judul kolom
$ar_judul = ['NO', 'KODE', 'NAMA', 'KATEGORI', 'KONDISI', 'HARGA', 'STOK', 'FOTO'];
//ciptakan object dari class Produk
$obj_produk = new Produk();
//panggil fungsi menampilkan produk dari model
$rs = $obj_produk->index();
?>

<h3>Daftar Produk</h3>
<a href="index.php?hal=produk_form" class="btn btn-primary">Tambah</a>
<table class="table table-striped">
  <thead>
    <tr>
      <?php
      foreach ($ar_judul as $jdl) {
        echo '<th>' . $jdl . '</th>';
      }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($rs as $produk) {
    ?>
      <tr>
        <td><?= $no ?></td>
        <td><?= $produk['kode'] ?></td>
        <td><?= $produk['nama'] ?></td>
        <td><?= $produk['kategori'] ?></td>
        <td><?= $produk['kondisi'] ?></td>
        <td>Rp. <?= number_format($produk['harga'], 0, ',', '.') ?></td>
        <td><?= $produk['stok'] ?></td>
        <td width="15%">
          <?php
          $foto_path = 'img/' . $produk['foto'];

          if (!empty($produk['foto']) && file_exists($foto_path)) {
            $src = $foto_path;
          } else {
            $src = 'img/nophoto.png';
          }
          ?>
          <img src="<?= $src ?>" width="50%" alt="Foto Produk" />
        </td>
        <td>
          <form method="POST" action="controller/produkController.php">
            <a href="index.php?hal=produk_detail&id=<?= $produk['id'] ?>"
              title="Detail Produk" class="btn btn-info btn-sm">
              <i class="bi bi-eye"></i>
            </a>
            <a href="index.php?hal=produk_form&id=<?= $produk['id'] ?>"
              title="Ubah Produk" class="btn btn-warning btn-sm">
              <i class="bi bi-pencil"></i>
            </a>
            <button type="submit" title="Hapus Produk" class="btn btn-danger btn-sm"
              name="proses" value="hapus" onclick="return confirm('Anda Yakin ingin di Hapus?')">
              <i class="bi bi-trash"></i>
            </button>
            <input type="hidden" name="id" value="<?= $produk['id'] ?>" />
          </form>
        </td>
      </tr>
    <?php
      $no++;
    }
    ?>
  </tbody>
</table>