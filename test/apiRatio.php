<?php
	$config=require_once 'config.php';
	$conn = new PDO($config['dsn'],$config['user'],$config['password']);
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

	if(empty($_POST['RequestType']))
	{
		$results=ApiWrapper(0);
		exit(json_encode($results));
	}

	switch ($_POST['RequestType']) {
		case "SexRatio":
			if(isset($_POST['UPDATE']))
			{
				if($_POST['UPDATE']==123)
				Update($conn,$academy);
				exit("Update successfully!");
			}
			else
			{
				$results=GetData($conn);
				$ReturnResult=ApiWrapper(1);
				$ReturnResult['Data']=$results;
				exit(json_encode($ReturnResult));
			}
			break;

		case "QQGroup":
			$results=$conn->query("SELECT * FROM QQGroup")->fetchAll(PDO::FETCH_ASSOC);
			$ReturnResult=ApiWrapper(1);
			$ReturnResult['Data']=$results;
			exit(json_encode($ReturnResult));
			break;

		case 'WorkRatio':
			$results=WorkRatio();
			$ReturnResult=ApiWrapper(1);
			$ReturnResult['Data']=$results;
			exit(json_encode($ReturnResult));
			break;

		case 'FailRatio':
			$results=testRatio($conn);
			$ReturnResult=ApiWrapper(1);
			$ReturnResult['Data']=$results;
			exit(json_encode($ReturnResult));
			break;

		default:
			$results=ApiWrapper(0);
			exit(json_encode($results));
			break;
	}


	function Update($conn,$academy)
	{
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

	function GetData($conn)
	{
		$results=$conn->query("SELECT `college`,`MenRatio`,`WomenRatio` FROM SexRatio")->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}


	function WorkRatio()
	{
		$Ratio=array(
			'生物信息学院'=>0.9724,
			'传媒艺术学院'=>0.9647,
			'先进制造工程学院'=>0.9661,
			'计算机科学与技术学院'=>0.9613,
			'理学院'=>0.9593,
			'体育学院'=>0.9559,
			'光电工程学院/重庆国际半导体学院'=>0.9553,
			'软件工程学院'=>0.9371,
			'经济管理学院'=>0.9231,
			'通信与信息工程学院'=>0.9231,
			'自动化学院'=>0.9104,
			'外国语学院'=>0.8611,
			'法学院'=>0.7222
			);
		return $Ratio;
	}

	function testRatio($conn)
	{
		$results=$conn->query("SELECT `course`,`ratio`,`college`,`major` FROM failratio")->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	function ApiWrapper($status)
	{
		$version='1.0';
		if($status==1)
		{
			return array(
				'Status'=>200,
				'Info'=>'成功',
				'Version'=>$version,
				'Data'=>''
				);
		}
		else
			return array(
				'Status'=>404,
				'Info'=>'失败',
				'Version'=>$version,
				'Data'=>'None'
			);

	}

/*	function HardestSubjectDataGet($subject,$conn,$test,$_POST) {

	}

		$arr=array(
		'通信与信息类',
		'通信工程专业卓越工程师班',
		'通信学院IT精英班',
		'广电与数字媒体类',
		'英语(中加)',
		'电子工程类',
		'信息管理与信息系统',
		'经济学',
		'工程管理',
		'工商管理类',
		'电子商务大类',
		'信息安全专业卓越工程师班',
		'计算机与智能科学类',
		'计算机科学与技术专业卓越工程师班',
		'英语类',
		'生物医学工程',
		'生物信息学',
		'法学类',
		'自动化与电气工程类',
		'自动化专业卓越工程师班',
		'社会体育指导与管理',
		'数理科学与信息技术类',
		'应用物理学专业实验班',
		'广播电视编导',
		'广播电视编导专业实验班',
		'艺术设计类',
		'数字媒体艺术与动画大类',
		'英语+软件',
		'软件工程',
		'软件工程专业卓越工程师班',
		'日语+软件',
		'先进制造大类',
		'电子信息工程(中美)',
		'软件工程（中外）',
		'集成电路工程类',
		'微电子科学与工程专业实验班',
		);
		$conn->query('set names utf8');
		$conn->query("set character set 'utf8");
		$results=$conn->query('SELECT * FROM score WHERE id =1')->fetch(PDO::FETCH_ASSOC);
		var_dump($results);*/