<?php
/*调用实例*/
require_once("db_class.php"); //引入数据库类文件


/*实例化类：*/
$db=new mysql("localhost","root","","phper100","conn","utf8");


//echo $db->mysql_server(1);       //取得mysql服务器信息，可独立使用
//print_r($db->databases());       //以数组形式返回主机中所有数据库名
//$db->show_databases();           //查看mysql服务器上所有数据库，无需任何参数，可独立使用
//$db->show_tables("test");        //查看数据库中所有，参数数据库名请与实例化的类相同
//$db->create_database("gougou");  //创建数据库，可独立使用


/*完整的sql写法*/
//$db->query("SELECT * FROM phper100_abcd");
//$db->query("INSERT phper100_abcd (id,title,content,add_time) VALUES ('','江南情缘工作','要努力工作',now())");
//$db->query("UPDATE phper100_abcd SET  title='ganyuanfang',content='ganyuanfang' WHERE id ='1'");																									
//$db->query("DELETE FROM phper100_abcd WHERE title ='ganyuanfang'");																									

/*简化操作*/
//$db->findall("phper100_abcd");
//$db->select("phper100_abcd","",""); //第一个参数表名，第二个参数查询字段，为空就是默认全部，第三个参数查询的条件，可以为空
//$db->insert("phper100_abcd","title,content","'工作','夜深了睡觉吧'");
//$db->update("phper100_abcd","title='工作很辛苦吗',content='再累都不辛苦'","id=15");
//$db->delete("phper100_abcd","id=14")


//输出表的字段信息,可独立使用
//$db->num_fields("phper100_abcd");

//返回表的查询记录总数
//$db->select("phper100_abcd","","");
//echo $db->db_num_rows($rs);

//查询指定记录
//$db->select("phper100_abcd","","");
//$db->db_data_seek("11");
//if(!($row = $db->fetch_object($result))) continue;
//echo "$row->title $row->content<br />\n";


/*完整select查询循环*/
/*
$db->query("select * from phper100_abcd");
echo "查询记录总数：".$amount =$db->db_num_rows($rs);
echo "<br />";
while($row = $db->fetch_array($rs)){
	echo "ID $row[id] ， CONTENT $row[content] , ADDTIME $row[add_time]";
	echo "<br />";
}
*/



?>