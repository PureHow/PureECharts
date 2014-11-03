<?php
function PathDefine($chartype)
{
	$js = "";
	$js .= "\t\trequire.config({\n";
	$js .= "\t\t\tpaths:{\n";
	$js .= "\t\t\t\t'echarts':'http://echarts.baidu.com/build/echarts',\n";
	foreach ($chartype as $type) {
		if ($type == "line") {
			$js .= "\t\t\t\t'echarts/chart/line':'http://echarts.baidu.com/build/echarts',\n";
		}
		if ($type == "bar") {
			$js .= "\t\t\t\t'echarts/chart/bar':'http://echarts.baidu.com/build/echarts',\n";
		}
		if ($type == "pie") {
			$js .= "\t\t\t\t'echarts/chart/pie':'http://echarts.baidu.com/build/echarts',\n";
		}
	}
	$js .= "\t\t\t}\n";
	$js .= "\t\t});\n";
	return $js;
}

function ExPainter($chartype)
{
	$js = "";
	$js .= "\t\trequire(\n";
	$js .= "\t\t\t[\n";
	$js .= "\t\t\t\t'echarts',\n";
	foreach ($chartype as $type) {
		if ($type == "line") {
			$js .= "\t\t\t\t'echarts/chart/line',\n";
		}
		if ($type == "bar") {
			$js .= "\t\t\t\t'echarts/chart/bar',\n";
		}
		if ($type == "pie") {
			$js .= "\t\t\t\t'echarts/chart/pie',\n";
		}
	}
	$js .= "\t\t\t],\n";
	$js .= "\t\t\tfunction(ec){\n";
	return $js;
}

function FootPainter()
{
	$js = "";
	$js .= "\t\t\t}\n";
	$js .= "\t\t);\n";
	return $js;
}

function LinePainter($name, $title, $subtitle, $legend, $xAxis, $yFormat, $data)
{
	$js = "";
	$js .= "\t\t\t\tvar myChart = ec.init(document.getElementById($name));\n";
	$js .= "\t\t\t\tvar option = {\n";
	$js .= "\t\t\t\t\ttitle:{\n";
	$js .= "\t\t\t\t\t\ttext:$title,\n";
	$js .= "\t\t\t\t\t\tsubtext:$subtitle,\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\ttooltip:{\n";
	$js .= "\t\t\t\t\t\tshow:true\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\tlegend:{\n"; // legend
	$js .= "\t\t\t\t\t\tdata:".json_encode($legend)."\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\ttoolbox:{\n";
	$js .= "\t\t\t\t\t\tshow:true,\n";
	$js .= "\t\t\t\t\t\tfeature:{\n";
	$js .= "\t\t\t\t\t\t\tmark:{show:true},\n";
	$js .= "\t\t\t\t\t\t\tdataView:{show:true, readOnly:false},\n";
	$js .= "\t\t\t\t\t\t\tmagicType:{show:true, type:['line', 'bar']},\n";
	$js .= "\t\t\t\t\t\t\trestore:{show:true},\n";
	$js .= "\t\t\t\t\t\t\tsaveAsImage:{show:true}\n";
	$js .= "\t\t\t\t\t\t}\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\tcalculable:true,\n";
	$js .= "\t\t\t\t\txAxis:[{\n";
	$js .= "\t\t\t\t\t\ttype:'category',\n";
	$js .= "\t\t\t\t\t\tboundaryGap:'false',\n";
	$js .= "\t\t\t\t\t\tdata:".json_encode($xAxis)."\n";
	$js .= "\t\t\t\t\t}],\n";
	$js .= "\t\t\t\t\tyAxis:[{\n";
	$js .= "\t\t\t\t\t\ttype:'value',\n";
	$js .= "\t\t\t\t\t\taxisLabel:{\n";
	$js .= "\t\t\t\t\t\t\tformatter:'{value}$yFormat'\n";
	$js .= "\t\t\t\t\t\t}\n";
	$js .= "\t\t\t\t\t}],\n";
	$js .= "\t\t\t\t\tseries:".json_encode($data)."\n";
	$js .= "\t\t\t\t};\n";
	$js .= "\t\t\t\tmyChart.setOption(option);\n";
	return $js;
}

function BarPainter($name, $title, $subtitle, $legend, $xAxis, $yFormat, $data)
{
	$js = "";
	$js .= "\t\t\t\tvar myChart = ec.init(document.getElementById($name));\n";
	$js .= "\t\t\t\tvar option = {\n";
	$js .= "\t\t\t\t\ttitle:{\n";
	$js .= "\t\t\t\t\t\ttext:$title,\n";
	$js .= "\t\t\t\t\t\tsubtext:$subtitle,\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\ttooltip:{\n";
	$js .= "\t\t\t\t\t\tshow:true\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\tlegend:{\n"; // legend
	$js .= "\t\t\t\t\t\tdata:".json_encode($legend)."\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\ttoolbox:{\n";
	$js .= "\t\t\t\t\t\tshow:true,\n";
	$js .= "\t\t\t\t\t\tfeature:{\n";
	$js .= "\t\t\t\t\t\t\tmark:{show:true},\n";
	$js .= "\t\t\t\t\t\t\tdataView:{show:true, readOnly:false},\n";
	$js .= "\t\t\t\t\t\t\tmagicType:{show:true, type:['line', 'bar']},\n";
	$js .= "\t\t\t\t\t\t\trestore:{show:true},\n";
	$js .= "\t\t\t\t\t\t\tsaveAsImage:{show:true}\n";
	$js .= "\t\t\t\t\t\t}\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\tcalculable:true,\n";
	$js .= "\t\t\t\t\txAxis:[{\n";
	$js .= "\t\t\t\t\t\ttype:'category',\n";
	$js .= "\t\t\t\t\t\tboundaryGap:'false',\n";
	$js .= "\t\t\t\t\t\tdata:".json_encode($xAxis)."\n";
	$js .= "\t\t\t\t\t}],\n";
	$js .= "\t\t\t\t\tyAxis:[{\n";
	$js .= "\t\t\t\t\t\ttype:'value',\n";
	$js .= "\t\t\t\t\t\taxisLabel:{\n";
	$js .= "\t\t\t\t\t\t\tformatter:'{value}$yFormat'\n";
	$js .= "\t\t\t\t\t\t}\n";
	$js .= "\t\t\t\t\t}],\n";
	$js .= "\t\t\t\t\tseries:".json_encode($data)."\n";
	$js .= "\t\t\t\t};\n";
	$js .= "\t\t\t\tmyChart.setOption(option);\n";
	return $js;
}

function PiePainter($name, $title, $subtitle, $legend, $data)
{
	$js = "";
	$js .= "\t\t\t\tvar myChart = ec.init(document.getElementById($name));\n";
	$js .= "\t\t\t\tvar option = {\n";
	$js .= "\t\t\t\t\ttitle:{\n";
	$js .= "\t\t\t\t\t\ttext:$title,\n";
	$js .= "\t\t\t\t\t\tsubtext:$subtitle,\n";
	$js .= "\t\t\t\t\t\tx:'center'\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\ttooltip:{\n";
	$js .= "\t\t\t\t\t\ttrigger:'item',\n";
	$js .= "\t\t\t\t\t\tformatter:\"{a}</br>{b}:{c}({d}%)\",\n";
	$js .= "\t\t\t\t\t\tshow:true\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\tlegend:{\n"; // legend
	$js .= "\t\t\t\t\t\torient:'vertical',\n";
	$js .= "\t\t\t\t\t\tx:'left',\n";
	$js .= "\t\t\t\t\t\tdata:".json_encode($legend)."\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\ttoolbox:{\n";
	$js .= "\t\t\t\t\t\tshow:true,\n";
	$js .= "\t\t\t\t\t\tfeature:{\n";
	$js .= "\t\t\t\t\t\t\tmark:{show:true},\n";
	$js .= "\t\t\t\t\t\t\tdataView:{show:true, readOnly:false},\n";
	$js .= "\t\t\t\t\t\t\trestore:{show:true},\n";
	$js .= "\t\t\t\t\t\t\tsaveAsImage:{show:true}\n";
	$js .= "\t\t\t\t\t\t}\n";
	$js .= "\t\t\t\t\t},\n";
	$js .= "\t\t\t\t\tcalculable:true,\n";
	$js .= "\t\t\t\t\tseries:".json_encode($data)."\n";
	$js .= "\t\t\t\t};\n";
	$js .= "\t\t\t\tmyChart.setOption(option);\n";
	return $js;
}

?>
