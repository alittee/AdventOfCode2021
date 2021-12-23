<?php

Class Day13
{
	public $inputs = array();
	public $entry;
	public $x_folds = array();
	public $y_folds = array();
	private $width = 0;
	private $height = 0;
	
	public function __construct($file_name, $folds_name) {
		$this->GetInputs($file_name);
		$this->GetFolds($folds_name);
	}
	
	private function GetInputs($file_name)
	{
		//$file = fopen($file_name, "r") or die("Unable to open file!");
		//$lines = explode("\n", fread($file, filesize($file_name)));
		//fclose($file);
		$lines = ["6,10","0,14","9,10","0,3","10,4","4,11","6,0","6,12","4,1","0,13","10,12","3,4","3,0","8,4","1,10","2,14","8,10","9,0"];
		$lines = ["94,530","698,875","221,18","1232,443","689,509","1153,225","239,16","1265,275","589,264","594,766","882,159","1245,435","6,686","383,488","497,535","601,353","326,330","1277,509","773,239","331,567","174,43","1047,551","771,358","716,871","1215,346","228,357","703,647","1272,299","363,668","967,248","1145,490","160,194","912,410","227,623","1041,402","811,257","50,505","67,772","211,275","751,38","1078,311","552,590","1280,389","1031,91","102,654","361,590","50,241","1225,445","658,773","1101,844","785,89","244,294","984,564","703,592","430,493","703,131","214,345","922,247","706,35","515,410","724,560","1113,325","735,70","1195,747","244,136","572,92","1285,889","813,227","1245,591","423,38","962,708","489,42","865,687","798,603","271,777","1299,854","55,117","885,182","952,680","1126,99","129,275","69,770","1305,1","65,683","880,204","224,142","1235,151","174,345","1285,827","1263,112","1215,548","50,884","556,805","288,147","167,259","47,434","417,796","609,54","147,79","848,385","1305,451","795,585","569,472","197,649","837,371","306,862","924,863","539,171","1220,414","909,749","1041,191","666,28","716,128","1091,613","927,614","686,120","1200,98","1255,466","161,294","952,438","43,651","445,739","1235,781","217,501","42,371","33,304","386,863","783,575","999,304","412,527","239,591","303,624","622,794","186,572","785,469","1213,712","311,696","459,240","922,43","694,523","107,820","1181,619","1007,624","454,847","607,434","1225,893","393,795","1113,693","430,752","388,549","433,402","115,723","522,376","713,624","801,819","884,145","60,871","823,259","1263,24","124,875","601,725","459,654","1190,19","1113,309","1298,798","1086,817","1231,294","919,551","151,700","539,536","574,449","544,546","604,35","569,422","25,148","1230,781","587,351","915,95","1056,851","1170,630","915,150","1278,100","552,142","132,518","129,537","1265,726","410,316","1285,372","763,57","11,563","1076,348","82,802","977,256","1260,35","470,795","1039,366","388,345","1225,870","1208,240","1016,346","244,758","254,851","244,86","1310,493","567,71","11,115","1230,449","711,565","157,225","856,847","350,583","694,595","1267,651","1115,128","1110,47","1233,333","1208,654","27,333","845,665","539,397","445,687","1041,703","800,607","960,535","288,803","165,294","537,168","186,322","686,680","1099,723","607,302","1101,626","375,593","525,201","609,51","373,207","20,829","157,618","11,854","139,36","1009,596","657,647","410,578","301,521","348,186","69,796","1086,204","771,210","515,833","924,31","1288,359","647,301","949,749","527,127","1207,280","689,23","629,827","661,767","1034,483","785,201","500,851","853,721","1183,220","735,824","437,841","959,624","601,801","1153,669","224,369","741,445","457,721","385,492","1195,397","828,267","1039,152","415,814","785,581","209,50","1153,618","25,827","821,42","271,614","721,264","1038,534","900,561","726,715","1017,593","795,36","197,693","758,240","701,627","557,438","856,47","497,359","426,145","594,128","883,159","1113,203","604,211","925,639","927,329","57,165","807,331","258,535","905,2","745,383","629,789","411,712","348,513","145,159","80,449","412,367","922,269","232,306","415,815","1014,774","382,534","950,324","803,752","243,182","895,416","395,346","246,70","657,695","539,312","455,660","261,815","386,31","47,460","816,194","214,212","599,117","1186,875","621,509","845,682","683,781","415,192","244,600","157,807","599,565","909,348","788,341","102,401","242,199","718,623","962,186","77,674","279,91","884,537","537,339","430,401","547,728","706,57","899,712","233,210","1054,133","195,94","234,800","679,645","845,821","545,877","597,624","560,87","768,72","269,255","723,351","383,329","1208,80","233,236","15,847","704,136","949,593","1243,122","321,451","314,768","1245,640","1243,827","1288,535","1071,430","612,875","1220,480","648,208","758,752","979,623","1071,591","542,212","455,220","89,511","898,367","415,863","686,57","127,212","358,241","937,504","1113,17","851,240","343,752","575,70","366,539","12,798","229,357","694,299","698,75","1260,505","25,522","1089,453","358,438","1150,194","1184,847","801,75","851,128","80,781","1099,275","1179,128","582,704","45,331","38,299","1073,369","1242,670","925,492","259,772","221,5","209,319","1245,683","1179,318","1250,542","261,795","1158,82","161,714","5,1","1207,614","783,569","1205,624","688,794","890,240","375,472","502,68","989,575","428,159","195,766","689,749","547,57","299,113","36,271","1068,3","1263,220","888,588","502,569","917,99","900,578","47,220","1081,357","870,549","237,749","430,849","1195,723","900,310","793,560","741,449","831,476","433,492","1073,322","1086,369","959,270","334,686","1228,362","90,414","507,367","412,871","851,352","70,627","33,509","152,826","539,582","755,175","405,450","507,424","528,47","1165,159","1032,360","1250,871","987,719","932,483","821,600","566,777","724,476","1004,708","937,275","1086,33","1073,145","865,207","1081,327","358,689","525,469","261,192","927,186","0,401","724,334","127,767","917,254","709,93","567,255","361,369","1171,36","527,276","527,679","566,49","726,267","835,200","373,619","771,684","445,851","825,618","465,821","358,217","1263,560","406,115","1200,460","1082,593","485,186","923,485","343,740","426,357","570,891","274,236","355,113","165,376","1081,771","291,226","877,889","917,547","480,569","73,546","782,847","1195,312","1295,847","290,847","55,466","808,549","209,626","870,212","433,876","267,409","1183,773","1226,199","22,359","621,357","229,119","913,348","160,700","206,539","534,19","1041,553","1159,3","979,775","291,312","1113,245","417,301","282,551","1203,389","1029,267","465,229","1006,135","1166,607","1195,110","880,401","570,443","733,333","375,723","137,560","1173,560","303,49","930,210","681,446","209,844","25,746","1086,304","1153,807","1260,389","296,205","821,516","935,723","1082,145","773,339","32,346","1263,782","448,803","853,247","107,389","68,476","420,546","793,334","771,397","694,803","547,389","977,319","1039,565","561,236","559,184","750,87","1145,294","490,621","667,563","661,443","527,220","862,467","1022,91","197,201","171,705","1155,637","704,758","50,35","195,318","882,735","1242,476","662,208","855,212","92,124","248,442","745,572","858,691","1086,861","701,838","348,750","50,145","877,453","102,814","50,859","1241,796","661,127","271,117","68,535","231,548","293,752","440,613","604,859","929,568","256,133","587,515","663,301","920,495","967,198","228,593","691,836","1082,357","835,246","1129,147","768,568","808,180","1203,148","1310,655","258,588","837,819","224,33","490,273","880,690","715,840","401,546","1069,63","542,568","1285,334","880,493","1066,86","1096,345","736,449","258,359","1300,361","724,418","1227,264","609,715","152,549","713,105","373,838","75,113","475,246","1200,796","649,443","552,752","821,294","32,324","766,546","708,658","744,845","272,534","488,638","795,484","53,1","219,515","1113,761","733,561","853,581","949,200","60,493","1228,84","5,893","185,633","209,268","877,18","840,99","331,775","952,653","197,17","480,325","171,854","102,449","937,723","783,851","711,728","209,575","517,334","1029,627","1081,119","504,894","427,159","895,16","181,747","512,603","701,54","266,1","338,740","607,197","155,637","914,588","324,213","55,329","1235,743","169,276","197,877","1104,19","179,470","243,712","602,658","900,92","393,99","410,92","1039,280","1014,680","994,861","927,280","253,301","1233,561","1044,549","485,260","589,470","102,80","507,143","457,581","706,837","509,159","1004,144","415,366","214,281","237,572","112,774","920,399","766,348","324,325","1260,859","607,112","900,802","72,179","830,569","1161,710","373,396","269,639","922,177","714,843","1135,292","333,506","90,480","67,827","1077,210","596,843","443,275","820,273","873,841","1014,438","306,144","479,602","987,327","703,302","552,829","232,311","1257,353","393,264","990,208","12,96","979,719","497,667","1007,270","353,827","947,668","271,708","221,453","102,445","221,402","393,254","1068,199","253,266","231,856","1113,585","731,319","518,584","301,821","923,877","147,815","701,267","1108,203","329,292","425,323","986,213","817,628","1183,682","72,715","256,410","475,200","709,801","564,414","120,19","459,352","949,145","390,399","1044,585","242,695","445,50","1046,399","1044,43","840,200","206,19","82,810","67,351","144,287","304,135","127,575","1126,795","566,397","68,670","624,241","522,518","1260,145","1031,472","244,578","758,829","223,17","321,388","624,568","1086,466","1235,878","793,441","165,742","586,672","564,480","197,203","294,548","1268,371","880,1","629,446","875,67","1145,518","415,519","937,838","1171,858","425,771","242,891","721,303","731,255","82,767","934,310","383,614","994,476","1158,569","22,535","792,534","1115,542","1208,304","1044,814","959,497","738,308","855,220","1043,409","239,303","47,91","611,203"];
		
		$x = array();
		$y = array();
		
		foreach($lines as $line) {
			$dot = explode(',', $line);
			$x[] = $dot[0];
			$y[] = $dot[1];
		}
		
		$this->width = max($x) + 1;
		$this->height = max($y) + 1;
		$fill = array_fill(0, $this->width, 0);
		
		$this->inputs = array_fill(0, $this->height, $fill);
		
		foreach($lines as $line) {
			$dot = explode(',', $line);
			$this->inputs[$dot[1]][$dot[0]] = 1;
		}
	}
	
	private function GetFolds($file_name)
	{
		// = fopen($file_name, "r") or die("Unable to open file!");
	//	$lines = explode("\n", fread($file, filesize($file_name)));
		//fclose($file);
		$lines = ["y=7", "x=5"];
		$lines = ["x=655","y=447","x=327","y=223","x=163","y=111","x=81","y=55","x=40","y=27","y=13","y=6"];
		
		foreach($lines as $line) {
			$fold = explode('=', $line);
			
			if ($fold[0] == 'x') {
				$this->x_folds[] = $fold[1];
			} else {
				$this->y_folds[] = $fold[1];
			}
		}
		
		rsort($this->x_folds);
		rsort($this->y_folds);
	}
	
	private function GetCords($x, $y)
	{
		return array('x' => $x, 'y' => $y);
	}
	
	public function Part1() : int 
	{
		//foreach($this->y_folds as $fold) {
			$slice = array_reverse(array_slice($this->inputs, $this->y_folds[0]));
			
			$this->inputs = array_slice($this->inputs, 0, $this->y_folds[0]);
			
			foreach($slice as $index => $dots) {
			  foreach($dots as $position => $dot) {
			    if ($dot === 1) {
			      $this->inputs[$index][$position] = $dot;
			    }
			  }
			}
		//}
	  
	  $answer = 0;
	  
	  foreach($this->inputs as $dots) {
	    $answer += array_sum($dots);
	  }
	  
		return $answer;
	}
}

$day13 = new Day13('day13-inputs.txt', 'day13-folds.txt');

var_dump($day13->Part1());
?>
