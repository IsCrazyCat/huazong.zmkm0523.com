<?php
$mysql_server_name='127.0.0.1'; //�ĳ��Լ���mysql���ݿ������
$mysql_username='huazong'; //�ĳ��Լ���mysql���ݿ��û���
$mysql_password='huazong'; //�ĳ��Լ���mysql���ݿ�����
$mysql_database='huazong_zmkm0523_com'; //�ĳ��Լ���mysql���ݿ���
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //�������ݿ�
mysql_select_db($mysql_database); //�����ݿ� $_W['os'] 
?>
