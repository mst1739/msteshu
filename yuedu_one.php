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
* 文件名称：yuedu_one.php
* 摘    要：内容显示
*
* 当前版本：V1.0
* 完成日期：2005年8月
*/


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
		exit;
	}
	else
	{

		$zhuti="梦境天华站-中医古籍";
		include("./include/top.php");

?>

<script>

function SetCwinHeight(iframeObj){ 

if (document.getElementById){ 
   if (iframeObj && !window.opera){ 
   if (iframeObj.contentDocument && iframeObj.contentDocument.body.offsetHeight){ 
   iframeObj.height = iframeObj.contentDocument.body.offsetHeight; 
   }else if(document.frames[iframeObj.name].document && document.frames[iframeObj.name].document.body.scrollHeight){ 
   iframeObj.height = document.frames[iframeObj.name].document.body.scrollHeight; 
   } 
   } 
} 
} 

</script>

<TABLE id='all_shu' align=center style='BORDER-COLLAPSE:collapse' height=1 cellSpacing=0 cellPadding=0 width=100% border=0>

<?php
	$menu_ys=($_SESSION["guji_yuedu_menu_show"]==1)?"display:none1":"display:none";
?>


<TR><TD width=335 id='menu_lan' name='menu_lan' vAlign=top align=center style='line-height:26px;<?php echo $menu_ys; ?>' bgcolor=#f0f0f0>

	<TABLE align=center cellSpacing=0 cellPadding=0 width=100% height=100% border=0>
	<TR><TD width=100% align=left valign=top>
	<?php
		$id=$_GET["id"];
		$name=$_GET["name"];
		include("book_menu.php");
	?>
	</TD>
	<TD align=center vAlign=bottom  bgcolor=#EDEBD9 background='./images/left_back.gif'><div style='width:35px;'></div></td>
	</TR>
	</TABLE>
	<div style='width:335px'></div>

</td>
<td width=100% valign=top  bgcolor=#EDEBD9>

	<script>

	function menu_key()
	{

		if(document.all["menu_lan"].style.display=="none")
		{
			document.all["menu_lan"].style.display="";
			window.open("make_session.php?key=guji_yuedu_menu_show@1","doing");
		}
		else
		{
			document.all["menu_lan"].style.display="none";
			window.open("make_session.php?key=guji_yuedu_menu_show@0","doing");
		}

		return false;		
	}

	</script>

	<?php

		echo "<table align=center width=90% cellSpacing=1 cellPadding=5>";

		echo "<tr>";
			echo "<td height=53 align=center nowrap>";
				echo "<font style='font-size:16px' face='黑体'><u>".$title."</u></font>";
			echo "</td>";
			echo "<td  height=53 align=left valign=bottom width=100%>";
		if($chaodai!="")
		{
			echo "<font style='font-size:14px'>".$chaodai."</font>&nbsp;";
		}
		if($author!="")
		{
			echo "<font style='font-size:14px'>".$author."</font>&nbsp;";
		}

		if($shiqi!="")
		{
			echo "<font style='font-size:14px'>".$shiqi."</font>";
		}
			echo "</td>";
		echo "</tr>";

		echo "</table>";

	?>

	<TABLE align=center border=0 cellPadding=0 cellSpacing=0 width="90%">
	<TBODY>
	<TR>
		<TD height=6 width=6><IMG src="./images/bt_top_l.gif"></TD>
		<TD background=./images/bt_top_m.gif height=6 width="100%"></TD>
		<TD height=6 width=6><IMG src="./images/bt_top_r.gif"></TD>
	</TR>
	</TBODY>
	</TABLE>

	<TABLE align=center border=0 cellPadding=0 cellSpacing=0 width="90%"  bgcolor=#ffffff>
	<TBODY>
	<TR>
		<TD bgColor=#E7CC9E height=1 width=1><div style='width:1px'></div></TD>
		<TD bgColor=#ffffff height=1 width=1></TD>
		<TD align=center height=1 vAlign=middle width=100% >

			
			<TABLE align=center cellSpacing=0 cellPadding=0 width=100% border=0>
			<TR><TD width=100% align=center valign=middle style='font-size:14px;line-height:20px'><div onclick="menu_key();" style='cursor:pointer;font-size:14px'>&nbsp;>&nbsp;目录开关&nbsp;<&nbsp;</div><br></td></tr>
			<TR><TD width=100% align=center valign=middle style='font-size:14px;line-height:20px'>
				<iframe name='main_show_frame' id='main_show_frame'  width=100% scrolling=no frameborder=0 src='./book_show.php?id=<?php echo $_GET["id"]; ?>&name=<?php echo $_GET["name"]; ?>&pian=<?php echo $_GET["pian"]; ?>' onload='SetCwinHeight(this)'></iframe>
			</TD></TR>
			</TABLE>

		</TD>
		<TD bgColor=#E7CC9E height=1 width=1><div style='width:1px'></div></TD>
	</TR>
	</TBODY>
	</TABLE>


	<TABLE align=center border=0 cellPadding=0 cellSpacing=0 width="90%"  bgcolor=#ffffff>
	<TBODY>
	<TR>
		<TD height=6 width=6><IMG src="./images/bt_l.gif"></TD>
		<TD background=./images/bt_m.gif height=6 width="100%"></TD>
		<TD height=6 width=6><IMG src="./images/bt_r.gif"></TD>
	</TR>
	</TBODY>
	</TABLE>




<br><br>

</td></tr></table>
	
<?php include("./include/bottom.php"); ?>

</body>
</html>

<?php
}
?>



