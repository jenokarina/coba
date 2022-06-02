<div class="main">
    <h4>Siap Dikirim</h4>
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
                foreach ($siapkirim as $sts) : ?>
                    <tr>
                        <td><?= $sts->tanggal ?></td>
                        <td><?= $sts->id_transaksi ?></td>
                        <td><?= $sts->nama_penerima ?></td>
                        <td>Rp. <?= number_format($sts->total_harga) ?></td>

                        <td>
                            <a href="<?= base_url('Siapdikirim/format_pengiriman/') . $sts->id_transaksi ?>"><button class="btn btn-success">
                                    Detail
                                </button></a>
                            <a href="<?= base_url('Siapdikirim/update_status_kirim/') . $sts->id_transaksi ?>"><button class="btn btn-primary">
                                    Kirim
                                </button></a>
                        </td>
                    </tr>

                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>