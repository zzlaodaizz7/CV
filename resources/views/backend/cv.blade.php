@extends('layouts.app',['selected'=>'cv'])
@section('title')
Danh sách ứng viên
@endsection
@section('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style type="text/css">
	.cv{
		height: 300px;
	}
	.header-cv{
		height: 25%;
	}
	.content-cv{
		height: 55%;
	}
	.footer-cv{
		height: 20%;
	}
	.avatar-cv{
		display: inline-flex;
		  justify-content: center;
		  align-items: center;
		  height: 100%;
		  width: 30%;
		  /*border: 3px solid green; */
	}
	.name-cv{
		height: 100%;
		width: 70%;
		float: right;
	}
</style>
@endsection
@section('content')
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách ứng viên</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Danh sách ứng viên</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        	@foreach($data as $item)
        	<div class="col-md-3 position-relative cv mb-3">
        		<div class="shadow header-cv border-top border-left border-right bg-white rounded-top">
        			<div class="avatar-cv">
        				<i class="fas fa-user-circle" style="font-size: 50px"></i>
        			</div>
        			<div class="name-cv pt-2">
        				<a href="storage/{{$item->cv}}" target="_blank" class="mt-2 mb-0 font-weight-bold text-info" style="font-size: 16px;">{{$item->name}}</a>
        				<p class="m-0 font-weight-light text-muted" style="font-size: 12px">JOB</p>
        			</div>
	        	<div class="dropdown position-absolute" style="top: 36px; right: 10px;">
	        		{{-- <a href="storage/{{$item->cv}}" target="_blank"><i class="far fa-eye" style="font-size: 13px"></i></a> --}}
				  <button class="btn dropdown-toggle" style="background-color: #fff;color: #1f2d3d!important;font-size: 13px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Status CV
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item status" data-toggle="modal" data-target="#modal-datetime" data-id="{{$item->id}}" data-status="Invite" href="#">Invite</a>
				    <a class="dropdown-item status" data-id="{{$item->id}}" data-status="Fail"href="#">Fail</a>
				    <a class="dropdown-item status" data-id="{{$item->id}}" data-status="Consider"href="#">Consider</a>
				    {{-- <a class="dropdown-item" href="#">Offer</a> --}}
				    {{-- <a class="dropdown-item" href="#">Fail PV</a> --}}
				    <a class="dropdown-item status" data-id="{{$item->id}}" data-status="Blacklist"href="#">Blacklist</a>
				  </div>
				</div>
	    		</div>
	    		<div class="shadow content-cv border-left border-right bg-white">
	    			<ul class="navbar-nav" style="font-size: 14px">
				      <li class="nav-item col-md-12 mt-2 mb-1">
				        <div class="col-md-12">
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
						  <button type="button" class="rounded btn btn-secondary btn-addtag" data-data="{{$item}}" data-toggle="modal" data-target="#modal-sm" style="font-size: 10px;padding: 3px;border-bottom-right-radius: ">
						    Add tag <i class="fas fa-tags"></i>
						  </button>
	
						</div>
				  	</div>
					<div class="col-md-12 float-left">
						<div class="col-md-12 taglist">
							
								@foreach($item->tag_cv as $ytem)
								<span class="badge badge-secondary statusitem" data-id="{{$ytem->id}}">{{$ytem->tags_name}}</span>
								@endforeach
							{{-- <span class="badge badge-secondary">#NodeJS</span>
							<span class="badge badge-secondary">#NodeJS</span>
							<span class="badge badge-secondary">#NodeJS</span>
							<span class="badge badge-secondary">#NodeJS</span>
							<span class="badge badge-secondary">#NodeJS</span> --}}
						</div>
						
					</div>
	    		</div>
	    		<div class="footer-cv border-left border-right border-bottom bg-white shadow rounded-bottom">
	    			<div class="d-flex justify-content-center">
	    				<div class="border-top w-75"></div>
	    			</div>
	    			<div class="col-md-12 h-100" style="font-size: 14px">
	    				<div class="col-md-12 h-100 align-self-center">
	    					<p class="text-muted m-0 mt-1">Vị trí Apply
	    					@if($item->status == "Invite")
	    						<span class="badge badge-primary">{{$item->status}}</span></p>
	    					@elseif($item->status == "Fail")
	    						<span class="badge badge-danger">{{$item->status}}</span></p>
	    					@elseif($item->status == "Consider")
	    						<span class="badge badge-info">{{$item->status}}</span></p>
	    					@elseif($item->status == "Blacklist")
	    						<span class="badge badge-secondary">{{$item->status}}</span></p>
	    					@elseif($item->status == "Offer")
	    						<span class="badge badge-secondary">{{$item->status}}</span></p>
    						@elseif($item->status == "Fail test")
	    						<span class="badge badge-secondary">{{$item->status}}</span></p>
	    						@elseif($item->status == "Fail interview")
	    						<span class="badge badge-secondary">{{$item->status}}</span></p>
	    						@elseif($item->status == "Cancel")
	    						<span class="badge badge-secondary">{{$item->status}}</span></p>
    						@elseif($item->status == "default")
								<span class="badge badge-warning">Default</span></p>
	    					@endif
	    					<p class="text-info">Tester</p>
	    				</div>
	    			</div>
	    		</div>
        	</div>
        	@endforeach
        </div>
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
                  <select class="select2" name="tag[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                  	@foreach($tags as $item)
                  		<option value="{{$item->id}}">{{$item->name}}</option>
                  	@endforeach
                  </select>
                </form>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary btnsubmit-addtag">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <div class="modal fade" id="modal-datetime">
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
		                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
		                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
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
              <button type="button" class="btn btn-primary btnsubmit-invi">Save changes</button>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
        	use24hours: true,
        	format : 'YYYY-MM-DD HH:mm:ss'
        });
    });
</script>
<script type="text/javascript">
	$('.btn-addtag').click(function(){
		$data = $(this).data('data');
		$('.name-addtag').text($data['name']);
		$('input[name=idcv]').val($data['id']);
	});
	//Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $('.btnsubmit-addtag').click(function(){
    	$data = $('form[name=addtagform]').serialize();
    	// console.log($data['tag[]']);
    	$.ajax({
            url : "/cv",
            type: "POST",
            data: $data,
            success: function (data) {
            	let value = JSON.parse(JSON.stringify(data));
            	console.log(value.content);
            }
        });
    });
    $('.status').click(function(){
    	$data = $(this).data('status');
    	$id 	= $(this).data('id');
    	if ($data == "Invite") {
    		$('.btnsubmit-invi').click(function(){
    			$time 	=	$('.datetimepicker-input').val();
    			$.ajax({
		            url : "/updatestatus",
		            type: "POST",
		            data: {
		            	id:$id,
		            	status:$data,
		            	timeinvi: $time
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
		    
    		})
    	}else{
    		$.ajax({
	            url : "/updatestatus",
	            type: "POST",
	            data: {
	            	id:$id,
	            	status:$data
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
				    // location.reload();
	            }
	        });
    	}
    });
    $('.statusitem').click(function(){
    	$id = $(this).data('id');
    	$tag = $(this);
    	swal({
		  title: "Chắc chắn xóa?",
		  text: "Xóa sẽ không thể khôi phục!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		  	$.ajax({
	            url : "/deletetag",
	            type: "POST",
	            data: {id:$id},
	            success: function (data) {
	            	let value = JSON.parse(JSON.stringify(data));
	            	console.log(value.content);$tag.remove();
	            	swal(value.content, {
				      icon: "success",
				    });
				    
	            }
	        });
		    
		  }
		});
    });

</script>
@endsection