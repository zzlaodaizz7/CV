@extends('layouts.app',['selected'=>'timeinterview'])
@section('title')
Home
@endsection
@section('css')
<style type="text/css">
  table {
    font-size: 14px;
  }
  td{
    padding: 2px 10px !important;
  }
</style>
@endsection
@section('content')
	<div class="content-wrapper pt-3">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        	<div class="card col-md-12">
            <div class="card-header">
              <h3 class="card-title">Danh sách ứng viên</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th style=""></th>
                  <th>Tên ứng viên</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th style="width: 150px; text-align: center;">Ngày</th>
                  <th width="100px"></th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $item)
                <tr>
                  <td></td>
                  <td><a href="storage/{{$item->cv}} " target="_blank">{{$item->name}}</a></td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->phone}}</td>
                  <td style="text-align: center;">{{$item->timeinvite}}</td>
                  <td>
                    <div class="dropdown">
                     {{--  <a href="storage/{{$item->cv}}" target="_blank"><i class="far fa-eye" style="font-size: 13px"></i></a> --}}
                      <button class="btn dropdown-toggle" style="background-color: #fff;color: #1f2d3d!important;font-size: 13px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Status CV
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item status" data-id="{{$item->id}}" data-status="Offer" href="#">Offer</a>
                        <a class="dropdown-item status" data-id="{{$item->id}}" data-status="Fail test" href="#">Fail test</a>
                        <a class="dropdown-item status" data-id="{{$item->id}}" data-status="Fail" href="#">Fail interview</a>
                        <a class="dropdown-item status" data-id="{{$item->id}}" data-status="Cancel" href="#">Cancel</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('js')
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
{{-- sweetalert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $('.status').click(function(){
      $data = $(this).data('status');
      $id   = $(this).data('id');
      if ($data == "Invite") {
        $('.btnsubmit-invi').click(function(){
          $time   = $('.datetimepicker-input').val();
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
</script>
@endsection