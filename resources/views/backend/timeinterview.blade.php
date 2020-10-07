@extends('layouts.app',['selected'=>'timeinterview'])
@section('title')
Time Inteview
@endsection
@section('css')
<style type="text/css">
  table {
    font-size: 14px;
  }
  td{
    padding: 2px 10px !important;
  }
  table th:first-child{
            border-radius:10px 0 0 0;
        }

        table th:last-child{
            border-radius:0 10px 0 0;
        }
        .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
            background-color: #ffe4e1;

        }
        .table-hover tbody tr:hover button{
           background-color: #ffe4e1 !important;
     
        }
        table tr:last-child{
            border-radius:0 10px 0 0;
            border-color: white !important;
        }
</style>
 <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('content')
	<div class="content-wrapper pt-3" style="font-size: 13px !important">
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
              <table id="example1" class="table-hover">
                <thead style="background: rgb(0,0,0);
background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(170,14,31,1) 100%, rgba(0,212,255,1) 100%);color: white">
                <tr>
                  {{-- <th style=""></th> --}}
                  <th class="text-center">Tên ứng viên</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Số điện thoại</th>
                  <th class="text-center" style="width: 150px; text-align: center;">Ngày</th>
                  <th class="text-center" width="50px"></th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $item)
                <tr class="border-bottom">
                  {{-- <td></td> --}}
                  <td class="align-middle"><a href="storage/{{$item->cv}} " target="_blank">{{$item->name}}</a></td>
                  <td class="align-middle">{{$item->email}}</td>
                  <td class="align-middle">{{$item->phone}}</td>
                  <td class="align-middle" style="text-align: center;">{{$item->timeinvite}}</td>
                  <td class="align-middle">
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
<!-- DataTables -->

<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "autoWidth": false,
        "bSort": false,
        "pageLength": 10,
        "info": false,
        "language": {
            // "info": "Hiển thị _START_ đến _END_ của _TOTAL_ bản",
            "lengthMenu": "Hiển thị _MENU_ bản ghi",
            "paginate": {
                "first": "Đầu tiên",
                "last": "Cuối",
                "next": "Tiếp",
                "previous": "Trước"

            },
          }
    });
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
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