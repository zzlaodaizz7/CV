@extends('layouts.app',['selected'=>'home'])
@section('title')
Home
@endsection
@section('css')
<!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content')
	<div class="content-wrapper pt-3">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>
                <p>Hôm nay</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>07 ngày qua</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>30 ngày qua</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header ">
              	<div class="d-flex align-items-center float-left flex-column">
            		<h3 class="card-title">Lịch phỏng vấn sắp tới</h3>
            	</div>	
                <div>
                	<div class="card-tools float-right">
                	
	                  <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
	                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
	                    <i class="fas fa-minus"></i>
	                  </button>
	                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
	                          data-widget="chat-pane-toggle">
	                    <i class="fas fa-comments"></i>
	                  </button>
	                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
	                  </button>
	                </div>
                </div>	     
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	<div class="col-md-12">
              		<table id="example2" class="table table-bordered table-hover mt-3">
                <thead>
                <tr>
                  <th style="width: 160px">Ngày giờ</th>
                  <th>Họ tên</th>
                  <th>Số điện thoại</th>
                  <th style="width: 110px"></th>
	                </tr>
	                </thead>
	                <tbody>
	                <tr>
	                  <td>20/05/1997 10:59:20</td>
	                  <td>Đỗ Khương Duy</td>
	                  <td>0389317219</td>
	          			<td style="text-align: center; font-size: 13px">
	          				<a href="storage/uploads/cv/1599757199-Do-Khuong-Duy-CV.pdf" target="_blank" class="border pt-1 pb-1 pr-2 pl-2 bg-danger"><i class="far fa-hand-point-right p-1"></i>Xem CV</a>
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
          <section class="col-lg-5 connectedSortable">

            <!-- solid sales graph -->
            <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Ứng viên mới apply
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0 pl-3 pr-3">
                <div class="col-md-12 border mb-2" style="height: 55px">
                	<div class="d-flex align-items-center h-100 float-left mr-2">
                		<i class="fas fa-user-circle" style="font-size: 35px"></i>
                	</div>
                	<div class="d-flex flex-column h-100 float-left mr-2">
                		<p class="m-0">Đỗ Khương Duy</p>
                		<p class="m-0">0389317219</p>
                	</div>
                	<div class="d-flex align-items-center h-100 float-left ml-3">
                		<i class="fas fa-chevron-right"></i>
                	</div>
                	<div class="d-flex flex-column h-100 float-left ml-3 mr-2 pt-1">
                		<p class="m-0">Vị trí: Tester</p>
                		<p class="m-0" style="font-size: 13px">1 giờ trước</p>
                	</div>
                </div>
                 <div class="col-md-12 border mb-2" style="height: 55px">
                	<div class="d-flex align-items-center h-100 float-left mr-2">
                		<i class="fas fa-user-circle" style="font-size: 35px"></i>
                	</div>
                	<div class="d-flex flex-column h-100 float-left mr-2">
                		<p class="m-0">Đỗ Khương Duy</p>
                		<p class="m-0">0389317219</p>
                	</div>
                	<div class="d-flex align-items-center h-100 float-left ml-3">
                		<i class="fas fa-chevron-right"></i>
                	</div>
                	<div class="d-flex flex-column h-100 float-left ml-3 mr-2 pt-1">
                		<p class="m-0">Vị trí: Tester</p>
                		<p class="m-0" style="font-size: 13px">1 giờ trước</p>
                	</div>
                </div>
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
        
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
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
</script>
@endsection