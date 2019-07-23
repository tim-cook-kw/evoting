@extends('apps.layout')
@section('sectionheader')
<!-- Content Header (Page header) -->
<section class="content-header">
        <h1>
          Data Calon
          <small>List Data Calon</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
          <li class="active">Data Calon</li>
        </ol>
      </section>
@endsection
@section('content')
  <div class="box box-primary">
      <div class="box-header">
          <button data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
      </div>
      <div class="box-body">
          <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Input Data Calon</h4>
                </div>
                <form id="datacaloncreate">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input class="form-control" id="nomor_telepon" name="nomor_telepon">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input class="form-control" id="gambar" name="gambar" type="file">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" id="email" name="email" >
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Visi</label>
                            <textarea class="form-control" id="visi" name="visi"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Misi</label>
                            <textarea class="form-control" id="misi" name="misi"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div id="myModal1" class="modal fade" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Ubah Data Calon</h4>
                </div>
                <form id="datacalonedit">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" id="namaedit" name="namaedit">
                            <input type="hidden" id="iddatacalon">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input class="form-control" id="nomor_teleponedit" name="nomor_teleponedit">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input class="form-control" id="gambaredit" name="gambaredit" type="file">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelaminedit" name="jenis_kelaminedit">
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" id="emailedit" name="emailedit" >
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamatedit" name="alamatedit"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Visi</label>
                            <textarea class="form-control" id="visiedit" name="visiedit"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Misi</label>
                            <textarea class="form-control" id="misiedit" name="misiedit"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <table class="table" id="mytable">
            <thead>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Gambar</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Action</th>
            </thead>
        </table>
      </div>
  </div>

@stop
@section('script')
<script>
    var APP_URL = {!! json_encode(url('/')) !!}
    function editfunc(id){
            $.ajax({
                url:'/api/datacalon/'+id,
                type:'GET',
                success:function(data){
                    console.log(data);
                    $( '#namaedit' ).val(data.nama);
                    $( '#emailedit' ).val(data.email);
                    $( '#nomor_teleponedit' ).val(data.nomor_telepon);
                    $( '#alamatedit' ).val(data.alamat);
                    $( '#jeniskelaminedit' ).val(data.jeniskelamin);
                    $('#visiedit').val(data.visi);
                    $('#misiedit').val(data.misi);
                    $( '#iddatacalon' ).val(data.id);
                }
            })
        }
function myfunc(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:'/api/datacalon/'+id,
                    type:'DELETE',
                    success:function(){
                        Swal.fire(
                                    'Sukses!',
                                    'Data Sukses di hapus!',
                                    'success'
                                )
                                table.ajax.reload();
                    }
                })
            }
        })

}
var table =  $('#mytable').DataTable({
                deferRender: true,
                ajax: {
                    url: "/api/datacalon",
                    type: "GET",
                    dataSrc: function (d) {
                        return d
                    }
                },
                columns: [
                    { data: 'nama' },
                    { data: 'nomor_telepon' },
                    { data: null,
                      render:function(data,type,row){
                          return "<img style='width:100px;height:100px;' src='"+APP_URL+'/'+data.foto+"'/>";
                      }
                    },
                    { data: null,
                      render:function(data,type,row){
                        if(data.jenis_kelamin == 1){
                            return "laki-laki";
                        }else{
                            return "perempuan";
                        }
                      }
                    },
                    { data: 'email' },
                    {
                        data: null,
                        render: function ( data, type, row ) {
                            return "<button class='btn btn-primary' data-toggle='modal' data-target='#myModal1' onclick='editfunc("+data.id+")'>Edit</button> <button class='btn btn-danger' onclick='myfunc("+data.id+")'>Delete</button>";
                        }
                    }
                ]
            });
$('document').ready(function(){
    $('form[id="datacaloncreate"]').validate({
            rules: {
                email:{
                    required:true,
                    email: true
                },
                nama: 'required',
                gambar:'required',
                jenis_kelamin:'required',
                nomor_telepon:{
                    required:true,
                    number:true
                },
                alamat: 'required',
                visi: 'required',
                misi: 'required'
            },
            messages: {
                judul: 'This field is required',

            },
            submitHandler: function(form) {
                    var data;
                    data = new FormData();
                    data.append( 'foto', $( '#gambar' )[0].files[0] );
                    data.append( 'nama', $( '#nama' ).val());
                    data.append( 'email', $( '#email' ).val());
                    data.append( 'nomor_telepon', $( '#nomor_telepon' ).val());
                    data.append( 'jenis_kelamin', $( '#jenis_kelamin' ).val());
                    data.append( 'alamat', $( '#alamat' ).val());
                    data.append('visi', $('#visi').val());
                    data.append('misi', $('#misi').val());
                    $.ajax({
                        url:'/api/datacalon',
                        method:'POST',
                        data:data,
                        contentType: false,
                        processData:false,
                        success:function(){
                            Swal.fire(
                                    'Sukses!',
                                    'Data Sukses di simpan!',
                                    'success'
                                ).then(function(){
                                    $( '#nama' ).val('');
                                    $( '#email' ).val('');
                                    $( '#nomor_telepon' ).val('');
                                    $( '#jenis_kelamin' ).val('');
                                    $( '#alamat' ).val('');
                                    $('#visi').val('');
                                    $('#misi').val('');
                                    $('#myModal').modal('toggle');
                                })
                                table.ajax.reload();
                        }
                    })
            }
     })
     $('form[id="datacalonedit"]').validate({
            rules: {
                emailedit:{
                    required:true,
                    email: true
                },
                namaedit: 'required',
                jenis_kelaminedit:'required',
                nomor_teleponedit:{
                    required:true,
                    number:true
                },
                alamatedit: 'required',
            },
            messagesedit: {
                judul: 'This field is required',

            },
            submitHandler: function(form) {
                    var data;
                    var id = $("#iddatacalon").val();
                    data = new FormData();
                    data.append('_method', 'PUT');
                    data.append( 'foto', $( '#gambaredit' )[0].files[0] );
                    data.append( 'nama', $( '#namaedit' ).val());
                    data.append( 'email', $( '#emailedit' ).val());
                    data.append( 'nomor_telepon', $( '#nomor_teleponedit' ).val());
                    data.append( 'jenis_kelamin', $( '#jenis_kelaminedit' ).val());
                    data.append( 'alamat', $( '#alamatedit' ).val());
                    data.append('visi', $('#visiedit').val());
                    data.append('misi', $('#misiedit').val());
                    $.ajax({
                        url:'/api/datacalon/'+id,
                        method:'POST',
                        data:data,
                        contentType: false,
                        processData:false,
                        success:function(){
                            Swal.fire(
                                    'Sukses!',
                                    'Data Sukses di simpan!',
                                    'success'
                                ).then(function(){
                                    $( '#nama' ).val('');
                                    $( '#email' ).val('');
                                    $( '#nomor_telepon' ).val('');
                                    $( '#jenis_kelamin' ).val('');
                                    $( '#alamat' ).val('');
                                    $('#visi').val('');
                                    $('#misi').val('');
                                    $('#myModal1').modal('toggle');
                                })
                                table.ajax.reload();
                        }
                    })
            }
     })
});
</script>
@endsection
