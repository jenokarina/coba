<div class="main">
    <h4>Dalam Pengiriman</h4>
    <div class="row-lg mt-30 mr-60">
        <div class="col-100p">
            <table>
                <tr>
                    <th>Tanggal Pembelian</th>
                    <th>Id Transaksi</th>
                    <th>Nama Penerima</th>
                    <th>Total Pembayaran</th>
                    <th>Status</th>
                </tr>
                <?php
                foreach ($pengiriman as $sts) : ?>
                    <tr>
                        <td><?= $sts->tanggal ?></td>
                        <td><?= $sts->id_transaksi ?></td>
                        <td><?= $sts->nama_penerima ?></td>
                        <td>Rp. <?= number_format($sts->total_harga) ?></td>
                        <td>
                            <span style="background-color: #2196f3; border-radius:10px; color:white; padding:5px 8px 5px 8px;">Sedang dikirim</span>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>