<div class="table-responsive">
    <table id="add-row" class="display table table-striped table-hover">
        <thead>
        <tr>
            <th>Nama Orangtua</th>
            <th>Whatsapp</th>
            <th>Nama Produk</th>
            <th>Durasi</th>
            <th>Jam</th>
            <th>Nama Anak</th>
            <th>Harga</th>
            <th style="width: 10%">Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Nama Orangtua</th>
            <th>Whatsapp</th>
            <th>Nama Produk</th>
            <th>Durasi</th>
            <th>Jam</th>
            <th>Nama Anak</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach($data as $data) : ?>
        <tr>
            <td><?php echo $data['nama_orangtua'] ?></td>
            <td><?php echo $data['no_whatsapp'] ?></td>
            <td><?php echo $data['nama_produk'] ?></td>
            <td><?php echo $data['durasi'] ?> Menit</td>
            <td><?php echo $data['jam'] ?></td>
            <td><?php echo $data['nama_anak'] ?></td>
            <td><?php echo $data['harga'] ?></td>
            <td>
            <div class="form-button-action">
                <button
                type="button"
                onclick="hapusReservasi('<?=$data['id']?>')"
                data-toggle="tooltip"
                class="btn btn-link btn-danger"
                data-original-title="Remove"
                >
                <i class="fa fa-times"></i>
                </button>
            </div>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>