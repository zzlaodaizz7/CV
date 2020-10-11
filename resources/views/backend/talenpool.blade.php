@extends('layouts.app',['selected'=>"$id"])
@section('title')
    Danh sách ứng viên
@endsection
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        #Invite, #Fail, #Blacklist, #Pass, #Offer, #default {
            list-style-type: none;
            margin: 0;
            padding: 5px 0 0 0;
            float: left;
            margin-left: 10px;
        }

        #Blacklist {
            margin-left: 5px;
        }

        .w20 {
            width: 20% !important;
            /*border:1px solid black;*/
            /*padding: 5px 10px*/
        }

        .status-title {
            position: relative;
            text-align: center;
        }

        .status-title-after {
            width: 10px;
            height: 41px;
            /* border-bottom-right-radius: 110px; */
            border-top-right-radius: 110px;
            border-left: 0;
            top: -1px;
            right: -10px;
            z-index: 1;
        }

        .ui-state-default {
            height: 70px !important;
            margin: auto;
            padding: 3px;
            font-size: 13px;
        }

        .avt {
            width: 20%;
        }

        .connectedSortable {
            height: 200px;
            padding: 10px !important;
        }

        .layout-footer-fixed .wrapper .content-wrapper {
            padding: 0px !important;
        }

        .pagination {
            margin: 0 !important;
            display: flex;
            justify-content: center;
        }

        .connectedSortable::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: transparent;

        }

        .connectedSortable::-webkit-scrollbar {
            width: 6px;
            background-color: transparent;
        }

        .connectedSortable::-webkit-scrollbar-thumb {
            background: rgb(0, 0, 0);
            background: linear-gradient(0deg, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 41%, rgba(255, 0, 0, 1) 100%);
            border-radius: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="w20">
                        <div class="p-2 border-top border-left border-bottom status-title bg-primary">
                            Invite
                            <div class="status-title-after position-absolute border-top border-right bg-primary">

                            </div>
                        </div>
                        <ul id="Invite" class="connectedSortable overflow-auto border-bottom-0 w-100 m-0">
                            @foreach($datainvi as $item)
                                <li class="ui-state-default bg-white rounded shadow mb-4">
                                    <div class="avt h-100 d-flex align-items-center float-left">
                                        <i class="fas fa-user-circle m-auto" style="font-size: 35px"></i>
                                    </div>
                                    <div class="info w-100 h-100">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <input type="hidden" name="jobcv" value="{{$item->job}}">
                                        <input type="hidden" name="emailcv" value="{{$item->email}}">
                                        <a class="font-weight-bold namecv" target="_blank"
                                           href="storage/{{$item->cv}}">{{$item->name}}</a>
                                        <p class="m-0">{{$item->phone}}</p>
                                        <i class="m-0">{{$item->job}}</i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="w20">
                        <div class="p-2 border-top border-bottom status-title bg-info">
                            Pass
                            <div class="status-title-after position-absolute border-top border-right bg-info">

                            </div>
                        </div>
                        <ul id="Pass" class="connectedSortable  overflow-auto w-100">
                            @foreach($datapass as $item)
                                <li class="ui-state-default bg-white rounded shadow mb-4">
                                    <div class="avt h-100 d-flex align-items-center float-left">
                                        <i class="fas fa-user-circle m-auto" style="font-size: 35px"></i>
                                    </div>
                                    <div class="info w-100 h-100">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <input type="hidden" name="jobcv" value="{{$item->job}}">
                                        <input type="hidden" name="emailcv" value="{{$item->email}}">
                                        <a class="font-weight-bold namecv"
                                           href="storage/{{$item->cv}}">{{$item->name}}</a>
                                        <p class="m-0">{{$item->phone}}</p>
                                        <i class="m-0">{{$item->job}}</i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="w20">
                        <div class="p-2 border-top border-bottom status-title bg-success">
                            Offer
                            <div class="status-title-after position-absolute bg-success border-top border-right">
                            </div>
                        </div>
                        <ul id="Offer" class="connectedSortable overflow-auto w-100">
                            @foreach($dataoffer as $item)
                                <li class="ui-state-default bg-white rounded shadow mb-4">
                                    <div class="avt h-100 d-flex align-items-center float-left">
                                        <i class="fas fa-user-circle m-auto" style="font-size: 35px"></i>
                                    </div>
                                    <div class="info w-100 h-100">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <input type="hidden" name="jobcv" value="{{$item->job}}">
                                        <input type="hidden" name="emailcv" value="{{$item->email}}">
                                        <a class="font-weight-bold namecv"
                                           href="storage/{{$item->cv}}">{{$item->name}}</a>
                                        <p class="m-0">{{$item->phone}}</p>
                                        <i class="m-0">{{$item->job}}</i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="w20">
                        <div class="p-2 border-top status-title bg-danger">
                            Fail
                            <div class="status-title-after position-absolute border-top border-right bg-danger">

                            </div>
                        </div>
                        <ul id="Fail" class="connectedSortable overflow-auto  w-100 ">
                            @foreach($datafail as $item)
                                <li class="ui-state-default bg-white rounded shadow mb-4">
                                    <div class="avt h-100 d-flex align-items-center float-left">
                                        <i class="fas fa-user-circle m-auto" style="font-size: 35px"></i>
                                    </div>
                                    <div class="info w-100 h-100">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <input type="hidden" name="jobcv" value="{{$item->job}}">
                                        <input type="hidden" name="emailcv" value="{{$item->email}}">
                                        <a class="font-weight-bold namecv"
                                           href="storage/{{$item->cv}}">{{$item->name}}</a>
                                        <p class="m-0">{{$item->phone}}</p>
                                        <i class="m-0">{{$item->job}}</i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="w20">
                        <div class="p-2 border-top border-bottom status-title bg-dark border-right">
                            Blacklist
                            {{-- <div class="status-title-after position-absolute border-top border-right bg-bg">

                            </div> --}}
                        </div>
                        <ul id="Blacklist" class="connectedSortable overflow-auto w-100 ">
                            @foreach($datablacklist as $item)
                                <li class="ui-state-default bg-white rounded shadow mb-4">
                                    <div class="avt h-100 d-flex align-items-center float-left">
                                        <i class="fas fa-user-circle m-auto" style="font-size: 35px"></i>
                                    </div>
                                    <div class="info w-100 h-100">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <input type="hidden" name="jobcv" value="{{$item->job}}">
                                        <input type="hidden" name="emailcv" value="{{$item->email}}">
                                        <a class="font-weight-bold namecv"
                                           href="storage/{{$item->cv}}">{{$item->name}}</a>
                                        <p class="m-0">{{$item->phone}}</p>
                                        <i class="m-0">{{$item->job}}</i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    {{$data->links()}}
                </div>
            </div><!--/. container-fluid -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.modal-content -->
    <!-- /.modal-dialog -->
    <div class="modal fade" id="modal-datetime">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-size: 16px">Thời gian hẹn<br>
                        <span class="name-addtag font-weight-bold"></span>
                        <br>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title Email</label>
                                <input type="text" class="form-control" name="title" id="title-invite">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thời gian hẹn</label>
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="text" required class="form-control datetimepicker-input"
                                           name="timeinvite" data-target="#datetimepicker1"/>
                                    <div class="input-group-append" data-target="#datetimepicker1"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <!-- checkbox -->
                            <div class="form-group">
                                <label for="">Địa điểm</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" checked type="radio" id="location1"
                                           name="customRadio"
                                           value="HN (tòa nhà LE, số 11 ngõ 71 Láng Hạ, Ba Đình, HN)">
                                    <label for="location1" style="font-weight: 500" class="custom-control-label">HN (tòa
                                        nhà LE, số 11 ngõ 71 Láng Hạ, Ba Đình, HN)</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="location2" name="customRadio"
                                           value="HCM (tầng 10F, tòa nhà số 198A, đường 3/2, phường 12, Q10, TP HCM)">
                                    <label for="location2" style="font-weight: 500" class="custom-control-label">HCM
                                        (tầng 10F, tòa nhà số 198A, đường 3/2, phường 12, Q10, TP HCM)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- checkbox -->
                            <div class="form-group">
                                <label for="">Người đón tiếp</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" checked type="radio" id="people1" name="people"
                                           value="Ms Phương: 0338211940">
                                    <label for="people1" style="font-weight: 500" class="custom-control-label">Ms
                                        Phương: 0338211940</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="people2" name="people"
                                           value="Ms Hoài: 0982388915">
                                    <label for="people2" style="font-weight: 500" class="custom-control-label">Ms Hoài:
                                        0982388915</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="people3" name="people"
                                           value="Ms Diệp: 0916661812">
                                    <label for="people3" style="font-weight: 500" class="custom-control-label">Ms Diệp:
                                        0916661812</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="people4" name="people"
                                           value="Ms Diệp: 0916661812">
                                    <label for="people4" style="font-weight: 500" class="custom-control-label">Ms Diệp:
                                        0916661812</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link website</label>
                                <input type="text" required class="form-control" id="linkweb">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link mô tả công việc</label>
                                <input type="text" required class="form-control" id="linkdes">
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btnsubmit-invi">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    {{-- sweetalert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    {{-- a --}}

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                use24hours: true,
                format: 'YYYY-MM-DD HH:mm:ss'
            });
        });
        $(function () {
            $start = "";
            $finish = "";
            $("#Invite, #Fail , #Blacklist ,#default,#Pass,#Offer").sortable({
                connectWith: ".connectedSortable",
                items: 'li',
                start: function (event, ui) {
                    $start = ui.item.parent().attr("id");
                    // console.log("status start:"+ui.item.parent().attr("id"));
                },
                change: function (event, ui) {
                },
                update: function (event, ui) {
                },
                stop: function (event, ui) {
                    $finish = ui.item.parent().attr("id");
                    // console.log("id:"+ui.item.find("input[name=id]").val());
                    // console.log("status:"+ui.item.parent().attr("id"));
                    // console.log($namecv);
                    $id = ui.item.find("input[name=id]").val();
                    $namecv = ui.item.find(".namecv").text();
                    $job = ui.item.find('input[name=jobcv]').val();
                    $titleemail = "APPOTA - Thư mời phỏng vấn vị trí " + $job;
                    $email = ui.item.find('input[name=emailcv]').val();
                    if ($start != $finish) {
                        $isitem = $(this);
                        if ($finish == "Invite") {
                            $('#modal-datetime').modal('show');
                            $('#modal-datetime').on('hidden.bs.modal', function (e) {
                                $isitem.sortable("cancel");
                            })
                            $('#title-invite').val($titleemail);
                            $('.btnsubmit-invi').click(function () {
                                $time = $('input[name=timeinvite]').val();
                                $linkweb = $('#linkweb').val();
                                $linkdes = $('#linkdes').val();
                                $location = $('input[name=customRadio]').val();
                                $people = $('input[name="people"]:checked').val();
                                $.ajax({
                                    url: "/updatestatus",
                                    type: "POST",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        id: $id,
                                        status: $finish,
                                        timeinvi: $time,
                                        website: $linkweb,
                                        descrip: $linkdes,
                                        location: $location,
                                        people: $people,
                                        email: $email,
                                        title: $titleemail,
                                        job: $job,
                                        name: $namecv,
                                        invi: 1,
                                    },
                                    success: function (data) {
                                        let value = JSON.parse(JSON.stringify(data));
                                        console.log(value);
                                        swal(value.content, {
                                            icon: "success",
                                            buttons: {
                                                // cancel: "Run away!",
                                                catch: {
                                                    text: "OK",
                                                    value: "ok",
                                                },
                                            },
                                        })
                                            .then((value) => {
                                                switch (value) {
                                                    case "ok":
                                                        $('#modal-datetime').modal('hide');
                                                        location.reload();
                                                    default:
                                                    // location.reload();
                                                }
                                            });
                                    },
                                    error: function (data) {
                                        console.log("a");
                                        toastr["error"](JSON.parse(data.responseText).content);

                                    }
                                });
                            })
                        } else if ($finish == "Fail") {
                            $.ajax({
                                url: "/updatestatus",
                                type: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    id: $id,
                                    status: $finish,
                                    name: $namecv,
                                    email: $email,
                                    fail: 1,
                                },
                                success: function (data) {
                                    let value = JSON.parse(JSON.stringify(data));
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
                                }
                            });
                        } else {
                            $.ajax({
                                url: "/updatestatus",
                                type: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    id: $id,
                                    status: $finish
                                },
                                success: function (data) {
                                    let value = JSON.parse(JSON.stringify(data));
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
                                                // location.reload();
                                            }
                                        });
                                    // location.reload();
                                }
                            });
                        }
                    }
                }

            }).disableSelection();

            //initializes the plugin with empty options
            // $(".connectedSortable").overlayScrollbars({ /* your options */ });
            // $(".status-title").each(function(){
            // $width = $(this).height()/Math.sqrt(2);
            // $(this).after().width($width).height($width);
            // });
            $(".connectedSortable").height($(".content-wrapper").height() - 42 - 38 - 20);
            var back = ["#f7347a", "#ff7f7f", "#56672c", "#616559", "#123b65", "#01080e", "#3b0c4e", "#696969", "#cbcba9", "#666666", "#40e0d0", "#800080", "#333333", "#ff7f50", "#660066", "#407294", "##5ac18e", "#daa520", "#8a2be2", "#6897bb", "#008000", "#800000"];
            $('.avt i').each(function () {
                $(this).css('color', back[Math.floor(Math.random() * back.length)]);
            })

        });

    </script>
@endsection
