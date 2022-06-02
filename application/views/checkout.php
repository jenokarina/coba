<section class="barang mt-50 mb-40">
    <?php $grand_total = 0;
    if ($keranjang = $this->cart->contents()) {
        foreach ($keranjang as $item) {
            $grand_total = $grand_total + $item['subtotal'];
        }
    ?>
        <div class="row-lg mt-30 mr-60">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
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
                    </tr>
                <?php endforeach ?>

            </table>

        </div>
        <div class="row-lg mr-60">
            <div class="col-50">
                <div class="card-check">
                    <div class="row-xl mt-20" style="margin-left: 5px; padding-top:10px;">
                        <h2>Format Pengiriman</h2>
                        <?= form_open_multipart('Checkout/pembayaran') ?>
                        <div class="row-xl mb-15">
                            <div class="col-45 mr-10">
                                <small>Nama Penerima</small>
                                <div class="row-xl">
                                    <input type="hidden" class="forminput" value="<?= $grand_total ?>" name="grand_total" readonly>
                                    <input type="hidden" class="forminput" value="<?= $user['saldo'] ?>" name="saldo" readonly>
                                    <input type="hidden" class="forminput" value="<?= $user['id_user'] ?>" name="id_user" readonly>
                                    <input type="text" class="forminput-check" placeholder="Nama Lengkap" name="nama_penerima" required>
                                </div>
                            </div>
                            <div class="col-45">
                                <small>Nomor Telepon</small>
                                <div class="row-xl">
                                    <input type="number" class="forminput-check" placeholder="No Telepon" name="no_tlp" required>
                                </div>
                            </div>
                        </div>
                        <div class="row-xl mb-15">
                            <div class="col-100" style="margin-right:20px;">
                                <small>Kota</small>
                                <div class="row-xl">
                                    <input type="text" class="forminput-check" placeholder="Kota" name="kota" required>
                                </div>
                            </div>
                            <div class="col-100" style="margin-right:20px;">
                                <small>Kode Pos</small>
                                <div class="row-xl">
                                    <input type="number" class="forminput-check" placeholder="Kode Pos" name="kode_pos" required>
                                </div>
                            </div>
                            <div class="col-100">
                                <small>Pengiriman</small>
                                <select class="forminput-check-option" required name="id_ongkir">
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($ongkir as $ongkos) : ?>
                                        <option value="<?= $ongkos->id_ongkir ?>"><?= $ongkos->kurir ?> - Rp. <?= number_format($ongkos->harga_ongkos) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <small for="">Alamat Lengkap</small>
                        <div class="row-xl mb-15">
                            <textarea class="textarea" rows="10" name="alamat" required cols="30" rows="10" placeholder="Dapat diisi dengan nama jalan, nomor rumah, rt/rw"></textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-170">
                <div class="card1-dash ml-50 mt-20">
                    <div class="row-lg">
                        <small class="text-bld text-def">Total yang harus dibayar</small>
                    </div>
                    <div class="row-lg">
                        <p class="text-bld text-def" style="font-size: 30px;">Rp. <?= number_format($grand_total) ?><span> + Ongkir</span></p>
                    </div>
                    <div class="row-lg">
                        <button type="submit" style="background-color: #444444; color:white; border:none; padding:10px; width:100%; border-radius:10px; outline:none;">Bayar</button>
                    </div>
                </div>
                </form>
                <div class="card1-dash ml-50 mt-20">
                    <div class="row-lg">
                        <small class="text-bld text-def">Saldo Anda</small>
                    </div>
                    <div class="row-lg">
                        <p class="text-bld text-def" style="font-size: 30px;">Rp. <?= number_format($user['saldo']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else { {
            echo "<p class='text-bld content-center'>Keranjang Belanja Anda Masih Kosong</p>";
        }
    }
    ?>
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