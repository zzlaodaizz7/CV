
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Hệ thống tuyển dụng Appota</title>
    <link rel="stylesheet" href="https://hr.appota.com/css/app.css">
    <link rel="stylesheet" type="text/css" href="https://hr.appota.com/css/datetimepicker.min.css">
    <link rel="stylesheet" href="https://hr.appota.com/form/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://hr.appota.com/css/select2.min.css">
</head>
<body>
<div class="wrap">
    <div class="top">
        <div class="logo">
            <img src="https://hr.appota.com/form/image/logo-white.png" class="logo-title">
        </div>
        <div class="info">
            <div class="image">
                <img src="https://hr.appota.com/form/image/graphic6.svg" class="graphic">
            </div>
            <div class="text">
                <h3>Hệ thống tuyển dụng Appota</h3>
                <p>Nhập đầy đủ thông tin để ứng tuyển nhanh nhất</p>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="wrap-form">
            @if (session('status'))
                            <div class="alert alert-success" style="font-size: 14px;text-align: center;">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('statusFail'))
                            <div class="alert alert-danger" style="font-size: 14px;text-align: center;">
                                {{ session('status') }}
                            </div>
                        @endif
            <div class="content">
                <form method="POST" enctype="multipart/form-data" id="cv_form">
                    @csrf
                                        <div class="form-group col-12 col-sm-6">
                        <label for="job_function">Vị trí:<span class="text-danger">*</span></label>
                        <select name="job_function" class="form-control overflow-hidden" id="job_function"
                                multiple="multiple" size="1" required>
                                                            <option value="Tester">Tester</option>
                                                    </select>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="name">Tên ứng viên:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required
                               placeholder="Nguyễn Văn An">
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="birthday">Ngày sinh:<span class="text-danger">*</span></label>
                        <input class="form-control" id="birthday" name="birthday" required placeholder="YYYY-MM-DD"
                               autocomplete="off">
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="email">Email:<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required
                               placeholder="name@gmail.com">
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="number_phone">Số điện thoại:<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="number_phone" name="number_phone" required
                               placeholder="0912345678" min="0">
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="year_of_experience">Số năm kinh nghiệm:</label>
                        <select class="form-control" id="year_of_experience" name="year_of_experience">
                            <option value="0">Dưới 1 năm</option>
                            <option value="1">1 năm</option>
                            <option value="2">2 năm</option>
                            <option value="3">3 năm</option>
                            <option value="4">4 năm</option>
                            <option value="5">5 năm</option>
                            <option value="6">6 năm</option>
                            <option value="7+">trên 7 năm</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-sm-12">
                        <label for="description">Mô tả ngắn về kinh nghiệm liên quan (Link sản phẩm nếu có):<span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" rows="3" maxlength="2000" required
                                  name="description"></textarea>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="salary">Mức lương mong muốn:</label>
                        <select class="form-control" id="salary" name="salary">
                            <option value="0,10">Dưới 10 triệu</option>
                            <option value="10,15">Từ 10 - 15 triệu</option>
                            <option value="16,20">Từ 16 - 20 triệu</option>
                            <option value="20,100">Trên 20 triệu</option>
                        </select>
                    </div>
                                            <div class="form-group col-12 col-sm-6">
                            <label for="ref">Bạn biết đến thông tin tuyển dụng từ đâu:</label>
                            <select class="form-control" id="ref" name="ref">
                                    <option value="Ứng tuyển">Ứng tuyển</option>
                                    <option value="TopCV">TopCV</option>
                                    <option value="Linkedin">Linkedin</option>
                                    <option value="Refer">Refer</option>
                                    <option value="Facebook">Facebook</option>
                                                            </select>
                        </div>
                                        <div class="form-group col-12 col-sm-12">
                        <div class="custom-file-upload">
                            <label for="file">Upload CV phải là file có dạng <span class="text-danger">doc,docx,pdf,xls,xlsx</span>
                                và không được quá 10000kb <span class="text-danger">*</span></label>
                            <input type="file" class="form-control-file" id="file" name="file" required>
                        </div>
                        
                    </div>
                    <div class="form-group text-center col-12 col-sm-12">
                        <button type="" class="btn btn-submit">Gửi thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://hr.appota.com/js/app.js"></script>
<script src="https://hr.appota.com/fontawesome-5.13.0/js/all.js"></script>
<script src="https://hr.appota.com/js/common.js"></script>
<script src="https://hr.appota.com/js/moment.min.js"></script>
<script src="https://hr.appota.com/js/datetimepicker.min.js"></script>
<script src="https://hr.appota.com/js/popper.min.js"></script>
<script src="https://hr.appota.com/js/sweetalert2.all.min.js"></script>
<script src="https://hr.appota.com/js/select2.min.js"></script>
<script src="https://hr.appota.com/js/jquery.validate.min.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $("#cv_form").validate();
        $(function () {
            let _datetimepicker = $('#birthday');
            _datetimepicker.daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxDate: new Date(),
                locale: {
                    format: 'YYYY-MM-DD',
                    cancelLabel: 'Clear'
                }
            });
            _datetimepicker.val('');
        });

        $('#job_function').select2({
            placeholder: "Vị trí tuyển dụng",
        });
        // $('#job_skill').select2({
        //     placeholder: "Kỹ năng công việc",
        // });
        $('#file').bind('change', function() {

          //this.files[0].size gets the size of your file.
          // alert(this.files[0].size);
            // alert($(this).val().split('.').pop().toLowerCase());
            // console.log(this.files[0].size);
            var fileExtension = ['doc', 'docx', 'pdf', 'xls', 'xlsx'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("Các định dạng file được chấp nhận : "+fileExtension.join(', '));
                $("#file").val(null);

            }
        });
        $(window).resize(function () {
            $('#job_function').select2({
                placeholder: "Vị trí tuyển dụng",
            });
            // $('#job_skill').select2({
            //     placeholder: "Kỹ năng công việc",
            // });
        });
    });
</script>
</body>
</html>
