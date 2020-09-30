<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
    	p{
    		color: black;
    	}
    </style>
</head>
<body>
	<div style="background-color: white">
		<p>Dear <b>{{$info['name']}}</b>,</p>			
		<p>Cảm ơn bạn đã quan tâm đến thông tin tuyển dụng Appota. Chúng tôi thực sự đánh giá cao những kinh nghiệm cũng như kỹ năng công việc của bạn. Do vậy, chúng tôi trân trọng mời bạn tham dự buổi phỏng vấn vị trí {{$info['job']}}</p>			
		<p>Thời gian: {{$info['timeinvite']}}</p>		
		<p>Địa điểm: {{$info['location']}}</p>	
		<p>Người tiếp đón: {{$info['people']}}</p>					
		<p>Để hiểu thêm về Appota, bạn vui lòng tham khảo thêm thông tin sau:</p>			
		<p>Website: {{$info['website']}}</p>			
		<p>Mô tả công việc: {{$info['description']}}</p>			
		<p>Văn hóa làm việc: <a href="http://bit.ly/32QbETW">http://bit.ly/32QbETW</a></p>		
		<p>			
		Bạn vui lòng trả lời lại email này để xác nhận khả năng tham gia buổi phỏng vấn. Nếu có bất kỳ điều gì bất tiện, bạn có thể liên hệ ngay qua email này nhé.			
		</p>		
		<p>Chúng tôi rất mong sớm được gặp và trò chuyện với bạn.</p>			
		<i>
		Thanks and Best Regards,			
		</i>
	</div>
	
</body>
</html>

