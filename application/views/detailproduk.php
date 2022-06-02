<section class="barang mt-20 mb-50">
    <a class="ml-30" href="<?= base_url('') ?>"><button class="btn"><i class="fas fa-arrow-left"></i></button></a>
    <?php foreach ($dproduk as $dprdk) : ?>
        <div class="row-lg mt-10">
            <div class="col-400 ml-200">
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
                        <h5 style="font-weight:bold; font-size:17px;">Rp. <?= number_format($dprdk->harga) ?></h5>
                    </div>
                    <div class="row-xl">
                        <button class="btn" style="font-size:14px;">
                            Tersisa: <?= $dprdk->stok ?>
                        </button>
                    </div>
                    <div class="row-xl mt-15">
                        <small>
                            <?= $dprdk->deskripsi ?>
                        </small>
                    </div>
                    <?php
                    if ($this->session->userdata('akses') != 'user') : ?>
                        <div class="row-xl mt-50">
                            <a href="<?= base_url('Login') ?>"><button class="btn-keranjang">Login</button></a>
                        </div>
                    <?php else : ?>
                        <?= form_open_multipart('Keranjang/tambah_keranjang') ?>
                        <div class="row-xl mt-30">
                            <input type="number" value="1" min="1" max="<?= $dprdk->stok ?>" class="forminput-number" name="jumlah">
                        </div>
                        <div class="row-xl mt-20">
                            <input type="hidden" value="<?= $user['id_user'] ?>" name="id_user">
                            <input type="hidden" value="<?= $dprdk->id_produk ?>" name="id_produk">
                            <input type="hidden" value="<?= $dprdk->harga ?>" name="harga">
                            <button class="btn-keranjang" type="submit" name="submit"><i class="fas fa-cart-plus"></i> Masukan Keranjang</button>
                            </form>
                        </div>
                    <?php endif ?>

                </div>
            </div>
        </div>
    <?php endforeach ?>
</section>