<?php
/*
* ��ҽ�ż��Ķ�
* ���ߣ��ƹ���
* ��վ���ξ��컪վ
* ��ַ��http://mst1739.com
*
* ����: 64934501@qq.com
* ΢�ţ�13660613039
*
* �ļ����ƣ�book_menu.php
* ժ    Ҫ������Ŀ¼��ʾ
*
* ��ǰ�汾��V1.0
* ������ڣ�2005��8��
*/


	if($pian=="") $pian=0;

	$idd=$id;

	if(strlen($idd)==1) $idd="00".$id;

	if(strlen($idd)==2) $idd="0".$id;

	$filename="./data/gujiyishu/".$idd."-".$classname.".txt";

	if(!file_exists($filename))
	{
		echo "<center>�ļ�������!!!</center>";
	}
	else
	{

		$fn=file($filename);

		$entry=explode("��",$fn[1]);
		$title=trim($entry[1]);

		$entry=explode("��",$fn[2]);
		$author=trim($entry[1]);

		$entry=explode("��",$fn[3]);
		$chaodai=trim($entry[1]);

		$entry=explode("��",$fn[4]);
		$shiqi=trim($entry[1]);


		echo "<TABLE id='all_shu' align=center style='BORDER-COLLAPSE:collapse' height=1 cellSpacing=0 cellPadding=0 width=100% border=0>";

		echo "<TR><TD width=300 vAlign=top align=center style='line-height:26px' bgcolor=#EDEBD9>";

		echo "<table align=center width=100% cellSpacing=1 cellPadding=5>";

		echo "<tr>";
			echo "<td  bgcolor=#DEDBBB height=50 align=center>";
				echo "<font style='font-size:28px' face='����'><u>".$title."</u></font>";
			echo "</td>";
		echo "</tr>";

		echo "<tr><td  height=3 align=center width=100%></td></tr>";

		echo "</table>";




		echo "<table align=center width=100% cellSpacing=1 cellPadding=5>";
		echo "<tr><td nowrap bgcolor=#eEeBdB align=center height=1>";
		//	echo "<p align=left><a href='javascript: d.openAll();'>ȫĿ¼</a> | <a href='javascript: d.closeAll();'>��Ŀ¼</a></p>";
		echo "</td></tr>";
		echo "</table>";


		echo "</td>";
		echo "</tr>";
		echo "</table>";




}

?>
<br>
<link rel="StyleSheet" href="./css_js/dtree.css" type="text/css" />
<script type="text/javascript" src="./css_js/dtree.js"></script>
<div class="dtree">
<table width=100%>
<tr>
<td>&nbsp;</td>
<td align=left width=100%>
<script type="text/javascript"><!--
d = new dTree("d");
d.add(0,-1,"","");

<?php


		$tree=array();

		$no=-1;

		$if_add=0;

		$str_len=0;

		$if_show_str=true;

		$file_line_num=count($fn)-1;

		for($i=5;$i<=$file_line_num;$i++)
		{

			if(strstr($fn[$i],"<Ŀ¼>"))
			{

				$tree[++$no][2]="";

				$entry=explode("<Ŀ¼>",$fn[$i]);
				$tree[$no][0]=trim($entry[1]);

				$entry=explode("<ƪ��>",$fn[$i+1]);
				$tree[$no][1]=trim($entry[1]);

				$if_add=($no>=$pian && $if_show_str)?1:0;

				$i+=2;

			}

			if($if_add==1)
			{

				$tree[$no][2].=$fn[$i];

				$str_len+=strlen($fn[$i]);

				if($str_len>5000 || $i>=$file_line_num)
				{
					$if_show_str=false;
					$pian_end=$no;			
				}

			}

		}



		$tree_num=count($tree);

		$pian_temp="";

		$pian_temp_id=0;

		$pian_show_id=0;

		for($i=0;$i<$tree_num;$i++)
		{

			if($tree[$i][0]!=$pian_temp)
			{

				$pian_show_id++;

				$tree_title=($tree[$i][0]!="")?$tree[$i][0]:$tree[$i][1];
				echo "d.add(".$pian_show_id.",0,'".$tree_title."','');\n";
				$pian_temp=$tree[$i][0];
				$pian_temp_id=$pian_show_id;

	
				if($tree[$i][0]!="" || $tree[$i][1]!="")
				{
					$pian_show_id++;
					$tree_title=($tree[$i][1]!="")?$tree[$i][1]:$tree[$i][0];
					echo "d.add(".$pian_show_id.",".$pian_temp_id.",'".$tree_title."','book_show.php?id=$id&name=".$classname."&pian=".$i."','','main_show_frame');\n";
				}

			}
			else
			{
				if($tree[$i][0]!="" || $tree[$i][1]!="")
				{
					$pian_show_id++;
					$tree_title=($tree[$i][1]!="")?$tree[$i][1]:$tree[$i][0];
					echo "d.add(".$pian_show_id.",".$pian_temp_id.",'".$tree_title."','book_show.php?id=$id&name=".$classname."&pian=".$i."','','main_show_frame');\n";
				}
			}

		}


?>


document.write(d);
//-->
</script>
</td>
</tr>
</table>
