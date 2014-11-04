<?php
require_once("PureECharts.php");
$js = "";
$chartype = array(
				"line",
				"bar",
				"pie"
			);

$js .= PathDefine($chartype);
$js .= ExPainter($chartype);

$name = "line";
$title = "未来一周气温变化";
$subtitle = "纯属虚构";
$legend = ['最高气温', '最低气温'];
$xAxis = ['周一', '周二', '周三', '周四', '周五', '周六', '周日'];
$yFormat = "℃";
$data = array(
			array(
				'name' => '最高气温',
				'type' => 'line',
				'data' => array(11, 11, 15, 13, 12, 13, 10)
			),
			array(
				'name' => '最低气温',
				'type' => 'line',
				'data' => array(1, -2, 2, 5, 3, 2, 0)
			)
		);


$js .= LinePainter($name, $title, $subtitle, $legend, $xAxis, $yFormat, $data);
$name = "bar";
$data = array(
			array(
				'name' => '最高气温',
				'type' => 'bar',
				'data' => array(11, 11, 15, 13, 12, 13, 10)
			),
			array(
				'name' => '最低气温',
				'type' => 'bar',
				'data' => array(1, -2, 2, 5, 3, 2, 0)
			)
		);
$js .= BarPainter($name, $title, $subtitle, $legend, $xAxis, $yFormat, $data);

$name = "pie";
$title = "某网站用户访问来源";
$legend = array('直接访问', '邮件营销', '联盟广告', '视频广告', '搜索引擎');
$data = array(
			array(
				'name' => '访问来源',
				'type' => 'pie',
				'radius' => '55%',
				'center' => array('50%', '60%'),
				'data' => array(
								array(
									'value' => 335,
									'name' => '直接访问'
								),
								array(
									'value' => 310,
									'name' => '邮件营销'
								),
								array(
									'value' => 234,
									'name' => '联盟广告'
								),
								array(
									'value' => 135,
									'name' => '视频广告'
								),
								array(
									'value' => 1548,
									'name' => '搜索引擎'
								)
							)
			)
		);
$js .= PiePainter($name, $title, $subtitle, $legend, $data);
$js .= FootPainter();



?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>ECharts</title>
	<script src="http://s1.bdstatic.com/r/www/cache/ecom/esl/1-6-10/esl.js"></script>
</head>

<body>
	<div id="line" style="height:400px"></div>
	<div id="bar" style="height:400px"></div>
	<div id="pie" style="height:400px"></div>

	<script type="text/javascript">
	<?php echo $js; ?>
	</script>
</body>

