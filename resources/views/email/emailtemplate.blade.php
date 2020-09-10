<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamota</title>
</head>
<body>
    @php
    	$phr = $info['body'];
    	$needrpl = array(':name:',':email:',':birthday:',':job:',':birthday:',':phone:',':exp:',':description:',':salary:',':source:');
    	$rpl = array($info['name'],$info['email'],$info['birthday'],$info['job'],$info['birthday'],$info['phone'],$info['exp'],$info['description'],$info['salary'],$info['source']);
    	echo str_replace($needrpl,$rpl,$phr);
    @endphp
</body>
</html>