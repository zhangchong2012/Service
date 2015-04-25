<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<!--导入css -->
<link rel="stylesheet" type="text/css" href="./weiblog/Api/Css/api.css" />
<title>Api文档</title>
</head>

<body>
	<div class="div_main">
		<div class="div_title"><?php echo ($title); ?></div>
		<div>
			 <table>		
				<?php if(is_array($list_api_names)): foreach($list_api_names as $k=>$vo): ?><tr>
						<td><?php echo ($k); ?></td>
						<td><?php echo ($vo); ?></td>
   					
   					<tr><?php endforeach; endif; ?>
			</table>
			
		</div>
		<div></div>
	</div>
</body>
</html>