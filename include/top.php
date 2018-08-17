<?php
	session_start(); 
	$zhuti="梦境天华站@中医古籍";

?>

<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE><?php echo $zhuti; ?></TITLE>
<META content="text/html; charset=gb2312" http-equiv=Content-Type>
<LINK href="./css_js/style.css" rel=stylesheet type=text/css>
</HEAD>

<STYLE type=text/css>

.glow{FILTER:Glow(Color=#330000, Strength=1)}

.title_menu {
	POSITION:absolute;
	left:390px;
	top:10px;
	Z-INDEX: 2; 
	}

.body_div {

	POSITION:absolute;
	width:0px;
	height:0px;
	left:0px;
	top:0px;
	BACKGROUND: #ffffff;
	Z-INDEX:999999999999; 

	}

.yinying {
	BORDER-LEFT:#aaaaaa 1px solid;
	BORDER-RIGHT:#aaaaaa 1px solid;
	BORDER-TOP:#aaaaaa 1px solid;
	BORDER-BOTTOM: #aaaaaa 1px solid;

	PADDING-LEFT:1px;
	PADDING-RIGHT:1px;
	PADDING-TOP:1px;
	PADDING-BOTTOM:1px;

	POSITION:absolute;
	width:0px;
	height:0px;
	left:0px;
	top:0px;
	BACKGROUND: #dddddd;
	Z-INDEX: 1; 

	FILTER: progid:DXImageTransform.Microsoft.Shadow(color="#eeeeee", Direction=135, Strength=1) alpha(Opacity=98);

	}

</style>

<SCRIPT language=javascript>
<!--

	var bak_bgcolor="";

	function set_bgcolor(obj,color)
	{
		obj.style.cursor='hand';
		bak_bgcolor=obj.bgColor;
		obj.bgColor=color;
	}
	
	function clr_bgcolor(obj)
	{
		obj.style.cursor='default';
		obj.bgColor=bak_bgcolor;
	}


	function main_show_div_clear()
	{
		document.all.show_title.innerHTML="";
		document.all.main_show.innerHTML="";
		document.all.main_show_div.style.display='none';
		return false;
	}
//-->
</script>
<iframe id='doing' name='doing' display='none' style="width:0px;height:0px;" frameborder="0"></iframe>
<BODY bgcolor=#ffffff  onkeydown='dosome(window.event)'>
<TABLE border=0 cellPadding=0 cellSpacing=0 width="100%">
<TR bgcolor=#FFCB9C>

	<TD width=1><IMG src="./images/yifayuantong1.jpg" border=0></td>
	<td align=left valign=bottom> 
		<table border=0 cellSpacing=0 cellPadding=0>
		<tr>
		<td>
		<table border=1 cellSpacing=0 cellPadding=0 style='border-collapse:collapse' bordercolor=#B06114 height=20>
		<tr>
			<td nowrap bgcolor="#FED4AD" align=center valign=bottom align=center onmouseover=set_bgcolor(this,'#FCE366'); onmouseout=clr_bgcolor(this);>&nbsp;<a href="./yuedu.php" target="_self"><font style='font-size:14px'>中医古籍</font></a>&nbsp;</td>
		</tr>
		</table>
		</td>
		</tr></table>
		<table border=0 cellSpacing=0 cellPadding=0 height=1><tr><td></td></tr></table>
	</td>
	<td align=right valign=top nowrap><br>
		<table border=0 cellSpacing=0 cellPadding=0 width=100% height=100%>
		<tr><td height=6><tr><td align=right>
		<a href="http://mst1739.com/liuyan.php" target="_self"><font style='font-size:14px'><u>留言</u></font></a>
		|
		<a href="http://mst1739.com/" target="_self"><font style='font-size:14px'><u>梦境天华主站</u></font></a>
		&nbsp;	&nbsp;
		</td></tr>
		<tr><td height valign=bottom><tr><td></td></tr>
		</table>
	</td>
</TR>
</TABLE>


<TABLE border=0 cellPadding=0 cellSpacing=0 width="100%">
<TR><TD height=1 width=100% bgcolor=#555555></TD></TR>
</TABLE>

