@extends('apps.layout')
@section('sectionheader')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Pemilih
        <small>List Data Pemilih</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li class="active">Data Pemilih</li>
    </ol>
</section>
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-header">
        <button data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
            Data</button>
    </div>
    <div class="box-body">
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Form Input Data Pemilih</h4>
                    </div>
                    <form id="datacaloncreate">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>NIK</label>
                                <input class="form-control" id="nik" name="nik">
                                <p class="text-danger alert-danger" style="display:none"></p>
                                <input type="hidden" id="statusvote" value="0" name="statusvote">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
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
                @if($errors->any())
                <h4>{{$errors->first()}}</h4>
                @endif
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Form Ubah Data Pemilih</h4>
                    </div>
                    <form id="datacalonedit">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>NIK</label>
                                <input class="form-control" id="nikedit" name="nikedit">
                                <p class="text-danger alert-danger" style="display:none"></p>
                                <input type="hidden" id="iddatacalon">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" id="namaedit" name="namaedit">
                                <input type="hidden" id="iddatacalon">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelaminedit" name="jenis_kelaminedit">
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
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
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
            </thead>
        </table>
    </div>
</div>

@stop
@section('script')
<script>
    // var APP_URL = {
    //     !!json_encode(url('/')) !!
    // }

    function editfunc(id) {
        $.ajax({
            url: '/api/pemilih/' + id,
            type: 'GET',
            success: function (data) {
                console.log(data);
                $('#namaedit').val(data.nama);
                $('#jeniskelaminedit').val(data.jeniskelamin);
                $('#iddatacalon').val(data.id);
                $('#nikedit').val(data.nik)
            }
        })
    }

    function myfunc(id) {
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
                    url: '/api/pemilih/' + id,
                    type: 'DELETE',
                    success: function () {
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
    var table = $('#mytable').DataTable({
        deferRender: true,
        ajax: {
            url: "/api/pemilih",
            type: "GET",
            dataSrc: function (d) {
                return d
            }
        },
        columns: [{
                data: 'nik'
            },
            {
                data: 'nama'
            },
            {
                data: null,
                render: function (data, type, row) {
                    if (data.jenis_kelamin == 1) {
                        return "laki-laki";
                    } else {
                        return "perempuan";
                    }
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return "<button class='btn btn-primary' data-toggle='modal' data-target='#myModal1' onclick='editfunc(" +
                        data.id + ")'>Edit</button> <button class='btn btn-danger' onclick='myfunc(" +
                        data.id + ")'>Delete</button>";
                }
            }
        ]
    });
    $('#nik').keyup(function () {
        var a = $(this).val();
        var c = a.lenght;
        var _token = $('input[name="_token"]').val();
        if (c > 9) {
            $.ajax({
                url: '/api/validasi',
                method: "POST",
                data: {
                    query: a,
                    _token: _token
                },
                success: function (data) {
                    $('.alert-danger').show();
                    $('.alert-danger').append('Nik Telah Tersedia');
                }
            });
        }

    })
    $('form[id="datacaloncreate"]').validate({
        rules: {
            nik: {
                required: true,
                alphanumeric: true,
                minlength: 10
            },
            nama: 'required',
            jenis_kelamin: 'required',
        },
        messages: {
            judul: 'This field is required',

        },
        submitHandler: function (form) {
            var data;
            data = new FormData();
            data.append('nik', $('#nik').val());
            data.append('nama', $('#nama').val());
            data.append('jenis_kelamin', $('#jenis_kelamin').val());
            data.append('statusvote', $('#statusvote').val());
            $.ajax({
                url: '/api/pemilih',
                method: 'POST',
                data: data,
                contentType: false,
                processData: false,

                success: function (response) {
                    Swal.fire(
                        'Sukses!',
                        'Data Sukses di simpan!',
                        'success'
                    ).then(function () {
                        $('#nik').val('');
                        $('#nama').val('');
                        $('#jenis_kelamin').val('');
                        $('#myModal').modal('toggle');
                    })
                    table.ajax.reload();
                },
                error: function (response) {
                    $('.alert-danger').show();
                    $('.alert-danger').append('Nik Telah Tersedia');
                }
            })
        }
    })
    $('#nikedit').keyup(function () {
        var a = $(this).val();
        var c = a.lenght
        var _token = $('input[name="_token"]').val();
        if (c > 9) {
            $.ajax({
                url: '/api/validasi',
                method: "POST",
                data: {
                    query: a,
                    _token: _token
                },
                success: function (data) {
                    $('.alert-danger').show();
                    $('.alert-danger').append('Nik Telah Tersedia');
                }
            });
        }

    })
    $('form[id="datacalonedit"]').validate({
        rules: {
            namaedit: 'required',
            jenis_kelaminedit: 'required',
        },
        messagesedit: {
            judul: 'This field is required',

        },
        submitHandler: function (form) {
            var data;
            var id = $("#iddatacalon").val();
            data = new FormData();
            data.append('_method', 'PUT');
            data.append('nik', $('#nikedit').val());
            data.append('nama', $('#namaedit').val());
            data.append('jenis_kelamin', $('#jenis_kelaminedit').val());
            $.ajax({
                url: '/api/pemilih/' + id,
                method: 'POST',
                data: data,
                contentType: false,
                processData: false,
                success: function () {
                    Swal.fire(
                        'Sukses!',
                        'Data Sukses di simpan!',
                        'success'
                    ).then(function () {
                        $('#nama').val('');
                        $('#jenis_kelamin').val('');
                        $('#myModal1').modal('toggle');
                    })
                    table.ajax.reload();
                },
                error: function (response) {
                    $('.alert-danger').show();
                    $('.alert-danger').append('Nik Telah Tersedia');
                }
            })
        }
    })

</script>
@endsection
