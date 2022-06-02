<section class="barang mt-50 mb-40">
    <a class="ml-30" href="<?= base_url('Status') ?>"><button class="btn"><i class="fas fa-arrow-left"></i></button></a>
    <h2 class="content-center">Detail Pesanan</h2>
    <div class="row">
        <?php foreach ($detail as $dtl) : ?>
            <div class="card-pesanan" id="printableArea">
                <div class="row-xl">
                    <small>Status</small>
                </div>
                <div class="row-xl">
                    <?php
                    if ($dtl->status == 'M') : ?>
                        <p style="font-weight:bold;">Menunggu Konfirmasi</p>
                    <?php elseif ($dtl->status == 'C') : ?>
                        <p style="font-weight:bold;">Sedang Dikemas</p>
                    <?php elseif ($dtl->status == 'K') : ?>
                        <p style="font-weight:bold;">Sedang Dikirim</p>
                    <?php else : ?>
                        <p style="font-weight:bold;">Selesai</p>
                    <?php endif ?></td>
                </div>
                <hr>
                <div class="row-xl">
                    <small>Tanggal Pembelian</small>
                </div>
                <div class="row-xl">
                    <p style="font-weight:bold;"><?= $dtl->tanggal ?></p>
                </div>
                <hr>
                <div class="row-xl">
                    <small>Id Pesanan</small>
                </div>
                <div class="row-xl">
                    <p style="font-weight:bold;"><?= $dtl->id_transaksi ?></p>
                </div>
                <hr>
                <div class="row-xl">
                    <small>Produk</small>
                </div>
                <?php $subtotal = 0;
                foreach ($produk as $prdk) : ?>
                    <div class="row-xl">
                        <p style="font-weight:bold;"><?= $prdk->nama_produk ?> (<?= $prdk->jumlah ?>)</p>
                    </div>
                    <div class="row-xl">
                        <small>Rp. <?= number_format($prdk->harga) ?></small>
                    </div>
                <?php endforeach ?>
                <hr>
                <div class="row-xl">
                    <small style="font-weight: bold;">Detail Pengiriman</small>
                </div>
                <div class="row-xl">
                    <small style="margin-top:10px;">Durasi Pengiriman :</small>
                </div>
                <div class="row-xl">
                    <small style="font-weight: bold;"><?= $dtl->kurir ?> Rp. <?= number_format($dtl->harga_ongkos) ?></small>
                </div>
                <div class="row-xl">
                    <small style="margin-top:10px;">Alamat Pengiriman :</small>
                </div>
                <div class="row-xl">
                    <small style="margin-top:10px; font-weight:bold;"><?= $dtl->nama_penerima ?></small>
                </div>
                <div class="row-xl">
                    <small style="margin-top:10px; font-weight:bold;"><?= $dtl->no_tlp ?></small>
                </div>
                <div class="row-xl">
                    <small style="margin-top:10px; font-weight:bold;"><?= $dtl->alamat ?>, <?= $dtl->kota ?> <?= $dtl->kode_pos ?> </small>
                </div>
                <hr>
                <div class="row-xl">
                    <small style="font-weight: bold;">Informasi Pembayaran</small>
                </div>
                <div class="row-xl">
                    <div class="col" style="margin-top:10px;">
                        <div class=" row-xl">
                            <small>Total Harga</small>
                        </div>
                        <div class="row-xl">
                            <small style="margin-top:10px;">Total Ongkos Kirim</small>
                        </div>
                    </div>
                    <div class="col ml-40">
                        <div class="row-xl">
                            <small style="margin-top:10px; font-weight:bold;">
                                Rp. <?= number_format($dtl->sub_total); ?></small>
                        </div>
                        <div class=" row-xl">
                            <small style="margin-top:10px; font-weight:bold;">Rp. <?= number_format($dtl->harga_ongkos) ?></small>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row-xl">
                </div>
                <div class="row-xl">
                    <div class="col" style="margin-top:10px;">
                        <div class=" row-xl">
                            <small>Total Bayar</small>
                        </div>
                    </div>
                    <div class="col" style="margin-left: 83px;">
                        <div class="row-xl">
                            <small style="margin-top:10px; font-weight:bold;">Rp. <?= number_format($dtl->total_harga) ?></small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>