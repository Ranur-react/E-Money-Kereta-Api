<script>
    $(function () {
        $('#example1').DataTable()
    })
</script>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <?php echo $this->session->flashdata('msg');
                function convRupiah($value) {
                return 'Rp ' . number_format($value,2,',','.');
                } 

                ?>
                <table id="example1" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr style="background-color: #dd4b39">
                            <th class="text-center">No</th>
                            <th>Tanggal</th>
                            <th>ID Card</th>
                            <th>Nama</th>
                            <th>Saldo</th>
                            <th width="140px" class="text-center" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($data->result_array() as $d) {?>
                        <tr>
                            <td width="40px" class="text-center"><?php echo $no.'.';?></td>
                            <td><?php echo $d['tgl']?></td>
                            <td><?php echo $d['id_card']?></td>
                            <td><?php echo $d['nama']?></td>
                            <td><?php// echo $d['value']?><?php echo convRupiah( $d['value']); ?></td>
                            <td class="text-center" width="70px">
                                <a href="javascript:void(0)" onclick="edit('<?php echo $d['id_card']?>','<?php echo $d['nama']?>','<?php echo $d['value']?>')"><i class="fa fa-edit" style="color: #3c763d"> Edit</i></a>
                            </td>
                            <td class="text-center" width="70px">
                                <a href="javascript:void(0)" onclick="hapus('<?php echo $d['id_card']?>')"><i class="fa fa-trash" style="color: #ea6565"> Hapus</i></a>
                            </td>
                        </tr>
                    <?php $no++; }?>
                    </tbody>
                </table>

    <div class="box-footer">
        <a onload="JavaScript:timedRefresh(100);" href="<?php echo site_url('C_rfid')?>" class="small-box-footer">Reload <i class="fa fa-refresh"></i></a>
                <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
</div>
             </div>
            </div>
        </div>
    </div>
</div>




<script>
    function edit(id_card,nama,value){
        
        $('#eid_card').val(id_card);
        $('#enama').val(nama);
        $('#evalue').val(value);
        $('#edit_data').modal('show');
    }
    function hapus(id,id_card,nama,value){
        $('#hid').val(id);
        $('#hid_card').val(id_card);
        $('#hnama').val(nama);
        $('#hvalue').html(value);
        $('#hapus_data').modal('show');
    }
</script>

<script>
$(function () {
    $('#date').datepicker({
        autoclose: true
    })
});
</script>
<script type="text/JavaScript">
<!--
function timedRefresh(timeoutPeriod) {
    setTimeout("location.reload(true);",timeoutPeriod);
}</script>

<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('C_rfid/add')?>" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>ID Card</label>
                        <input type="text" readonly name="id_card" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>Saldo</label>
                        <input type="text" name="value" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('C_rfid/edit')?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Card</label>
                        <input type="text" name="id_card" id="eid_card" class="form-control">
                    </div>

                     <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" id="enama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Saldo </label>                        
                        <input type="text" name="value" id="evalue" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk"></i> Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_rfid/delete')?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hid">
                    Anda yakin hapus data <strong><span id="hid_card"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
