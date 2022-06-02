<div class="main">
    <h4>Daftar Produk</h4>
    <div class="row-xl mt-20 mb-40">
        <?= $this->session->flashdata('message') ?>
        <a href="<?= base_url('Produk/tambah_produk') ?>"><button class="btn btn-primary mb-20 mt-20"><i class="fa fa-plus"></i> Produk</button></a>
        <table>
            <tr>
                <th>No</th>
                <th>Foto Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th colspan="3">Aksi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($produk as $prdk) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><img class="logo" src="<?= base_url('assets/img/upload/') . $prdk->foto ?>" alt=""></td>
                    <td><?= $prdk->nama_produk ?></td>
                    <td><?= number_format($prdk->harga) ?></td>
                    <td><?= $prdk->stok ?></td>
                    <td>
                        <a href="<?= base_url('Produk/edit_produk/') . $prdk->id_produk ?>"><button class="btn btn-primary" style="margin-right: -30px;"><i class="fas fa-edit"></i></button></a>
                    </td>
                    <td>
                        <a href="<?= base_url('Produk/detail_produk/') . $prdk->id_produk ?>"><button class="btn btn-success" style="margin-right: -30px;"><i class="fas fa-search-plus"></i></button></a>
                    </td>
                    <td>
                        <a onclick="return confirm('Yakin ingin hapus <?= $prdk->nama_produk ?>?')" href="<?= base_url('Produk/hapus_produk/') . $prdk->id_produk ?>"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

</div>