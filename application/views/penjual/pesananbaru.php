<div class="main">
    <h4>Pesanan Baru</h4>
    <?= $this->session->flashdata('message') ?>
    <div class="row-lg mt-30 mr-60">
        <div class="col-100p">
            <table>
                <tr>
                    <th>Tanggal Pembelian</th>
                    <th>Id Transaksi</th>
                    <th>Nama Penerima</th>
                    <th>Total Pembayaran</th>
                    <th>Aksi</th>
                </tr>
                <?php
                foreach ($pesananbaru as $sts) : ?>
                    <tr>
                        <td><?= $sts->tanggal ?></td>
                        <td><?= $sts->id_transaksi ?></td>
                        <td><?= $sts->nama_penerima ?></td>
                        <td>Rp. <?= number_format($sts->total_harga) ?></td>

                        <td>
                            <a href="<?= base_url('Siapdikirim/update_status/') . $sts->id_transaksi ?>"><button class="btn btn-primary">
                                    Konfirmasi
                                </button></a>
                        </td>
                    </tr>

                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>