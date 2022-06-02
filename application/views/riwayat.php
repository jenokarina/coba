<section class="barang mt-50 mb-40">
    <?= $this->session->flashdata('message') ?>
    <div class="row-lg mt-30 mr-60">
        <div class="col-100p">
            <table>
                <tr>
                    <th>Tanggal Pembelian</th>
                    <th>Id Transaksi</th>
                    <th>Nama Penerima</th>
                    <th>Total Pembayaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php
                foreach ($riwayat as $sts) : ?>
                    <tr>
                        <td><?= $sts->tanggal ?></td>
                        <td><?= $sts->id_transaksi ?></td>
                        <td><?= $sts->nama_penerima ?></td>
                        <td>Rp. <?= number_format($sts->total_harga) ?></td>

                        <td> <?php
                                if ($sts->status == 'M') : ?>
                                <span style="background-color: #ffa500; border-radius:10px; color:white; padding:5px 8px 5px 8px;">Menunggu Konfirmasi</span>
                            <?php elseif ($sts->status == 'C') : ?>
                                <span style="background-color: #4caf50; border-radius:10px; color:white; padding:5px 8px 5px 8px;">Sedang Dikemas</span>
                            <?php else : ?>
                                <span style="background-color: #2196f3; border-radius:10px; color:white; padding:5px 8px 5px 8px;">Selesai</span>
                            <?php endif ?>
                        </td>
                        <td><a href="<?= base_url('Status/nota/') . $sts->id_transaksi ?>"><button class="btn btn-success">
                                    <i class="fas fa-receipt"></i> Nota
                                </button></a></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</section>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>
<script src="<?= base_url('assets/js/') ?>jquery-3.4.1.js"></script>
<script src="<?= base_url('assets/js/') ?>jquery-3.4.1.min.js"></script>