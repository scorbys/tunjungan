            
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 0.1.2020
                </div>
                <strong>Copyright &copy; 2020 <a href="https://tunjungan.com/" target="_blank">KUD Tunjungan</a>.</strong> All rights
                reserved.
		    </footer>
        </div>
      <!-- /.tab-pane -->
    </div>
</aside>
<!-- ./wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog" style="width:60%; margin-top:15%;">
    <div class="modal-content">
      <form action="keanggotaan/transaksi/input" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>Pembayaran Baru</b></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Simpanan</label>
                <select name="simpanan" class="form-control" required>
                  <option value="1">Simpanan Sukarela</option>
                  <option value="2">Simpanan Wajib</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">No. Anggota</label>
                <input type="text" name="no_anggota" id="no_anggota" class="form-control" placeholder="No. Anggota" required>
                <input type="hidden" name="id_user" id="id_user" class="form-control" placeholder="No. Anggota" required>
              </div>
              <div class="form-group">
                <label for="">Nama Anggota</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Anggota" readonly>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- <div class="form-group">
                <label for="">Kode Pembayaran</label>
                <input type="text" name="kode" class="form-control" placeholder="Kode Pembayaran" required>
              </div> -->
              <div class="form-group">
                <label for="">Tgl. Pembayaran</label>
                <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required>
              </div>
              <div class="form-group">
                <label for="">Nominal (Rp)</label>
                <input type="text" name="nominal" class="form-control"  id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Nominal (Hanya Angka)" required>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="">Kecamatan</label>
                <input type="text" name="kecamatan" class="form-control" placeholder="Nama Kecamatan" readonly>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="">Desa</label>
                <input type="text" name="kelurahan" class="form-control" placeholder="Nama Kelurahan" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-anggota">
  <div class="modal-dialog" style="width:60%; margin-top:5%;">
    <div class="modal-content">
      <form action="keanggotaan/anggota/aksi_tambah" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b><i class="fa fa-users"></i> Anggota Baru</b></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">No. Anggota</label>
                <input type="text" name="no_anggota" class="form-control" placeholder="No. Anggota">
              </div>
              <div class="form-group">
                <label for="">Nama Anggota</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Anggota" required>
              </div>
            </div>  
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">No. KTP</label>
                <input type="text" name="ktp" class="form-control" placeholder="No. KTP">
              </div>
            </div>  
            <div class="col-lg-3">
              <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>            
            <div class="col-lg-3">
              <div class="form-group">
                <label for="">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
              </div>
            </div>  
          </div>
          <div class="row">          
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Provinsi</label>
                <select name="id_provinsi" class="form-control provinsi">
                  <option value="" style="display:none;">Pilih Provinsi</option>
                  <option value="2">Jawa Tengah</option>
                  <option value="3">ALB</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Kabupaten</label>
                <select name="id_kabupaten" class="form-control kabupaten">
                  <option value="" style="display:none;">Pilih Kabupaten</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Kecamatan</label>
                <select name="id_kecamatan" class="form-control kecamatan">
                  <option value="" style="display:none;">Pilih Kecamatan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Desa</label>
                <select name="id_kelurahan" class="form-control kelurahan">
                  <option value="" style="display:none;">Pilih Desa</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">No. HP</label>
                <input type="text" name="no_hp" class="form-control" placeholder="No. HP">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" placeholder="alamatemail@gmail.com" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Tgl. Registrasi</label>
                <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required>
              </div>
            </div> 
            <div class="col-lg-3">
              <div class="form-group">
                <label for="">RT</label>
                <input type="text" name="rt" placeholder="RT" class="form-control">
              </div>
            </div>      
            <div class="col-lg-3">
              <div class="form-group">
                <label for="">RW</label>
                <input type="text" name="rw" placeholder="RW" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-pengguna">
  <div class="modal-dialog" style="width:60%; margin-top:5%;">
    <div class="modal-content">
      <form action="keanggotaan/pengguna/aksi_tambah" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b><i class="fa fa-users"></i> Pengguna Sistem Baru</b></h4>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">Nama Pengurus</label>
                      <input type="text" name="nama" class="form-control" placeholder="Pengurus" required>
                  </div>
                  <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Username" required>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">Kata Sandi</label>
                      <input type="password" name="password" class="form-control" placeholder="********" minlength="8" maxlength="15" required>
                  </div>
                  <div class="form-group">
                      <label for="">Nama Jabatan</label>
                      <select name="level" class="form-control" required>
                          <option value="1">Admin KUD Tunjungan</option>
                          <option value="2" selected>Kasir KUD Tunjungan</option>
                          <!--<option value="3">Keanggotaan</option>-->
                      </select>
                  </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="template/jquery-ui.js"></script>
<script src="template/select2/dist/js/select2.full.min.js"></script>
<script src="template/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="template/template.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="template/fastclick/lib/fastclick.js"></script>
<script src="template/ckeditor/ckeditor.js"></script>
<script src="template/js/demo.js"></script>

<script>
  // Build the chart
  Highcharts.chart('chart-anggota', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    exporting: {
      buttons: {
        contextButton: {
            enabled: false
        }
      }
    },
    credits: {
      enabled: false
    },
    title: {
      text: 'Jumlah Anggota'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.y} anggota</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: false
        },
        showInLegend: true
      }
    },
    series: [{
      name: 'Anggota',
      colorByPoint: true,
      data: [
        <?php foreach($this->db->query("SELECT if(status='Y','Aktif','Tidak Aktif') AS status,count(id_user) AS jumlah_anggota FROM tbl_user GROUP BY status ORDER BY status")->result() as $a) : ?>
        {
          name: '<?= $a->status ?>',
          y: <?= $a->jumlah_anggota ?>
        },
        <?php endforeach ?>
      ]
    }]
  });
</script>

<script>
  Highcharts.chart('simpanan-anggota', {
  chart: {
    type: 'column'
  },
  exporting: {
      buttons: {
        contextButton: {
            enabled: false
        }
      }
    },
    credits: {
      enabled: false
    },
    title: {
      text: 'Kondisi Simpanan Anggota'
    },
    subtitle: {
      text: 'Source: www.KUD Tunjungan.com'
    },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    crosshair: true
  },
  yAxis: {
    title: {
      text: 'Rupiah (Rp.)'
    }
  },
  series: [{
      name: 'Simpanan Pokok',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    }, {
      name: 'Simpanan Wajib',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    }, {
      name: 'Simpanan Sukarela',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    }]
  });
</script>

<script>
  $('#modal-default').modal({backdrop: 'static', keyboard: true,show: false}) 
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable()
    $('#example4').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'scrollX'     : false
    })
    $('#example3').DataTable()
  })
</script>
<script>
  $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  })
</script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#no_anggota').autocomplete({
        source: "keanggotaan/transaksi/cari_anggota",
        select: function (event, ui) {
          $('[name="no_anggota"]').val(ui.item.label);
          $('[name="id_user"]').val(ui.item.id_user);
          $('[name="nama"]').val(ui.item.nama);
          $('[name="kelurahan"]').val(ui.item.kelurahan);
          $('[name="kecamatan"]').val(ui.item.kecamatan);
          $('[name="rt"]').val(ui.item.rt);
          $('[name="rw"]').val(ui.item.rw);
          $('[name="id_firebase"]').val(ui.item.id_firebase);
        }
      });
    });
  </script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.provinsi').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "keanggotaan/anggota/kabupaten",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_kabupaten+'>'+data[i].kabupaten+'</option>';
                    }
                    $('.kabupaten').html(html);
                    
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.kabupaten').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "keanggotaan/anggota/kecamatan",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_kecamatan+'>'+data[i].kecamatan+'</option>';
                    }
                    $('.kecamatan').html(html);
                    
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.kecamatan').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "keanggotaan/anggota/kelurahan",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_kelurahan+'>'+data[i].kelurahan+'</option>';
                    }
                    $('.kelurahan').html(html);
                    
                }
            });
        });
    });
</script>

<script language="javascript">
  function hanyaAngka(e, decimal) {
    var key;
    var keychar;
    if (window.event) {
      key = window.event.keyCode;
    } else
      if (e) {
        key = e.which;
      } else return true;

      keychar = String.fromCharCode(key);
      if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
        return true;
      } else
        if ((("0123456789").indexOf(keychar) > -1)) {
        return true;
      } else
        if (decimal && (keychar == ".")) {
          return true;
        } else return false;
  }
</script>

<script>
    function tandaPemisahTitik(b) {
        var _minus = false;
        if (b < 0) _minus = true;
        b = b.toString();
        b = b.replace(".", "");
        b = b.replace("-", "");
        c = "";
        panjang = b.length;
        j = 0;
        for (i = panjang; i > 0; i--) {
            j = j + 1;
            if (((j % 3) == 1) && (j != 1)) {
                c = b.substr(i - 1, 1) + "." + c;
            } else {
                c = b.substr(i - 1, 1) + c;
            }
        }
        if (_minus) c = "-" + c;
        return c;
    }
    
    function numbersonly(ini, e) {
        if (e.keyCode >= 49) {
            if (e.keyCode <= 57) {
                a = ini.value.toString().replace(".", "");
                b = a.replace(/[^\d]/g, "");
                b = (b == "0") ? String.fromCharCode(e.keyCode) : b + String.fromCharCode(e.keyCode);
                ini.value = tandaPemisahTitik(b);
                return false;
            } else if (e.keyCode <= 105) {
                if (e.keyCode >= 96) {
                    //e.keycode = e.keycode - 47;
                    a = ini.value.toString().replace(".", "");
                    b = a.replace(/[^\d]/g, "");
                    b = (b == "0") ? String.fromCharCode(e.keyCode - 48) : b + String.fromCharCode(e.keyCode - 48);
                    ini.value = tandaPemisahTitik(b);
                    //alert(e.keycode);
                    return false;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else if (e.keyCode == 48) {
            a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode);
            b = a.replace(/[^\d]/g, "");
            if (parseFloat(b) != 0) {
                ini.value = tandaPemisahTitik(b);
                return false;
            } else {
                return false;
            }
        } else if (e.keyCode == 95) {
            a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode - 48);
            b = a.replace(/[^\d]/g, "");
            if (parseFloat(b) != 0) {
                ini.value = tandaPemisahTitik(b);
                return false;
            } else {
                return false;
            }
        } else if (e.keyCode == 8 || e.keycode == 46) {
            a = ini.value.replace(".", "");
            b = a.replace(/[^\d]/g, "");
            b = b.substr(0, b.length - 1);
            if (tandaPemisahTitik(b) != "") {
                ini.value = tandaPemisahTitik(b);
            } else {
                ini.value = "";
            }
    
            return false;
        } else if (e.keyCode == 9) {
            return true;
        } else if (e.keyCode == 17) {
            return true;
        } else {
            //alert (e.keyCode);
            return false;
        }
    
    }
</script>

</body>
</html>
