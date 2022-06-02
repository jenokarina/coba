<div class="main">
    <a class="ml-30" href="<?= base_url('Siapdikirim') ?>"><button class="btn"><i class="fas fa-arrow-left"></i></button></a>
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
                        <small style="font-weight:bold;">Menunggu Konfirmasi</small>
                    <?php elseif ($dtl->status == 'C') : ?>
                        <small style="font-weight:bold;">Sedang Dikemas</small>
                    <?php elseif ($dtl->status == 'K') : ?>
                        <small style="font-weight:bold;">Sedang Dikirim</small>
                    <?php else : ?>
                        <small style="font-weight:bold;">Selesai</small>
                    <?php endif ?></td>
                </div>
                <hr>
                <div class="row-xl">
                    <small>Tanggal Pembelian</small>
                </div>
                <div class="row-xl">
                    <small style="font-weight:bold;"><?= $dtl->tanggal ?></small>
                </div>
                <hr>
                <div class="row-xl">
                    <small>Id Pesanan</small>
                </div>
                <div class="row-xl">
                    <small style="font-weight:bold;"><?= $dtl->id_transaksi ?></small>
                </div>
                <hr>
                <div class="row-xl">
                    <small>Produk</small>
                </div>
                <?php $subtotal = 0;
                foreach ($produk as $prdk) : ?>
                    <div class="row-xl">
                        <small style="font-weight:bold;"><?= $prdk->nama_produk ?> (<?= $prdk->jumlah ?>)</small>
                    </div>
                    <div class="row-xl">
                        <small>Rp. <?= number_format($prdk->harga) ?></small>
                    </div>
                <?php endforeach ?>
                <hr>
                <div id="formatpengiriman">
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
                <input type="button" class="btn btn-primary mt-20" onclick="printDiv('formatpengiriman')" value="Cetak Format Pengiriman" />
            </div>
        <?php endforeach ?>
    </div>
</div>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>