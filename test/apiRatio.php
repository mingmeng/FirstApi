<?php

	$config=require_once 'config.php';
	$conn = new PDO($config['dsn'],$config['user'],$config['password']);
	if(empty($_POST['RequestType']))
		die('error');
	switch ($_POST['RequestType']) {
		case "SexRatio":
			if(!isset($_POST['college']))
			{
				exit("error!");
			}
			else if(isset($_POST['UPDATE']))
			{
				if($_POST['UPDATE']==123)
				Update($conn);
				exit("Update successfully!");
			}
			else
				GetData($_POST['college'],$conn);
			break;

		case "QQGroup":
			$results=$conn->query("SELECT * FROM QQGroup")->fetchAll(PDO::FETCH_ASSOC);
			exit(json_encode($results));
			break;
				
		default:
			exit('error!');
			break;
	}


	function Update($conn)
	{

		$academy=array (
				'通信与信息工程学院',
				'光电工程学院',
				'经济管理学院',
				'计算机科学与技术学院',
				'外国语学院',
				'生物信息学院',
				'网络空间安全与信息法学院',
				'自动化学院',
				'先进制造工程学院',
				'体育学院',
				'理学院',
				'传媒艺术学院',
				'软件工程学院',
				'国际半导体学院',
				'国际学院',
				'全校'
			);
		for ($i=0; $i <count($academy) ; $i++) { 
			if($i==15){
				$women=$conn->query("SELECT COUNT(`id`) as `num` FROM student WHERE gender=1 and `grade` > 2013")->fetch(PDO::FETCH_BOTH)[0];
				$men=$conn->query("SELECT COUNT(`id`) as `num` FROM student WHERE gender=0 and `grade` > 2013")->fetch(PDO::FETCH_BOTH)[0];
				$MenRatio=$men/($men+$women);
				$WomenRatio=$women/($men+$women);
				$sql=$conn->query("UPDATE SexRatio SET `MenRatio` = '{$MenRatio}',`WomenRatio` = '{$WomenRatio}' WHERE `college` = '全校'");
				break;
			}
			$women=$conn->query("SELECT COUNT(`id`) as `num` FROM student WHERE gender=1 and `college`='{$academy[$i]}' and `grade` > 2013")->fetch(PDO::FETCH_BOTH)[0];
			$men=$conn->query("SELECT COUNT(`id`) as `num` FROM student WHERE gender=0 and `college`='{$academy[$i]}' and `grade` > 2013")->fetch(PDO::FETCH_BOTH)[0];
			$MenRatio=$men/($men+$women);
			$WomenRatio=$women/($men+$women);
			$sql=$conn->query("UPDATE SexRatio SET `MenRatio` = '{$MenRatio}',`WomenRatio` = '{$WomenRatio}' WHERE `college` = '{$academy[$i]}'");
		}
	}

	function GetData($college,$conn)
	{
		$results=$conn->query("SELECT * FROM SexRatio WHERE `college` = '{$college}'")->fetch(PDO::FETCH_ASSOC);
		exit(json_encode($results));
	}

