@extends('layouts.app',['selected'=>'job'])
@section('title')
Job
@endsection
@section('css')
<!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
@endsection
@section('content')
	<div class="content-wrapper pt-3">
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
                                Thêm mới
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
              	<div class="col-md-12">
              		<table id="example2" class="table table-bordered table-hover mt-3">
                <thead>
                <tr>
                  <th style="width: 160px">ID</th>
                  <th>Tên</th>
                  <th>Mô tả</th>
                  <th>Số lượng</th>
                  <th>Thời gian bắt đầu</th>
                  <th style="width: 110px"></th>
	                </tr>
	                </thead>
	                <tbody>
	                @foreach($job as $item)
                    <tr>
                        <td class="border">{{$item->id}}</td>
                        <td class="border">{{$item->name}}</td>
                        <td class="border">{{$item->descrip}}</td>
                        <td class="border">{{$item->target}}</td>
                        <td class="border">{{$item->start_end}}</td>

                        <td style="text-align: center"><button type="button" class="btn btn-sm btn-primary btn-edit" data-data="{{$item}}" data-toggle="modal"  data-target="#modal-xl-edit">
                                <i class="fas fa-edit" alt="Sửa"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger btn-Delete" data-data="{{$item->id}}" >
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                  @endforeach

	          			</td>
	                </tr>
	                
	                </tfoot>
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
      </div><!-- /.container-fluid -->
    </section>
        
  	</div>
<div class="modal fade" id="modal-xl-edit">
        <div class="modal-dialog modal-md">
            <input name="id" type="hidden" value="" />
            <form class="modal-content" name="edit-job">

                <div class="modal-header">
                    <h4 class="modal-title">Sửa dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Tên job</label>
                                <input type="text" class="form-control"  name="name"  placeholder="Tên danh mục" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Số lượng</label>
                                <input type="text" class="form-control"  name="target"  placeholder="Tên danh mục" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Mô tả ngắn</label>
                                <input type="text" class="form-control"  name="descrip"  placeholder="Tên danh mục" required />
                            </div>
                        </div>
                        
                        <div class="col-md-12">
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
                    <h4 class="modal-title">Thêm dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Tên job</label>
                                <input type="text" class="form-control" id="name" name="name"  placeholder="Tên danh mục" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Số lượng</label>
                                <input type="text" class="form-control" id="target" name="target"  placeholder="Tên danh mục" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Mô tả ngắn</label>
                                <input type="text" class="form-control" id="descrip" name="descrip"  placeholder="Tên danh mục" required />
                            </div>
                        </div>
                        
                        <div class="col-md-12">
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

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
      "language": {
      	"paginate": {
	        "next":       "Sau",
	        "previous":   "Trước"
	    },
      }
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