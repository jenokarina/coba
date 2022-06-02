<div class="main">
    <h4>Form Data Produk</h4>

    <div class="row-xl mt-20">
        <?= form_open_multipart('Produk/input_produk') ?>
        <small for="">Foto Produk</small>
        <div class="row-xl mb-15">
            <input onclick="hide()" class="forminput" type="file" name="foto" accept="image/*" onchange="loadFile(event)" required>
        </div>
        <div class="col-170" id="show">
            <img id="output" class="prev">
            <script>
                var loadFile = function(event) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('output');
                        output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                };
            </script>
        </div>
        <small for="">Nama Produk</small>
        <div class="row-xl mb-15">
            <input class="forminput" name="nama_produk" type="text" placeholder="Nama Produk" required>
        </div>
        <div class="row-xl mb-15">
            <div class="col-200 mr-10">
                <small>Harga Produk</small>
                <div class="row-xl">
                    <input class="forminput-sm" name="harga" type="number" placeholder="Harga" required>
                </div>
            </div>
            <div class="col-200">
                <small>Stok Produk</small>
                <div class="row-xl">
                    <input class="forminput-sm" name="stok" type="number" placeholder="stok" required>
                </div>
            </div>
        </div>
        <small for="">Deskripsi Produk</small>
        <div class="row-xl mb-15">
            <textarea rows="10" name="deskripsi" cols="30" rows="10" placeholder="Deskripsi" required></textarea>
        </div>
        <div class="row-xl mb-40">
            <a href="<?= base_url('Produk') ?>">
                <div class="btn btn-danger mr-10">Batal</div>
            </a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>

</div>