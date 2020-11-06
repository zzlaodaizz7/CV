@extends('layouts.app',['selected'=>'cv'])
@section('title')
    Danh sách ứng viên
@endsection
@section('css')
    {{--    /*<!-- Select2 -->*/--}}
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    {{--    <!-- Bootstrap4 Duallistbox -->--}}
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style type="text/css">
        .cv {
            height: 300px;
        }

        .header-cv {
            height: 25%;
        }

        .content-cv {
            height: 55%;
        }

        .footer-cv {
            height: 20%;
        }

        .avatar-cv {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 30%;
            /*border: 3px solid green; */
        }

        .name-cv {
            height: 100%;
            width: 70%;
            float: right;
        }

        .pagination {
            margin: 0 !important;
            display: flex;
            justify-content: center;
        }

    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1 class="m-0 text-dark">Danh sách ứng viên</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form class="row">
                            <div class="col-md-3 ml-auto" id="formfiltertag">
                                <div class="form-group">
                                    <select class="form-control" id="filtertag" name="type">
                                        <option value="">---Chọn tìm kiếm---</option>
                                        <option value="all">Tất cả</option>
                                        <option value="name">Tên và email ứng viên</option>
                                        <option value="tags">Tag</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <input type="text"
                                           style="width: 300px;float: left;border-top-right-radius: 0;border-bottom-right-radius: 0;"
                                           placeholder="Nhập tên hoặc email cần tìm" name="keyword"
                                           class="form-control" id="keyword"/>
                                    <button type="submit"
                                            style="border-top-left-radius: 0;border-bottom-left-radius: 0;"
                                            class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>

                        </form>
                    </div>

                    @foreach($data as $item)
                        <div class="col-md-3 position-relative cv mb-5">
                            <div class="shadow header-cv text-white border-top border-left border-right rounded-top">
                                <div class="avatar-cv">
                                    <i class="fas fa-user-circle" style="font-size: 50px"></i>
                                </div>
                                <div class="name-cv pt-2">
                                    <a href="storage/{{$item->cv}}" target="_blank"
                                       class="namecv mt-2 mb-0 font-weight-bold text-white"
                                       style="font-size: 16px;">{{$item->name}}</a>
                                    <p class="m-0 font-weight-light text-white"
                                       style="font-size: 12px">{{$item->job}}</p>
                                </div>
                                <div class="dropdown position-absolute" style="top: 45px; right: 10px;">
                                    {{-- <a href="storage/{{$item->cv}}" target="_blank"><i class="far fa-eye" style="font-size: 13px"></i></a> --}}
                                    <button class="btn dropdown-toggle" style=";color: white !important;font-size: 13px"
                                            type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Status CV
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        {{-- 				  	<a class="dropdown-item status" data-toggle="" data-target="" data-id="{{$item->id}}" data-status="InviteToInterview" href="#">Mời ứng tuyển</a> --}}
                                        <a class="dropdown-item status" data-toggle="modal"
                                           data-target="#modal-datetime"
                                           data-id="{{$item->id}}" data-status="Invite"
                                           href="{{url('cv')}}/#">Invite</a>
                                        <a class="dropdown-item status" data-toggle="modal" data-id="{{$item->id}}"
                                           data-status="Fail" href="{{url('cv')}}/#">Fail</a>
                                        <a class="dropdown-item status" data-id="{{$item->id}}" data-status="Pass"
                                           href="{{url('cv')}}/#">Pass</a>
                                        <a class="dropdown-item status" data-id="{{$item->id}}" data-status="Offer"
                                           href="{{url('cv')}}/#">Offer</a>

                                        <a class="dropdown-item status" data-id="{{$item->id}}" data-status="Blacklist"
                                           href="{{url('cv')}}/#">Blacklist</a>
                                    </div>
                                </div>
                            </div>
                            <div class="shadow content-cv border-left border-right bg-white">
                                <ul class="navbar-nav" style="font-size: 14px">
                                    <li class="nav-item col-md-12 mt-2 mb-1">
                                        <div class="col-md-12 emailcv">
                                            <i class="fas fa-envelope mr-1"></i>{{$item->email}}
                                        </div>
                                    </li>
                                    <li class="nav-item col-md-12 d-none d-sm-inline-block mb-1">
                                        <div class="col-md-12">
                                            <i class="fas fa-phone mr-1"></i>{{$item->phone}}
                                        </div>
                                    </li>
                                    <li class="nav-item col-md-12 d-none d-sm-inline-block">
                                        <div class="col-md-12">
                                            <i class="fas fa-clock mr-1"></i>{{$item->created_at}}
                                        </div>
                                    </li>
                                    @if($item->status =="Invite")
                                        <li class="nav-item col-md-12 d-none d-sm-inline-block">
                                            <div class="col-md-12">
                                                <i class="fas fa-tasks mr-1"></i>{{$item->timeinvite}} (Time interview)
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                                <!-- Default dropup button -->
                                <div class="col-md-12" style="position: absolute;
    top: -10px;
    right: 0;">
                                    <div class="btn-group dropup float-right">
                                        <button type="button" class="rounded btn btn-secondary btn-addtag"
                                                data-data="{{$item}}" data-toggle="modal" data-target="#modal-sm"
                                                style="font-size: 10px;padding: 3px;">
                                            Tag <i class="fas fa-tags"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 float-left">
                                    <div class="col-md-12 taglist">
                                        @if(is_string($item->tags))
                                            @foreach(json_decode($item->tags, true) as $value)
                                                <span class="badge badge-secondary statusitem">{{$value}}</span>
                                            @endforeach
                                        @endif
                                        {{-- <span class="badge badge-secondary">#NodeJS</span>
                                        <span class="badge badge-secondary">#NodeJS</span>
                                        <span class="badge badge-secondary">#NodeJS</span>
                                        <span class="badge badge-secondary">#NodeJS</span>
                                        <span class="badge badge-secondary">#NodeJS</span> --}}
                                    </div>

                                </div>
                            </div>
                            <div
                                class="footer-cv border-left border-right border-bottom bg-white shadow rounded-bottom">
                                <div class="d-flex justify-content-center">
                                    <div class="border-top w-75"></div>
                                </div>
                                <div class="col-md-12 h-100" style="font-size: 14px">
                                    <div class="col-md-12 h-100 align-self-center">
                                        <p class="text-muted m-0 mt-1">Vị trí Apply <span
                                                class="text-info jobcv">{{$item->job}}</span></p>
                                        @if($item->status == "Invite")
                                            <span class="badge badge-primary">{{$item->status}}</span></p>
                                        @elseif($item->status == "Fail")
                                            <span class="badge badge-danger">{{$item->status}}</span></p>
                                        @elseif($item->status == "Pass")
                                            <span class="badge badge-success">{{$item->status}}</span></p>
                                        @elseif($item->status == "Blacklist")
                                            <span class="badge badge-secondary">{{$item->status}}</span></p>
                                        @elseif($item->status == "Offer")
                                            <span class="badge badge-secondary">{{$item->status}}</span></p>
                                        @elseif($item->status == "Cancel")
                                            <span class="badge badge-secondary">{{$item->status}}</span></p>
                                        @elseif($item->status == "default")
                                            <span class="badge badge-warning text-white">Nộp CV</span></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$data->links()}}
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-size: 16px">Add tag cho <br>
                        <span class="name-addtag font-weight-bold"></span>
                        <br>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form class="form-group" name="addtagform">
                            @csrf
                            <input type="hidden" name="idcv">
                            <label>Add tag</label>
                            <select class="select2" id="state" name="tags[]" multiple="multiple" data-placeholder="--Chọn tag--"
                                    style="width: 100%;">
                                @if(is_string($item->tags))
                                    @foreach(json_decode($item->tags, true) as $value)
                                        <option
                                              value="{{$value}}" selected>{{$value}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </form>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary btnsubmit-addtag">Thêm</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
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
                                    <input type="text" class="form-control datetimepicker-input" name="timeinvite"
                                           data-target="#datetimepicker1"/>
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
                                <input type="text" class="form-control" id="linkweb">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link mô tả công việc</label>
                                <input type="text" class="form-control" id="linkdes">
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
    <div class="modal fade" id="modal-fail">
        <div class="modal-dialog modal-md">
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
                    <div class="col-md-12">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                           data-target="#datetimepicker1"/>
                                    <div class="input-group-append" data-target="#datetimepicker1"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btnsubmit-fail">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('js')

    <!-- Select2 -->
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="plugins/select2/js/select2.full.min.js"></script>
    {{-- sweetalert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                use24hours: true,
                format: 'YYYY-MM-DD HH:mm:ss'
            });
        });
        ///summernote
        $(function () {
            // $("#filtertag").change(function(){
            //     $("#formfiltertag").submit();
            // })
            $(".btnsubmit-addnewtag").click(function () {
                console.log($('.select2-search__field').val());
            })
            // Summernote
            $('.content-emailinvite').summernote();
            var back = ["#f7347a", "#ff7f7f", "#56672c", "#616559", "#123b65", "#01080e", "#3b0c4e", "#696969"];
            $('.header-cv').each(function () {
                $(this).css('background-color', back[Math.floor(Math.random() * back.length)]);
            })
        });

    </script>
    <script type="text/javascript">
        $('.btn-addtag').click(function () {
            let data = $(this).data('data');
            $("#state").children().remove();
            $.each(JSON.parse(data.tags),function(key,value){
                let newStateVal = value;
                var newState = new Option(newStateVal, newStateVal, true, true);
                $("#state").append(newState).trigger('change');
            })
            // Set the value, creating a new option if necessary
            // if ($("#state").find("option[value=" + newStateVal + "]").length) {
            //     $("#state").val(newStateVal).trigger("change");
            // } else {
                // Create the DOM option that is pre-selected by default

                // Append it to the select

            // }
            $('.name-addtag').text(data['name']);
            $('input[name=idcv]').val(data['id']);
            $(this).parent().parent().parent().find('.statusitem').each(function () {
                let namestatus = $(this).text();
                $('.status-a').each(function () {
                    if (namestatus === $(this).text()) {
                        // $('.select2 .select2-hidden-accessible').append($(this));
                        // console.log($(this));
                    }
                });
            });
        });
        //Initialize Select2 Elements
        $('.select2').select2({
            tags: true
        })

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $('.btnsubmit-addtag').click(function () {
            $data = $('form[name=addtagform]').serialize();
            showload();
            $.ajax({
                url: "/cv",
                type: "POST",
                data: $data,
                success: function (data) {
                    let value = JSON.parse(JSON.stringify(data));
                    // console.log(value.content);
                    hideload();
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
        });
        $('.status').click(function () {
            $data = $(this).data('status');
            $id = $(this).data('id');
            if ($data !== "Invite") {
                showload();
            }
            if ($data === "Invite") {
                $namecv = $(this).parent().parent().parent().find('.namecv').text();
                $job = $(this).parent().parent().parent().parent().find('.jobcv').text();
                $titleemail = "APPOTA - Thư mời phỏng vấn vị trí " + $job;
                $email = $(this).parent().parent().parent().parent().find('.emailcv').text();
                $('#title-invite').val($titleemail);
                $('.btnsubmit-invi').click(function () {
                    showload();
                    $time = $('input[name=timeinvite]').val();
                    $linkweb = $('#linkweb').val();
                    $linkdes = $('#linkdes').val();
                    $location = $('input[name=customRadio]').val();
                    $people = $('input[name="people"]:checked').val();
                    $.ajax({
                        url: "/updatestatus",
                        type: "POST",
                        data: {
                            id: $id,
                            status: $data,
                            timeinvi: $time,
                            website: $linkweb,
                            descrip: $linkdes,
                            location: $location,
                            people: $people,
                            email: $email,
                            title: $titleemail,
                            job: $job,
                            name: $namecv,
                        },
                        success: function (data) {
                            let value = JSON.parse(JSON.stringify(data));
                            // console.log(value);
                            hideload();
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
                })
            } else if ($data === "Invite") {
                $namecv = $(this).parent().parent().parent().find('.namecv').text();
                $email = $(this).parent().parent().parent().parent().find('.emailcv').text();
                $job = $(this).parent().parent().parent().parent().find('.jobcv').text();
                $.ajax({
                    url: "/updatestatus",
                    type: "POST",
                    data: {
                        id: $id,
                        status: $data,
                        name: $namecv,
                        job: $job,
                        email: $email,
                        invitetointerview: 1,
                    },
                    success: function (data) {
                        let value = JSON.parse(JSON.stringify(data));
                        // console.log(value);
                        hideload();
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
                        id: $id,
                        status: $data
                    },
                    success: function (data) {
                        let value = JSON.parse(JSON.stringify(data));
                        hideload();
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
                        }).then((value) => {
                                switch (value) {
                                    case "ok":
                                        location.reload();
                                    default:
                                        location.reload();
                                }
                            });
                    }
                });
            }
        });

    </script>
@endsection
