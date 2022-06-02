<div class="main">
    <a href="<?= base_url('Produk') ?>"><button class="btn btn-primary"><i class="fas fa-arrow-left"></i></button></a>
    <?php foreach ($dproduk as $dprdk) : ?>
        <div class="row-xl mt-60">
            <div class="col-400">
                <div style="background-color: white; height:auto; width:auto; border-radius:20px;box-shadow: 0 0 10px #00000020;">
                    <img class="img-lg border-20" style="margin-top: 50px; margin-bottom:50px; margin-left:20px;display:inline;" src="<?= base_url('assets/img/upload/') . $dprdk->foto ?>" alt="">
                </div>
            </div>
            <div class="col-400" style="margin-left: 100px;">
                <div style="height:auto; width:auto; border-radius:20px;">
                    <div class="row-xl">
                        <h3 class="text-def"><?= $dprdk->nama_produk ?></h3>
                    </div>
                    <div class="row-xl">
                        <h5 style="font-weight:bold;">Rp. <?= $dprdk->harga ?></h5>
                    </div>
                    <div class="row-xl">
                        <button class="btn">
                            Tersisa: <?= $dprdk->stok ?>
                        </button>
                    </div>
                    <div class="row-xl mt-15">
                        <small>
                            <?= $dprdk->deskripsi ?>
                        </small>
                    </div>
                    <br>
                    <a href="<?= base_url('Produk/edit_produk/') . $dprdk->id_produk  ?>"><button class="btn btn-success">Edit Produk</button></a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>