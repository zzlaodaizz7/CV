@extends('layouts.app',['selected'=>'tag'])
@section('title')
    Tag
@endsection
@section('css')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <style type="text/css">
        table th:first-child {
            border-radius: 10px 0 0 0;
        }

        table th:last-child {
            border-radius: 0 10px 0 0;
        }

        .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
            background-color: #ffe4e1;

        }

        table tr:last-child {
            border-radius: 0 10px 0 0;
            border-color: white !important;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper pt-3" style="font-size: 13px">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                        <!-- DIRECT CHAT -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header ">
                                <div class="d-flex align-items-center float-left flex-column">
                                    <h3 class="card-title">Quản lý tags</h3>
                                </div>
                                <div>
                                    <div class="card-tools float-right">
                                        <button type="button" class="btn btn-success btn-sm float-right"
                                                data-toggle="modal" data-target="#modal-xl-add">
                                            Thêm mới tag
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-md-12 pt-3 pb-3">
                                    <table id="example2" class="table table-hover mt-3">
                                        <thead style="background: rgb(0,0,0);
background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(170,14,31,1) 100%, rgba(0,212,255,1) 100%);color: white">
                                        <tr>
                                            <th class="text-center" width="150px">STT</th>
                                            <th class="text-center">Tên tag</th>
                                            <th style="width: 80px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 0 @endphp
                                        @foreach($tag as $item)
                                            <tr style="background-color: #af323233">
                                                <td class="text-center">{{++$i}}</td>
                                                <td class="border-0">{{$item->name}}</td>
                                                <td style="text-align: center">
                                                    <button type="button"
                                                            style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,0.9220063025210083) 32%, rgba(0,212,255,1) 100%);"
                                                            class="btn btn-xs btn-primary btn-edit"
                                                            data-data="{{$item}}" data-toggle="modal"
                                                            data-target="#modal-xl-edit">
                                                        <i class="fas fa-edit" alt="Sửa"></i>
                                                    </button>
                                                    <button type="button"
                                                            style="background: linear-gradient(90deg, rgba(233,8,167,1) 0%, rgba(247,8,18,1) 52%, rgba(255,0,0,1) 100%);"
                                                            class="btn btn-xs btn-danger btn-Delete"
                                                            data-data="{{$item->id}}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/.direct-chat -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
                <div></div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <div class="modal fade" id="modal-xl-edit">
        <div class="modal-dialog modal-md">
            <form class="modal-content" name="edit-job">
                <input name="id" type="hidden" value=""/>
                <div class="modal-header">
                    <h4 class="modal-title">Sửa tag</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Tên tag</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Tên danh mục" required/>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-xl-add">
        <div class="modal-dialog modal-md">
            <form class="modal-content" name="add-job">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm tag</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Tên tag</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Tên danh mục"
                                       required/>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('js')
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    {{-- sweetalert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- DataTables -->

    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    {{-- <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> --}}
    <script type="text/javascript">
        $('.btn-edit').click(function(){
            $databtn = $(this).data("data");
            $("#modal-xl-edit input ").each( function(){
                $(this).val($databtn[$(this).attr("name")]);
            });
            if ($databtn['status'] == 'off') {
                // $(".price_check").attr('checked',false);
                $(".price_check").bootstrapSwitch('state', false);
            }
            $('#namecateedit option').each(function(){
                if ($(this).val()==$databtn['talenpools_id']) {
                    $(this).attr("selected","true");
                }
            });
        });
        $('form[name=add-job]').submit(function (e) {
            $data = $('form[name=add-job]').serialize();
            e.preventDefault();
            $.ajax({
                url: '/tag',
                type: 'POST',
                data: $data,
                success: function ($data) {
                    let value = JSON.parse(JSON.stringify($data));
                    if (value.type == "success") {
                        swal(value.content, {
                            icon: "success",
                            buttons: {
                                // cancel: "Run away!",
                                catch: {
                                    text: "OK",
                                    value: "ok",
                                },
                                // defeat: true,
                            },
                        })
                            .then((value) => {
                                switch (value) {
                                    case "ok":
                                        location.reload();

                                    default:
                                        location.reload();
                                }
                            });
                    } else {

                    }
                }
            });
        })
        // btn edit click
        $('form[name=edit-job]').submit(function (e) {
            $id = $('input[name=id]').val();
            e.preventDefault();
            $data = $('form[name=edit-job]').serialize();
            // console.log($data);
            $.ajax({
                url: '/tag/' + $id,
                type: 'PUT',
                data: $data,
                success: function ($data) {
                    let value = JSON.parse(JSON.stringify($data));
                    if (value.type == "success") {
                        swal(value.content, {
                            icon: "success",
                            buttons: {
                                // cancel: "Run away!",
                                catch: {
                                    text: "OK",
                                    value: "ok",
                                },
                                // defeat: true,
                            },
                        })
                            .then((value) => {
                                switch (value) {
                                    case "ok":
                                        location.reload();

                                    default:
                                        location.reload();
                                }
                            });
                    } else {
                        e.preventDefault();
                    }
                }
            });
        })

        ////click delete
        $('.btn-Delete').click(function () {
            $btn = $(this).parent().parent();
            let id = ($(this).data("data"));
            swal({
                title: "Xóa tag?",
                text: "Đồng ý xóa không thể khôi phục!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '/tag/' + id,
                            type: 'DELETE',
                            data: {"id": id},
                            success: function ($data) {
                                let value = JSON.parse(JSON.stringify($data));
                                if (value.type == "success") {
                                    toastr[value.type](value.content);
                                    swal("Xóa thành công!", {
                                        icon: "success",
                                    });
                                    $btn.remove();
                                } else {
                                    console.log(value.content);
                                }
                            }
                        })

                    }
                });
        });
    </script>
@endsection
