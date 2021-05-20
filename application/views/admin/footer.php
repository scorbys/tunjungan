            
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 0.1.2020
                </div>
                <strong>Copyright &copy; 2020 <a href="#" target="_blank">tunjungan</a>.</strong> All rights
                reserved.
		    </footer>
        </div>
      <!-- /.tab-pane -->
    </div>
</aside>
<!-- ./wrapper -->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="template/jquery-ui.js"></script>
<script src="template/select2/dist/js/select2.full.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
<script src="template/template.js"></script>
<script src="template/ckeditor/ckeditor.js"></script>
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
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false ,
      'scrollX'     : true
    })
  })
</script>
<script>
  $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  })
</script>
<script>
  $(function () {
    CKEDITOR.replace('editor2')
    $('.textarea').wysihtml5()
  })
</script>
<script>
  $(function () {
    CKEDITOR.replace('editor3')
    $('.textarea').wysihtml5()
  })
</script>
<script>
  $(function () {
    CKEDITOR.replace('editor4')
    $('.textarea').wysihtml5()
  })
</script>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#no_anggota').autocomplete({
      source: "admin/simpanan/cari_anggota",
      select: function (event, ui) {
        $('[name="no_anggota"]').val(ui.item.label);
        $('[name="id_user"]').val(ui.item.id_user);
        $('[name="nama_anggota"]').val(ui.item.nama_anggota);
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#barcode').autocomplete({
      source: "admin/home/cari_produk",
      select: function (event, ui) {
        $('[name="id_produk"]').val(ui.item.id_produk);
        $('[name="barcode"]').val(ui.item.label);
        $('[name="nama_produk"]').val(ui.item.nama_produk);
        $('[name="harga"]').val(ui.item.harga);
        $('[name="harga_grosir"]').val(ui.item.harga_grosir);
        $('[name="foto"]').val(ui.item.foto);
        $('[name="poin"]').val(ui.item.poin);
        $('[name="stok"]').val(ui.item.stok);
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#barcodenya').autocomplete({
      source: "admin/penerimaan/cari_produk/<?= $id_pembelian ?>",
      select: function (event, ui) {
        $('[name="id_produk"]').val(ui.item.id_produk);
        $('[name="barcode"]').val(ui.item.label);
        $('[name="nama_produk"]').val(ui.item.nama_produk);
        $('[name="harga_beli"]').val(ui.item.harga_beli);
        $('[name="harga"]').val(ui.item.harga);
        $('[name="harga_grosir"]').val(ui.item.harga_grosir);
        $('[name="jumlah"]').val(ui.item.qty);
      }
    });
  });
</script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#nama_produk').autocomplete({
      source: "admin/home/cari_produk2",
      select: function (event, ui) {
        $('[name="id_produk"]').val(ui.item.id_produk);
        $('[name="nama_produk"]').val(ui.item.label);
        $('[name="barcode"]').val(ui.item.barcode);
        $('[name="harga"]').val(ui.item.harga);
        $('[name="harga_grosir"]').val(ui.item.harga_grosir);
        $('[name="foto"]').val(ui.item.foto);
        $('[name="poin"]').val(ui.item.poin);
        $('[name="stok"]').val(ui.item.stok);
      }
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.provinsi').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "admin/anggota/kabupaten",
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
        $('.tukar').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "admin/poin/cari",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_hadiah+'>'+data[i].deskripsi+'</option>';
                    }
                    $('.diskon').html(html);
                    
                }
            });
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $('.propinsi').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "admin/anggota/kabupaten",
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
                url : "admin/anggota/kecamatan",
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
                url : "admin/anggota/kelurahan",
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

    
$(document).ready(function() {
	$('#butsave').on('click', function() {
		var tanggalf    = $('#tanggalf').val();
		var nofaktur    = $('#nofaktur').val();
		var id_supplier = $('#id_supplier').val();
		var operator    = $('#operator').val();
		var idbarangitembeli = $('#idbarangitembeli').val();
		var namaitembeli = $('#namaitembeli').val();
		var qtybeli      = $('#qtybeli').val();
		var hargabeli    = $('#hargabeli').val();
		var hargaitembeli  = $('#hargaitembeli').val();
		var idbarangitembeli = $('#idbarangitembeli').val();
		var idbarangitembeli = $('#idbarangitembeli').val();
		var idbarangitembeli = $('#idbarangitembeli').val();
		if(hargabeli!="" && hargabeli!="" && hargabeli!="" && hargabeli!=""){
			$("#butsave").attr("disabled", "disabled");
			$.ajax({
				url: "<?php echo base_url("admin/pembelian/savedata");?>",
				type: "POST",
				data: {
					type: 1,
					hargabeli: hargabeli 
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled"); 
						$("#success").show(); 
            $.ajax({
                type  : 'ajax',
                url   : 'admin/pembelian/data_barang',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            }); 
					} 
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
$(document).ready(function(){
        tampil_data_barang();    
        $('#detilitembeli').dataTable(); 
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : 'admin/pembelian/data_barang',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '<td>'+data[i].ongkir+'</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
    });

</script>

</body>
</html>
