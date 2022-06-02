    <section class="barang mt-80">
        <?= $this->session->flashdata('message') ?>
        <h1 class="text-def content-center">Featured Products</h1>
        <div class="row mt-50">
            <?php foreach ($produk as $prdk) : ?>
                <a href="<?= base_url('Produk/detailproduk/') . $prdk->id_produk ?>" class="text-def">
                    <div class="card">
                        <img src="<?= base_url('assets/img/upload/') . $prdk->foto ?>" class="card-img">
                        <div class="card-body">
                            <small><?= $prdk->nama_produk ?></small>
                            <p>Rp. <?= number_format($prdk->harga) ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </section>