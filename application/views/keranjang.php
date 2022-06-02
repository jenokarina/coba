<section class="barang mt-50 mb-40">
    <?= $this->session->flashdata('message') ?>
    <div class="row-lg mt-30 mr-60">
        <div class="col-60">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                $totalbayar = 0;
                foreach ($this->cart->contents() as $items) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $items['name'] ?></td>
                        <td><?= number_format($items['price']) ?></td>
                        <td><?= $items['qty'] ?></td>
                        <td><?= number_format($items['subtotal']) ?></td>
                        <td><a class="btn" style="color:red;" href="<?= base_url('Keranjang/hapus_keranjang/') . $items['rowid'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php endforeach ?>

            </table>
        </div>
        <div class="col-170 mr-50">
            <div class="card1-dash ml-50">
                <div class="row-lg">
                    <small class="text-bld text-def">Total harga</small>
                </div>
                <div class="row-lg">
                    <p class="text-bld text-def" style="font-size: 30px;">Rp. <?= number_format($this->cart->total()) ?></p>
                </div>
                <div class="row-lg">
                    <a href="<?= base_url('Checkout') ?>"><button style="background-color: #444444; color:white; border:none; padding:10px; width:100%; border-radius:10px; outline:none;">Beli</button></a>
                </div>
            </div>
        </div>
        <a href="<?= base_url('') ?>" class="btn btn-primary">Lanjut Belanja</a>

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