<?php
/*
* 中医古籍阅读
* 作者：唐光良
* 网站：梦境天华站
* 网址：http://mst1739.com
*
* 电邮: 64934501@qq.com
* 微信：13660613039
*
* 文件名称：index.php
* 摘    要：古籍首页-目录
*
* 当前版本：V1.0
* 完成日期：2005年8月
*/

	session_start(); 
	$classname="中医古籍";
	include("./include/top.php");


	$newspath="./data/gujiyishu/";
	$num=30;

	$a=array();
	$namefile=array();
	$topidd=0;

	$hd=dir($newspath);

	$iii=0;

	while($filename = $hd->read())
	{

		$s=strtolower($filename);

		if(strlen($s)>2)
		{

			$entry1=explode("-",$s);

			$entry2=explode(".txt",$entry1[1]);

			$a[(int)$entry1[0]][0]=$entry2[0];

			$a[(int)$entry1[0]][1]=$s;

			$iii++;

		}

	}
	$hd->close();

?>

	<table align=center border="0" width=100% cellspacing="0" cellpadding="0"  bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
	<TR><td align=center id=all_shu>
	<?php

		show_list("本草",$a,0,38,4);
		show_list("方药",$a,39,122,4);
		show_list("经论",$a,421,502,4);
		show_list("妇幼",$a,123,203,4);
		show_list("四诊",$a,503,521,4);
		show_list("各论1",$a,204,420,4);
		show_list("各论2",$a,522,649,4);

		echo "<br><br>";

	?>


	</td>
	</TR>
	</TBODY>
	</TABLE>



</td>
</tr>
</table>

<?php


include('./include/bottom.php');

?>



<?php

	function show_list($class,$a,$start,$end,$col)
	{

		$str="";

		$w=(string)(100/$col)."%";

		$str.="<a name=".$class."></a><br><br>";

		$str.="<table width=90% cellspacing=3 cellpadding=0>";

		$col1=$col-1;

		$str.="<tr><td width=100% valign=bottom colspan=$col1>";

		$str.="<font style='font-size:16px;font-family:黑体'>●".$class."</font>";	

		$str.="</td>";
		$str.="<td align=right valign=bottom><a href=#Top>Top</a>&nbsp;</td>";
		$str.="</tr>";

		$str.="<tr><td width=100% height=1 colspan=$col bgcolor=#aaaaaa></td></tr>";


		for($i=$start;$i<=$end;$i++)
		{

			$str.="<tr bgcolor=#f0f0f0>";

			for($j=0;$j<$col;$j++)
			{
				$str.="<td width=$w height=20>&nbsp;&nbsp;&nbsp;";

					$ip=$i+$j;

					$temp=urlencode($a[$ip][0]);

					if($ip<=$end)
					{	
						$str.="<a href='yuedu_one.php?id=$ip&name=".$temp."' target=_blank>".$a[$ip][0]."</a>";
					}

				$str.="</td>";
			}

			$i+=$col-1;

			$str.="</tr>";
		}

		$str.="</table><br><br>";

		echo $str;

	}

?>