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
* 文件名称：book_show.php
* 摘    要：古籍首页-目录
*
* 当前版本：V1.0
* 完成日期：2005年8月
*/

	$zhuti="中医古籍";
	$id=$_GET["id"];
	$classname=$_GET["name"];
	$pian=$_GET["pian"];
	if($pian=="") $pian=0;
	$idd=$id;
	if(strlen($idd)==1) $idd="00".$id;
	if(strlen($idd)==2) $idd="0".$id;
	$filename="./data/gujiyishu/".$idd."-".$classname.".txt";

	if(!file_exists($filename))
	{
		echo "<center>文件不存在!!!</center>";
	}
	else
	{

		//---------------------------------------

		$fn=file($filename);

		$tree=array();

		$no=-1;

		$if_add=0;

		$str_len=0;

		$if_show_str=true;

		$file_line_num=count($fn)-1;

		for($i=5;$i<=$file_line_num;$i++)
		{

			if(strstr($fn[$i],"<目录>"))
			{

				$tree[++$no][2]="";

				$entry=explode("<目录>",$fn[$i]);
				$tree[$no][0]=trim($entry[1]);

				$entry=explode("<篇名>",$fn[$i+1]);
				$tree[$no][1]=trim($entry[1]);

				$if_add=($no>=$pian && $if_show_str)?1:0;

				$i+=2;

			}

			if($if_add==1)
			{

				$temp=trim($fn[$i]);

				$str_length=strlen($temp);

				$end=substr($temp,$str_length-2,2);

				$br="";

				if($end=="。") $br="<br>&nbsp;&nbsp;&nbsp;&nbsp;";

				$tree[$no][2].=$temp.$br;

				$str_len+=$str_length;

				if($str_len>5000 || $i>=$file_line_num)
				{
					$if_show_str=false;
					$pian_end=$no;			
				}

			}

		}


		$tree_num=count($tree);



?>

<html>
<head>
<LINK href="../css_js/style.css" rel=stylesheet type=text/css>
</head>
<body>
<br>

<TABLE align=center border=0 cellPadding=0 cellSpacing=0 width="90%">
<TBODY>
<TR>
	<TD align=center height=1 vAlign=middle width=100% >
	
	
	<?php

	if(isset($pian))
	{

	for($i=$pian;$i<=$pian_end;$i++)
	{

	?>

	<TABLE align=center style="BORDER-COLLAPSE: collapse" height=1 cellSpacing=0 cellPadding=0 width="95%" border=0>
	<TR>
		<TD width=100% style="font-size:20px;line-height:56px;font-family:黑体" valign=bottom >
		<?php
			if($tree[$i][0]!="")
			{
				echo "[".$tree[$i][0]."]&nbsp;";
			}

			echo "<u>".$tree[$i][1]."</u>";
		?>
		</td>
	</tr>
	<TR>
		<TD width=100% style="font-size:16px;line-height:38px" valign=bottom  background="./images/line_bg.gif" >&nbsp;&nbsp;&nbsp;&nbsp;<?php

			$tree[$i][2]=str_replace("属性：","",$tree[$i][2]);

			$tree[$i][2]=str_replace("内容：","",$tree[$i][2]);

			$tree[$i][2]=str_replace(" ","",$tree[$i][2]);

			$tree[$i][2]=str_replace("\r","<br>&nbsp;&nbsp;&nbsp;&nbsp;",$tree[$i][2]);

			$tree[$i][2]=str_replace("\n","<br>&nbsp;&nbsp;&nbsp;&nbsp;",$tree[$i][2]);

			$tree[$i][2]=str_replace("\x","<br>&nbsp;&nbsp;&nbsp;&nbsp;",$tree[$i][2]);

			echo $tree[$i][2];

		?>
		</td>
	</tr>

	</table>
	<br>

	<?
	}

}




	if(isset($pian))
	{

	?>
	<br>
	<TABLE align=center border=0 cellPadding=2 cellSpacing=0 width="95%" bgcolor=#ffffff>
	<TR >
		<TD align=left valign=bottom width=100%>
		<font style='font-size:12px'>前一页&nbsp;◇</font>
		<?php
			
			$p_no=$pian-1;

			if($p_no>=0)
			{
				echo "<a href='book_show.php?id=$id&name=".$classname."&pian=".$p_no."' target=_self>".$tree[$p_no][1]."</a>";
			}	

		?>
		</td>
		</tr>
		<tr><TD width=100% height=1 bgcolor=#dddddd></td></tr>
		<tr><TD width=100% height=3></td></tr>
		<tr>
		<TD align=right width=100%>
		<font style='font-size:12px'>后一页&nbsp;◇</font>
		<?php
			
			$p_no=$pian_end+1;

			if($p_no<$tree_num)
			{
				echo "<a href='book_show.php?id=$id&name=".$classname."&pian=".$p_no."' target=_self>".$tree[$p_no][1]."</a>";
			}

		?>

		</td>
		</tr>
	</table>
	<?php

	}

}

?>




	</TD>
</TR>
</TBODY>
</TABLE>

<br><br>

</td>
</tr></table>
	
</body>
</html>


<script>

	while(parent.document.body.scrollTop>0)
	{
		parent.document.body.scrollTop-=parent.document.body.scrollTop/100;
	}

</script>
