@extends('layouts.app',['selected'=>'job'])
@section('title')
Job
@endsection
@section('css')
<!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <style type="text/css">
    table th:first-child{
            border-radius:10px 0 0 0;
        }

        table th:last-child{
            border-radius:0 10px 0 0;
        }
        .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
            background-color: #ffe4e1;

        }
        table tr:last-child{
            border-radius:0 10px 0 0;
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
            		<h3 class="card-title">Lịch phỏng vấn sắp tới</h3>
            	</div>
                <div>
                	<div class="card-tools float-right">
                	   <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modal-xl-add">
                                Thêm mới job
                            </button>
                       <button type="button" class="btn btn-success btn-sm float-right mr-2" data-toggle="modal" data-target="#modal-xl-add-category">
                                Thêm mới danh mục
                            </button>
	                  {{-- <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
	                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
	                    <i class="fas fa-minus"></i>
	                  </button>
	                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
	                          data-widget="chat-pane-toggle">
	                    <i class="fas fa-comments"></i>
	                  </button>
	                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
	                  </button> --}}
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
                        <th class="text-center" width="150px"></th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Mô tả</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thời gian bắt đầu</th>
                        <th style="width: 80px"></th>
    	                </tr>
  	                </thead>
	                <tbody>
	                @foreach($job as $item)
                    <tr style="background-color: #af323233">
                      <td class="border-0 position-relative">{{$item->name}}
                        @if($item->status == 'on')
                          <i class="far fa-check-circle" style="color: green;position: absolute;top: 0;right: 0"></i>
                        @endif
                      </td>
                      <td class="border-0"></td>
                      <td class="border-0"></td>
                      <td class="border-0"></td>
                      <td class="border-0"></td>
                      <td style="text-align: center">
                        <button type="button" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,0.9220063025210083) 32%, rgba(0,212,255,1) 100%);" class="btn btn-xs btn-primary btn-edit-category" data-data="{{$item}}" data-toggle="modal"  data-target="#modal-xl-edit-category">
                                <i class="fas fa-edit" alt="Sửa"></i>
                            </button>
                            <button type="button" style="background: linear-gradient(90deg, rgba(233,8,167,1) 0%, rgba(247,8,18,1) 52%, rgba(255,0,0,1) 100%);" class="btn btn-xs btn-danger btn-Delete" data-data="{{$item->id}}" >
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @foreach($item->getjob as $ytem)
                      <tr>
                        <td class="border">
                            <div class="row">
                                <div class="col-md-7 pr-0 ">Ứng tuyển:</div>
                                <div class="col-md-3 p-0">{{count(\App\Cv::where([['job',$ytem->name],['status','default']])->get())}}</div>

                                <div class="col-md-7 pr-0 ">Mời:</div>
                                <div class="col-md-3 p-0"> {{count(\App\Cv::where([['job',$ytem->name],['status','Invite']])->get())}}</div>

                                 <div class="col-md-7 pr-0">Offer: </div>
                                 <div class="col-md-3 p-0">{{count(\App\Cv::where([['job',$ytem->name],['status','Offer']])->get())}}
                                </div>
                                <div class="col-md-7 pr-0">Fail: </div>
                                <div class="col-md-3 p-0"> {{count(\App\Cv::where([['job',$ytem->name],['status','Fail']])->get())}}
                                </div>
                            </div>





                             {{-- - {{count(\App\Cv::where([['job',$ytem->name],['status','Invite']])->get())}}
                              - Offer
                              - {{count(\App\Cv::where([['job',$ytem->name],['status','Fail']])->get())}} --}}
                        </td>
                        <td class="border position-relative">{{$ytem->name}} @if($ytem->status == 'on')
                          <i class="far fa-check-circle" style="color: green;position: absolute;top: 0;right: 0"></i>
                        @endif</td>
                        <td class="border">{{$ytem->descrip}}</td>
                        <td class="border text-center">{{$ytem->target}}</td>
                        <td class="border text-center">{{$ytem->start_end}}</td>
                        <td class="border" style="text-align: center">
                            <button type="button" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,0.9220063025210083) 32%, rgba(0,212,255,1) 100%);" class="btn btn-xs btn-primary btn-edit" data-data="{{$ytem}}" data-toggle="modal"  data-target="#modal-xl-edit">
                                <i class="fas fa-edit" alt="Sửa"></i>
                            </button>
                            <button style="background: linear-gradient(90deg, rgba(233,8,167,1) 0%, rgba(247,8,18,1) 52%, rgba(255,0,0,1) 100%);" type="button" class="btn btn-xs btn-danger btn-Delete" data-data="{{$ytem->id}}" >
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach

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
                <input name="id" type="hidden" value="" />
                <div class="modal-header">
                    <h4 class="modal-title">Sửa dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="namecate">Tên danh mục</label>
                                <select class="form-control" id="namecateedit" name="talenpools_id">
                                  @foreach(\App\Job::where('talenpools_id',0)->get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="name">Tên job</label>
                                <input type="text" class="form-control" id="name" name="name"  placeholder="Tên danh mục" required />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">Số lượng</label>
                                <input type="number" min="1" class="form-control" id="target" name="target"  placeholder="" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Mô tả ngắn</label>
                                <input type="text" class="form-control"  name="descrip"  placeholder="Tên danh mục" required />
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Thời gian bắt đầu và kết thúc</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                  </div>
                                  <input type="text" name="start_end" class="form-control float-right" id="reservationtime1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Trạng thái</label>
                                <div class="form-control border-0">
                                  <input type="checkbox" name="" class="price_check" checked="" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                                <input type="hidden" name="status" class="status">
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
    <div class="modal fade" id="modal-xl-edit-category">
        <div class="modal-dialog modal-md">
            <form class="modal-content" name="edit-cate">
              <input name="id" id="idcate" type="hidden" value="" />
                <div class="modal-header">
                    <h4 class="modal-title">Thêm danh mục</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name"  placeholder="Tên danh mục" required />
                                <input type="hidden" name="cate" value="1" />
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Trạng thái</label>
                                <div class="form-control border-0">
                                  <input type="checkbox" name="" class="price_check" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                                <input type="hidden" name="status" class="status" value="on">
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
<div class="modal fade" id="modal-xl-add">
        <div class="modal-dialog modal-md">
            <form class="modal-content" name="add-job">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="namecate">Tên danh mục</label>
                                <select class="form-control" id="namecate" name="talenpools_id">
                                  @foreach(\App\Job::where('talenpools_id',0)->get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="name">Tên job</label>
                                <input type="text" class="form-control" id="name" name="name"  placeholder="Tên danh mục" required />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">Số lượng</label>
                                <input type="number" min="1" class="form-control" id="target" name="target"  placeholder="" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Mô tả ngắn</label>
                                <input type="text" class="form-control" id="descrip" name="descrip"  placeholder="Tên danh mục" required />
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Thời gian bắt đầu và kết thúc</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                  </div>
                                  <input type="text" name="start_end" class="form-control float-right" id="reservationtime">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Trạng thái</label>
                                <div class="form-control border-0">
                                  <input type="checkbox" name="" class="price_check" checked="" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                                <input type="hidden" name="status" class="status" value="on">
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
<div class="modal fade" id="modal-xl-add-category">
        <div class="modal-dialog modal-md">
            <form class="modal-content" name="add-cate">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm danh mục</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name"  placeholder="Tên danh mục" required />
                                <input type="hidden" name="cate" value="1" />
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Trạng thái</label>
                                <div class="form-control border-0">
                                  <input type="checkbox" name="" class="price_check" checked="" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                                <input type="hidden" name="status" class="status" value="on">
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
	// $('#example2').DataTable({
     //  "paging": true,
     //  "lengthChange": true,
     //  "searching": true,
     //  "ordering": false,
     //  "info": false,
     //  "autoWidth": false,
     //  "responsive": true,
     //  "language": {
     //    // "info": "Hiển thị _START_ đến _END_ của _TOTAL_ bản",
     //  	"paginate": {
	    //     "next":       "Sau",
	    //     "previous":   "Trước"
	    // },
      // }
    //   "autoWidth": false,
    //     "bSort": false,
    //     "pageLength": 10,
    //     "info": false,
    //     "language": {
    //         // "info": "Hiển thị _START_ đến _END_ của _TOTAL_ bản",
    //         "lengthMenu": "Hiển thị _MENU_ bản ghi",
    //         "paginate": {
    //             "first": "Đầu tiên",
    //             "last": "Cuối",
    //             "next": "Tiếp",
    //             "previous": "Trước"

    //         },
    //       }
    // });
 $(".price_check").bootstrapSwitch({
    onSwitchChange: function(e, state) {
      console.log(state);
      if (state == true) {
        $(".status").val("on");
      }else{
        $(".status").val("off");
      }
    }
  });
  $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
  $('#reservationtime').daterangepicker({
      timePicker: true,
      timePicker24Hour: true,
      timePickerIncrement: 30,
      locale: {
          format: 'MM/DD/YYYY H:mm'
      }
    })
  $('#reservationtime1').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY H:mm'
        }
      })
  $('form[name=add-job]').submit(function(e){
      $data = $('form[name=add-job]').serialize();
      console.log($data);
      e.preventDefault();
      $.ajax({
          url: '/job',
          type: 'POST',
          data: $data,
          success: function($data){
              let value = JSON.parse(JSON.stringify($data));
              if (value.type=="success"){
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
              }else{

              }
          }
      });
  })
  // btn edit click
  $('form[name=edit-job]').submit(function(e){
      $id = $('input[name=id]').val();
      e.preventDefault();
      $data = $('form[name=edit-job]').serialize();
      // console.log($data);
      $.ajax({
          url: '/job/'+$id,
          type: 'PUT',
          data: $data,
          success: function($data){
              let value = JSON.parse(JSON.stringify($data));
              if (value.type=="success"){
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
              }else{
                  e.preventDefault();
              }
          }
      });
  })
///click edit
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
  $(".btn-edit-category").click(function(){
    $databtn = $(this).data("data");
      $("#modal-xl-edit-category input ").each( function(){
          $(this).val($databtn[$(this).attr("name")]);
      });
      if ($databtn['status'] == 'off') {
        // $(".price_check").attr('checked',false);
        $(".price_check").bootstrapSwitch('state', false);
      }
      $("#idcate").val($databtn['id']);
  });
  $('form[name=add-cate]').submit(function(e){
    e.preventDefault();
    $data = $('form[name=add-cate]').serialize();
    $.ajax({
          url: '/job',
          type: 'POST',
          data: $data,
          success: function($data){
              let value = JSON.parse(JSON.stringify($data));
              if (value.type=="success"){
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
              }else{

              }
          }
        });
  });

  $("form[name=edit-cate]").submit(function(e){
    e.preventDefault();
    $id = $('#idcate').val();
    $data = $('form[name=edit-cate]').serialize();
    console.log($data);
    $.ajax({
        url: '/job/'+$id,
        type: 'PUT',
        data: $data,
        success: function($data){
            let value = JSON.parse(JSON.stringify($data));
            if (value.type=="success"){
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
            }else{
                e.preventDefault();
            }
        }
    });
  });
  ////click delete
  $('.btn-Delete').click(function(){
      $btn = $(this).parent().parent();
      let id = ($(this).data("data"));
      swal({
          title: "Xóa job?",
          text: "Đồng ý xóa không thể khôi phục!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
          .then((willDelete) => {
              if (willDelete) {
                  $.ajax({
                      url: '/job/'+id,
                      type: 'DELETE',
                      data: { "id":id},
                      success: function($data){
                          let value = JSON.parse(JSON.stringify($data));
                          if (value.type=="success"){
                              toastr[value.type](value.content);
                              swal("Xóa thành công!", {
                                  icon: "success",
                              });
                              $btn.remove();
                          }else{
                              console.log(value.content);
                          }
                      }
                  })

              }
          });
  });
</script>
@endsection
