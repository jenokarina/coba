<div class="main">
    <h4>Pesanan Selesai</h4>
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
                foreach ($pesananselesai as $sts) : ?>
                    <tr>
                        <td><?= $sts->tanggal ?></td>
                        <td><?= $sts->id_transaksi ?></td>
                        <td><?= $sts->nama_penerima ?></td>
                        <td>Rp. <?= number_format($sts->total_harga) ?></td>
                        <td>
                            <a href="<?= base_url('Pesananselesai/nota/') . $sts->id_transaksi ?>"><span style="background-color: #2196f3; border-radius:10px; color:white; padding:5px 8px 5px 8px;">Nota</span></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>