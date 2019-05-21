<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Sipirang</title>
  <link rel="icon" type="image/gif" href="<?php echo base_url() ?>admin-asset/foto/jateng-icon.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <?php $this->load->view('admin/componen/load-css'); ?>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- load header -->
  <?php
    $this->load->view('admin/componen/header-nav'); 
    $this->load->view('admin/componen/aside');
  ?>

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php
              if($page=="beranda"){
                echo '<h1 class="m-0 text-dark judul-konten">Beranda</h1>';
              }else{
                echo '<h1 class="m-0 text-dark judul-konten">'.$title.'</h1>';
              }
            ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- <div class="row">
        </div> -->
        
        <?php
            if($page=="beranda"){
              $data['num']=$num;
              $this->load->view('admin/isi-beranda');
            }elseif($page=="barang"){
              $data['table']=$table;
              $this->load->view('admin/barang',$data);
            }
            elseif($page=="gmbr-brg"){
              // var_dump($table);
              $data['table']=$table;
              $this->load->view('admin/gambar-brg',$data);
            }
            elseif($page=="gmbr-agt"){
              $data['table']=$table;
              $this->load->view('admin/gambar-agt',$data);
            }
            // ===
            elseif($page=="semua-anggota"){
              $data['table']=$table;
              $this->load->view('admin/anggota',$data);
            }
            elseif($page=="peng-anggota"){
              $data['table']=$table;
              $this->load->view('admin/pengaturan-akun',$data);
            }
            elseif($page=="record"){
              $data['table']=$table;
              $this->load->view('admin/record',$data);
            }
            elseif($page=="pinjam"){
              $this->load->view('admin/pinjam');
            }
            elseif($page=="kembali"){
              $this->load->view('admin/kembali');
            }
        ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    $this->load->view('admin/componen/footer');
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
  $this->load->view('admin/componen/load-js');
  $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
  echo $link;
?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script> -->
<script>
  // =========== Manajemen Page =============
  var page="<?= $page ?>";
  if(page=="beranda"){
    $("#beranda").attr('class', 'nav-link active');
  }
  // barang
  else if(page=="barang"){
    $("#barang").attr('class', 'nav-link active');
    $(document).ready(function(){
      $(document).on('click','.edit_brg',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var action = 'fetchSingleRow';
        $.ajax({
          type : "POST",
          url  : "<?php echo base_url().'admin/get_brg/'?>"+id,
          data : {id: id},
          success: function(data){
            var json = data,
            obj = JSON.parse(json);
            // console.log(obj);
            $("#id_brg").val(obj.id);
            $("#e_nm_brg").val(obj.nm_brg);
            $("#e_merk").val(obj.merk);
            $("#e_kate").val(obj.kategori);
            $("#e_tgl_masuk").val(obj.tgl_masuk);
            $("#e_spek").val(obj.spek);
          }
        });
      });
    });

    $(document).ready(function(){
      $(document).on('click','#detail',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
          type : "POST",
          url  : "<?php echo base_url().'admin/get_brg/'?>"+id,
          data : {id: id},
          success: function(data){
            var json = data,
            obj = JSON.parse(json);
            // console.log(obj);
            $("#but_").remove();
            $("#kd_b").html(obj.kd_brg);
            $("#n_b").html(obj.nm_brg);
            $("#mer").html(obj.merk);
            $("#kat").html(obj.kategori);
            $("#tgl").html(obj.tgl_masuk);
            $("#spe").html(obj.spek);
            $("#sts").html(obj.status);
            $("#gmbr").attr('src', '<?= base_url() ?>admin-asset/foto/barang/'+obj.gambar);
            $("#gmbr").after(`
            <button type="submit" onclick="window.location.href='<?= base_url() ?>admin/edit_gmbr/`+obj.id+`'" id="but_" class="btn btn-success btn-sm mt-1">
              Ubah Gambar
            </button>`);
          }
        });
      });
    });
    //get kode
    $(document).ready(function(){
      $.ajax({
          type : "POST",
          url  : "<?php echo base_url().'admin/kode_brg/'?>",
          data : {id: "1"},
          success: function(data){
            var json = data,
            obj = JSON.parse(json);
            $("#kode").val(obj.kd_brg);
            $("#kd_brg").val(obj.kd_brg);
          }
      });
    });
    // hps
    $(document).ready(function(){
      $(document).on('click','.hps-brg',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var sts = $(this).attr('data-sts');
        swal.fire({
          title: 'Yakin Hapus?',
          text: "Apakah ingin menghapus ini!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya'
        }).then((result) => {
          if (result.value) {
            window.location.href = '<?= base_url() ?>admin/del_brg/'+id+'';
          }
        });
        
      });
    });
    // brg by kategori
    $(document).ready(function(){
      $(document).on('click','#src_kat',function(e){
        e.preventDefault();
        var kat = $('#s_kat').val();
        if(kat=='k'){
          // nothing
        }else{
          window.location.href = '<?= base_url() ?>admin/brg_bykat/'+kat+'';
        }
        
      });
    });
    // 
    function print(){
      var divToPrint=document.getElementById("example2");
      newWin= window.open("");
      newWin.document.write(divToPrint.outerHTML);
      newWin.print();
      newWin.close();
    }

  }
  // Anggota
  else if(page=="semua-anggota"){
    $("#anggota").attr('class', 'nav-link active');
    $("#bungkus-agt").attr('class', 'nav-item has-treeview menu-open');
    $("#semua-agt").attr('class','nav-link active');
    $(document).ready(function(){
      $(document).on('click','.edit_agt',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var action = 'fetchSingleRow';
        $.ajax({
          type : "POST",
          url  : "<?php echo base_url().'admin/get_agt/'?>"+id,
          data : {id: id},
          success: function(data){
            var json = data,
            obj = JSON.parse(json);
            // console.log(obj);
            $("#id_agt").val(obj.id);
            $("#nip").val(obj.nip);
            get_level(obj.nip);
            $("#nama").val(obj.nama);
            $("#tmp_lahir").val(obj.tmp_lahir);
            $("#tgl_lahir").val(obj.tgl_lahir);
            $("#jabatan").val(obj.jabatan);
            $("#gol").val(obj.golongan);
            $("#bid").val(obj.bidang);
          }
        });
      });
    });

    $(document).ready(function(){
      $(document).on('click','#a_detail',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
          type : "POST",
          url  : "<?php echo base_url().'admin/get_agt/'?>"+id,
          data : {id: id},
          success: function(data){
            var json = data,
            obj = JSON.parse(json);
            // console.log(obj);
            $("#but_").remove();
            $("#d_nip").html(obj.nip);
            $("#d_nama").html(obj.nama);
            $("#d_jab").html(obj.jabatan);
            $("#d_gol").html(obj.golongan);
            $("#d_bid").html(obj.bidang);
            $("#ttl").html(obj.tmp_lahir+', '+obj.tgl_lahir);
            get_level(obj.nip);
            $("#gmbr_a").attr('src','<?= base_url() ?>admin-asset/foto/agt/'+obj.gambar);
            $("#gmbr_a").after(`
            <button type="submit" onclick="window.location.href='<?= base_url() ?>admin/edit_gmbr1/`+obj.id+`'" id="but_" class="btn btn-success btn-sm mt-1">
              Ubah Gambar
            </button>`);
          }
        });
      });
    });

  }
  //
  else if(page=="peng-anggota"){
    $("#anggota").attr('class', 'nav-link active');
    $("#bungkus-agt").attr('class', 'nav-item has-treeview menu-open');
    $("#peng-akn").attr('class','nav-link active');
    //
    $(document).ready(function(){
      $(document).on('click','.reset',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        swal.fire({
          title: 'Yakin?',
          text: "Apakah Reset Akun ini?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya'
        }).then((result) => {
          if (result.value) {
            window.location.href = '<?= base_url() ?>admin/reset_pass/'+id+'';
          }
        });
        
      });
    });
  } 
  // pinjam
  else if(page=="pinjam"){
    $("#pinjam").attr('class', 'nav-link active');
    var count = 0;
    var barang = new Array();
    $(document).ready(function(){
      $("#nama").on('input',function(){
        var nama=$(this).val();
        var data_post = new FormData();
        data_post.append('nama',nama);
        $.ajax({
          type : "POST",
          url : "<?= base_url('admin/agt_form/') ?>",
          data : data_post,
          processData: false,
          contentType: false,
          success: function(data){
            console.log(data);
            data= JSON.parse(data);
            $("#nip").val(data.nip);
            $("#nip1").val(data.nip);
            $("#bidang").val(data.bidang);
            $("#bidang1").val(data.bidang);
            $(".tombol-pjm").html(`
              <button type="button" onclick="link(0)" class="cnc btn btn-secondary mt-3">Cancel</button>
              <button type="button" class="pjm btn btn-success float-right mt-3" data-toggle="modal" data-target=".bd-example-modal-lg">
                Pilih Barang
              </button>
            `);
          }
        });
      });
    });
    function link(a){
      if(a==0){
        $("#nama").val("");
        $("#nip").val("");
        $("#nip1").val("");
        $("#bidang").val("");
        $("#bidang1").val("");
        $(".cnc").remove();
        $(".pjm").remove();
        $("#isi-table").html(`
          <tr id="blank">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        `);
      }
      
    }
    $(document).ready(function(){
      $(document).on('click','.pilih',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
          type : "POST",
          url  : "<?php echo base_url().'admin/get_brg/'?>"+id,
          data : {id: id},
          success: function(data){
            var json = data,
            obj = JSON.parse(json);
            //console.log(obj);
            $(".comit").remove();
            $("#blank").html("");
            $("#isi-table").append(`
              <tr id="isi`+obj.id+`">
                <td>`+(count+1)+`</td>
                <td id="kd_`+count+`">`+obj.kd_brg+`</td>
                <td id="cek-isi" >`+obj.nm_brg+`</td>
                <td>`+obj.merk+`</td>
                <td style="width:10px; padding:0;">
                  <button data-id="`+obj.id+`" class="hps-brg btn btn-danger btn-sm">
                    <i class="fa fa-times"></i>
                  </button>
                </td>
              </tr>
            `);
            $(".list").after(`
              <button style="margin-left:40%" class="comit btn btn-info btn-sm mt-3">
                pinjam
              </button>
            `);
            $("#p_"+id+"").removeAttr('data-dismiss');
            $("#p_"+id+"").css('cursor','not-allowed');
            $("#p_"+id+"").attr('class', 'btn btn-secondary btn-sm');
            count+=1;
            barang[count-1]=obj.id;
            console.log(barang);
          }
        });
      });
    });
    //hapus item
    $(document).ready(function(){
      $(document).on('click','.hps-brg',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $("#isi"+id+"").remove();
        $("#p_"+id+"").attr('data-dismiss', 'modal');
        $("#p_"+id+"").css('cursor','pointer');
        $("#p_"+id+"").attr('class', 'pilih btn btn-info btn-sm');
        if(!document.getElementById('cek-isi')){
          $(".comit").remove();
        }
        barang = arrayRemove(barang, id);
        console.log(barang);
        count-=1;
      });
    });
    //get kode
    $(document).ready(function(){
      $.ajax({
          type : "POST",
          url  : "<?php echo base_url().'admin/kode_pjm/'?>",
          data : {id: "1"},
          success: function(data){
            var json = data,
            obj = JSON.parse(json);
            $("#kode_pjm").val(obj.kd_pjm);
            $("#kd_pjm").val(obj.kd_pjm);
          }
      });
    });
    //hapus
    function arrayRemove(barang, id){
       return barang.filter(function(ele){
          return ele != id;
       });
    }
    $(document).ready(function(){
      $(document).on('click','.comit',function(e){
        e.preventDefault();
        var angg = new Array(3);
        angg[0]=$("#kd_pjm").val();
        angg[1]=$("#nip1").val();
        angg[2]=$("#bidang1").val();
        var tgl = new Array(2);
        tgl[0]=$("#tgl_pjm").val();
        tgl[1]=$("#esti").val();
        window.location.href = "<?= base_url() ?>admin/in_pinjam/"+barang.join("-")+"/"+angg.join("-")+"/"+tgl.join(" ")+"";
      });
    });

  }

  // kembali
  else if(page=="kembali"){
    $("#kembali").attr('class', 'nav-link active');
    $(document).ready(function(){
      $("#kode_pjm").on('input',function(){
        var kode=$(this).val();
        var data_post = new FormData();
        data_post.append('kode',kode);
        $.ajax({
          type : "POST",
          url : "<?= base_url('admin/get_record/1') ?>",
          data : data_post,
          processData: false,
          contentType: false,
          success: function(data){
            console.log(data);
            data=JSON.parse(data);
            $("#nama").val(data.nama);
            $("#nama1").val(data.nama);
            $("#nip").val(data.nip);
            $("#nip1").val(data.nip);
            $("#bidang").val(data.bidang);
            $("#bidang1").val(data.bidang);
            if(data.nip){
              $(".tombol-kmbl").html(`
                <button type="button" class="cnc btn btn-secondary mt-3">Cancel</button>
                <button type="button" class="cari pjm btn btn-success float-right mt-3">
                  Cari
                </button>
              `);
            }
            //
          }
        });
      });
    });
    // cancel
    $(document).ready(function(){
      $(document).on('click','.cnc',function(e){
        e.preventDefault();
        $(".tombol-kmbl").html("");
        $("#nama").val("");
        $("#nama1").val("");
        $("#nip").val("");
        $("#nip1").val("");
        $("#bidang").val("");
        $("#bidang1").val("");
        $("#kode_pjm").val("");
      });
    });
    // cari
    $(document).ready(function(){
      $(document).on('click','.cari',function(e){
        e.preventDefault();
        var kode=$("#kode_pjm").val();
        var data_post = new FormData();
        data_post.append('kode',kode);
        $.ajax({
          type : "POST",
          url : "<?= base_url('admin/get_record/') ?>",
          data : data_post,
          processData: false,
          contentType: false,
          success: function(data){
            data=JSON.parse(data);
            console.log(data);
            var nama = $("#nama1").val();
            for(var i in data){
              $("#isi-res").append(`
              <tr>
                <td>`+(Number(no)+1)+`</td>
                <td>`+nama+`</td>
                <td id="nm_brg_`+i+`">`+nm_brg(data[i].kd_brg, i)+`</td>
                <td>`+data[i].tgl_pjm+`</td>
                <td>
                  <button type="button" data-id="`+data[i].id+`" class="kmbl-kan btn btn-danger btn-sm">
                    <i class="fa fa-times"></i>
                  </button>
                </td>
              </tr>
              `);
            }
          }
            //
        });
      });
    });
    //
    $(document).ready(function(){
      $(document).on('click','.kmbl-kan',function(e){
        e.preventDefault();
        var id=$(this).attr('data-id');
        window.location.href='<?= base_url() ?>/admin/in_kembali/'+id+'';
      });
    });
    //
    function nm_brg(kode, i){
      var hasil;
      $.ajax({
          type : "POST",
          url  : "<?php echo base_url().'admin/nm_brg/'?>"+String(kode),
          data : {kode: kode},
          success: function(data){
            var json = data,
            obj = JSON.parse(json);
            $("#nm_brg_"+i).html(obj.nm_brg);
          }
      });
    }

  }
  // record
  else if(page=="record"){
    $("#record").attr('class', 'nav-link active');
  }

  // =============== Set DataTables ==========
  $(function () {
    // $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
      });
    });
  // =============================view input gambar =======
  function filePreview(input) {
		if(input.files&&input.files[0]){
			var tipefile=/.\.(gif|jpg|png|jpeg)$/i;
			var namafile=input.files[0]['name'];
			var ukuran=input.files[0]['size'];
			if (!tipefile.test(namafile))
				$("#pesaneror").html('Only images are allowed!');
			else if (ukuran > 500000)
        $("#pesaneror").html('Your file is too big! Max allowed size is: 500KB');
      else{
        var reader = new FileReader();
        reader.onload=function(e){
          $('#uploadForm + img').remove();
          $('#gambar').html('<img src="'+e.target.result+'" width="80px" height="70px" />');
          $('#gambar1').html('<img src="'+e.target.result+'" width="150px" height="140px" />')
        }
        reader.readAsDataURL(input.files[0]);
      }
		}
	}
	$('#file').change(function(){
		filePreview(this);
	});

  function get_level(nip){
    var hasil="";
    $.ajax({
          type : "POST",
          url  : "<?php echo base_url().'admin/get_level/'?>"+String(nip),
          data : {nip: nip},
          success: function(data){
            var json = data,
            obj = JSON.parse(json);
            //console.log(obj);
            
            if(obj){
              $("#level").val(obj.level);

              if(obj.level==2){
                $("#d_level").html('Admin');
              }else if(obj.level==1){
                $("#d_level").html('Petugas');
              }
            }else{
              $("#d_level").html('user');
              $("#level").val(0);
            }
            
          }
        });
  }

  function get_nama(nip){
    var hasil="";
    $.ajax({
          type : "POST",
          url  : "<?php echo base_url().'admin/get_agt/'?>"+String(nip),
          data : {nip: nip},
          success: function(data){
            var json = data,
            obj = JSON.parse(json);

          }
        });
  }
  
</script>

</body>
</html>
