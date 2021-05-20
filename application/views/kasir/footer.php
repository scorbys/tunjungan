            
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 0.1.2020
                </div>
                <strong>Copyright &copy; 2020 <a href="https://7indora.com/" target="_blank">KUD Tunjungan</a>.</strong> All rights
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
      <form action="kasir/home/pembayaran" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>Pembayaran Baru</b></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Kode Pembayaran</label>
                <input type="text" name="kode" class="form-control" placeholder="Kode Pembayaran" required>
              </div>
              <div class="form-group">
                <label for="">No. Anggota</label>
                <input type="text" name="" class="form-control" placeholder="No. Anggota" required>
              </div>
              <div class="form-group">
                <label for="">Nama Anggota</label>
                <input type="text" name="" class="form-control" placeholder="Nama Anggota" readonly>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Tgl. Pembayaran</label>
                <input type="date" name="kode" class="form-control" value="<?= date('Y-m-d') ?>" required>
              </div>
              <div class="form-group">
                <label for="">Simpanan</label>
                <select name="simpanan" class="form-control" required>
                  <option value="1">Simpanan Sukarela</option>
                  <option value="2">Simpanan Wajib</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Nominal (Rp)</label>
                <input type="text" name="nominal" class="form-control"  id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Nominal (Hanya Angka)" required>
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
<script src="template/iCheck/icheck.min.js"></script>
<script src="template/input-mask/jquery.inputmask.js"></script>
<script src="template/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="template/input-mask/jquery.inputmask.extensions.js"></script>
<script src="template/bootstrap-slider/bootstrap-slider.js"></script>
<script src="template/java.js"></script>

<script>
//kumpulan array nomor bisa diedit sendiri
var telkomsel = ["0812", "0813", "0821", "0822", "0852", "0853", "0822", "0823", "0851"];
var indosat = ["0814", "0815", "0816", "0855", "0856", "0857", "0858"];
var three = ["0895", "0896", "0897", "0898", "0899"];
var smartfren = ["0881", "0882", "0883", "0884", "0885", "0886", "0887", "0888", "0889"];
var xl = ["0817", "0818", "0819", "0859", "0877", "0878"];
var axis = ["0838", "0831", "0832", "0833"];
//kumpulan array nomor bisa diedit sendiri

$(document).on('keyup', '.notelp', ceknomor); //fungsi ceknomor dipanggil saat memasukkan input

function ceknomor() {
    $('.errtelp').empty();
    var ambilno = $('.notelp').val();
    var panjangno = ambilno.length;
    var t;
    if (panjangno >= 4 && panjangno <= 12) { //kondisi dimana panjang no hp harus 10 samapi 12 karakter selain itu di block elsenya baris 88
        t = ambilno.substring(0, 4);
        //proses pengecekan masing-masing array no
        var a = telkomsel.length;
        var b = 0;
        var kondisi = true;
        //bukannomor=true;
        while (b < a) {
            if (telkomsel[b] == t) {
                $('.notelp').css({
                    "background-image": "url(<?= base_url('img/gambar/telkomsel.png') ?>)"
                });

                kondisi = false;
            }++b;
        }
        //jika menemukan salah satu nomor dari didalam array, maka tidak akan mengecek array lainnya indikatornya adalah variable kondisi
        a = indosat.length;
        b = 0;
        while (b < a && kondisi) {
            if (indosat[b] == t) {
                $('.notelp').css({
                    "background-image": "url(<?= base_url('img/gambar/indosat.png') ?>)"
                }); //menampilkan logo operator
                kondisi = false;
            }++b;
        }

        a = three.length;
        b = 0;
        while (b < a && kondisi) {
            if (three[b] == t) {
                $('.notelp').css({
                    "background-image": "url(<?= base_url('img/gambar/three.png') ?>)"
                });
                kondisi = false;
            }++b;
        }
        a = smartfren.length;
        b = 0;
        while (b < a && kondisi) {
            if (smartfren[b] == t) {
                $('.notelp').css({
                    "background-image": "url(<?= base_url('img/gambar/smartfren.png') ?>)"
                });
                kondisi = false;
            }++b;
        }
        a = xl.length;
        b = 0;
        while (b < a && kondisi) {
            if (xl[b] == t) {
                $('.notelp').css({
                    "background-image": "url(<?= base_url('img/gambar/xl.png') ?>)"
                });
                kondisi = false;
            }++b;
        }
        a = axis.length;
        b = 0;
        while (b < a && kondisi) {
            if (axis[b] == t) {
                $('.notelp').css({
                    "background-image": "url(<?= base_url('img/gambar/axis.png') ?>)"
                });
                kondisi = false;
            }++b;
        }
        //proses pengecekan masing-masing array no berakhir

        //selanjutnya kondisi dimana jika nomor tidak ditemukan atau nomor terlalu panjang
        if (kondisi) {
            blocktombol();
            gambaroperatorhilang();
        } else if (panjangno >= 10 && panjangno <= 12) {
            bukablocktombol();
        } else {
            blocktombol();
        }
    } else {
        blocktombol();
        gambaroperatorhilang();
    }
}
//fungsi sesuai namanya bisa dipahami sendiri
function blocktombol() {
    $('.tombol').prop("disabled", true);
}

function bukablocktombol() {
    $('.tombol').prop("disabled", false);
}

function gambaroperatorhilang() {
    $('.notelp').css({
        "background-image": "url()"
    });
}
//fungsi sesuai namanya bisa dipahami sendiri ditutup


function isNumberKey(evt) //fungsi block, untuk tidak boleh memesukkan input selain angka, fungsi dipanggil pada htm di onkeypress
{
    var kodeASCII = (evt.which) ? evt.which : event.keyCode
    if (kodeASCII > 31 && (kodeASCII < 48 || kodeASCII > 57)) {
        return false;
    }
    return true;
}
</script>

<script>
(function() {
"use strict";

var supportsMultiple = self.HTMLInputElement && "valueLow" in HTMLInputElement.prototype;

var descriptor = Object.getOwnPropertyDescriptor(HTMLInputElement.prototype, "value");

self.multirange = function(input) {
	if (supportsMultiple || input.classList.contains("multirange")) {
		return;
	}

	var value = input.getAttribute("value");
	var values = value === null ? [] : value.split(",");
	var min = +(input.min || 0);
	var max = +(input.max || 100);
	var ghost = input.cloneNode();

	input.classList.add("multirange", "original");
	ghost.classList.add("multirange", "ghost");

	input.value = values[0] || min + (max - min) / 2;
	ghost.value = values[1] || min + (max - min) / 2;

	input.parentNode.insertBefore(ghost, input.nextSibling);

	Object.defineProperty(input, "originalValue", descriptor.get ? descriptor : {
		// Fuck Safari >:(
		get: function() { return this.value; },
		set: function(v) { this.value = v; }
	});

	Object.defineProperties(input, {
		valueLow: {
			get: function() { return Math.min(this.originalValue, ghost.value); },
			set: function(v) { this.originalValue = v; },
			enumerable: true
		},
		valueHigh: {
			get: function() { return Math.max(this.originalValue, ghost.value); },
			set: function(v) { ghost.value = v; },
			enumerable: true
		}
	});

	if (descriptor.get) {
		
		Object.defineProperty(input, "value", {
			get: function() { return this.valueLow + "," + this.valueHigh; },
			set: function(v) {
				var values = v.split(",");
				this.valueLow = values[0];
				this.valueHigh = values[1];
				update();
			},
			enumerable: true
		});
	}

	if (typeof input.oninput === "function") {
		ghost.oninput = input.oninput.bind(input);
	}

	function update() {
		ghost.style.setProperty("--low", 100 * ((input.valueLow - min) / (max - min)) + 1 + "%");
		ghost.style.setProperty("--high", 100 * ((input.valueHigh - min) / (max - min)) - 1 + "%");
	}

	input.addEventListener("input", update);
	ghost.addEventListener("input", update);

	update();
}

multirange.init = function() {
	[].slice.call(document.querySelectorAll("input[type=range][multiple]:not(.multirange)")).forEach(multirange);
}

if (document.readyState == "loading") {
	document.addEventListener("DOMContentLoaded", multirange.init);
}
else {
	multirange.init();
}

})();
</script>
<script>
  function sum() {
    var txtFirstNumberValue = document.getElementById('nominal').value;
    var txtSecondNumberValue = document.getElementById('biaya').value;
    var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
    if (!isNaN(result)) {
      document.getElementById('kembali').value = result;
    }
  }
</script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<script>
  $('#modal-default').modal({backdrop: 'static', keyboard: true,show: false}) 
</script>

<script type="text/javascript">
  var dateToday = new Date();
  var dates = $("#from, #to").datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      minDate: dateToday,
      onSelect: function(selectedDate) {
          var option = this.id == "from" ? "minDate" : "maxDate",
              instance = $(this).data("datepicker"),
              date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
          dates.not(this).datepicker("option", option, date);
      }
  });
</script>

<script>
  var typeText = {
	adult : {
  	singular: 'Dewasa', plural: 'Dewasa'
  },
	infant : {
  	singular: 'Bayi', plural: 'Bayi'
  }
}
$(function () { 
    var $popover = $('.popover-markup>.trigger').popover({
      html: true,
      placement: 'bottom',
      content: function () {
          return $(this).parent().find('.content').html();
      }
    });

    // open popover & inital value in form
    var passengers = [1,0,0];
    $('.popover-markup>.trigger').click(function (e) {
        e.stopPropagation();
        $(".popover-content input").each(function(i) {
            $(this).val(passengers[i]);
        });
    });
    // close popover
    $(document).click(function (e) {
        if ($(e.target).is('.demise')) {        
            $('.popover-markup>.trigger').popover('hide');
        }
    });
// store form value when popover closed
 $popover.on('hide.bs.popover', function () {
    $(".popover-content input").each(function(i) {
        passengers[i] = $(this).val();
    });
  });
    // spinner(+-btn to change value) & total to parent input 
    $(document).on('click', '.number-spinner a', function () {
        var btn = $(this),
        input = btn.closest('.number-spinner').find('input'),
        total = $('#passengers').val(),
        oldValue = input.val().trim();
        adult = $('#adult').val();

    if (btn.attr('data-dir') == 'up') {
      if(oldValue < input.attr('max')){
        oldValue++;
        total++;
      }
    } else {
      if (oldValue > input.attr('min')) {
        oldValue--;
        total--;
      }
    }
    $('#passengers').val(total);
    input.val(oldValue);
    passangerInfoText = [];
    $(".popover-content input").each(function(i) {
        if(this.value > 0){
        	passangerInfoText.push(typeText[this.id][this.value>1?'plural':'singular'] + ': ' + this.value);
        }
    });
    $('#passanger-info').val(passangerInfoText.join(', '))
  });
  $(".popover-markup>.trigger").popover('hidden');
});
</script>

<script>
  $(function () {
    $('.select2').select2()
  })
</script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example4').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
      'scrollX'     : false
    })
    $('#example3').DataTable({
      'scrollX'     : true
    })
  })
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#no_anggota').autocomplete({
      source: "kasir/transaksi/cari_anggota",
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
    $('#barcode').autocomplete({
      source: "kasir/home/cari_produk",
      select: function (event, ui) {
        $('[name="id_produk"]').val(ui.item.id_produk);
        $('[name="barcode"]').val(ui.item.label);
        $('[name="nama_produk"]').val(ui.item.nama_produk);
        $('[name="harga"]').val(ui.item.harga);
        $('[name="foto"]').val(ui.item.foto);
        $('[name="poin"]').val(ui.item.poin);
        $('[name="deskripsi"]').val(ui.item.deskripsi);
        $('[name="diskon"]').val(ui.item.diskon);
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#nama_produk').autocomplete({
      source: "kasir/home/cari_produk2",
      select: function (event, ui) {
        $('[name="id_produk"]').val(ui.item.id_produk);
        $('[name="nama_produk"]').val(ui.item.label);
        $('[name="barcode"]').val(ui.item.barcode);
        $('[name="harga"]').val(ui.item.harga);
        $('[name="foto"]').val(ui.item.foto);
        $('[name="poin"]').val(ui.item.poin);
        $('[name="deskripsi"]').val(ui.item.deskripsi);
        $('[name="diskon"]').val(ui.item.diskon);
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#provider').autocomplete({
      source: "kasir/ppob/cari_provider",
      select: function (event, ui) {
        $('[name="img_provider"]').val(ui.item.img_provider);
      }
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.provinsi').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "anggota/kabupaten",
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
    $(document).ready(function() {
        $("#jumlah, #harga").keyup(function() {
            var harga  = $("#harga").val();
            var jumlah = $("#jumlah").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.tukar').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "poin/cari",
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
                url : "anggota/kabupaten",
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
                url : "anggota/kecamatan",
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
                url : "anggota/kelurahan",
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
