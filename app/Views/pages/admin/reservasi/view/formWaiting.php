<div class="table-responsive">
    <table id="add-row" class="display table table-striped table-hover">
        <thead>
        <tr>
            <th>Nama Orangtua</th>
            <th>Status Service</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Nama Orangtua</th>
            <th>Status Service</th>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach($data as $data) :?>
        <tr>
            <td><?php echo $data['nama_orangtua'] ?></td>
            <td><?php echo $data['status_service'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>