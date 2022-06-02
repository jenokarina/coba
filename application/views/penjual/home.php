<div class="main">
    <h4>Dashboard</h4>
    <div class="row-xl">
        <div class="card-dash">
            <small class="text-def">Pesanan baru <i class="fas fa-exclamation-circle"></i></small>
            <p class="text-bld text-def" style="font-size: 30px;"><?= $pbaru ?></p>
        </div>
        <div class="card-dash">
            <small class="text-def">Siap dikirim <i class="fas fa-exclamation-circle"></i></small>
            <p class="text-bld text-def" style="font-size: 30px;"><?= $skirim ?></p>
        </div>
        <div class="card-dash">
            <small class="text-def">Selesai <i class="fas fa-exclamation-circle"></i></small>
            <p class="text-bld text-def" style="font-size: 30px;"><?= $selesai ?></p>
        </div>
    </div>
    <div class="row-xl mt-20">
        <div class="card1-dash">
            <?php $pendapatan = 0;
            foreach ($transaksi as $trans) : ?>
                <?php $pendapatan += $trans->total_harga; ?>
            <?php endforeach ?>
            <small class="text-bld text-def">Total Pendapatan <i class="fas fa-exclamation-circle"></i></small>
            <p class="text-bld text-def" style="font-size: 30px;">Rp. <?= number_format($pendapatan) ?></p>
        </div>
    </div>

</div>