<!DOCTYPE html>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
    body {
	background-color: #c8e2ad;
	}
	
</style>
</head>
<body>
<?php

if($json = file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json')){
$obj = json_decode($json, true);
foreach($obj as $rate){
	if($rate['cc'] == "USD"){
		echo "Rate = {$rate['rate']}";
	}
}

echo "<pre>";
//print_r($obj);
echo "</pre>";

}

?>
<div class="container - fluid">
	<div class="row">	

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
		<div class="btn-group pull-right">
		  <button class="btn btn-success dropdown-toggle btn-lg" data-toggle="dropdown">Пересчитать цену в валюте 
		  <span class="caret"></span></button>
		  <ul class="dropdown-menu">
			<li><a href="#">UAH</a></li>
			<li><a href="#">$</a></li>
			<li><a href="#">&euro;</a></li>
		  </ul>
		</div>
		</div>
		
	</div>

	<div class="row">	
	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
			  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class="text-center h3">ИНДИВИДУАЛЬНАЯ КОНСУЛЬТАЦИ</p>
				<hr>
			  </div>
			  <div class="row">
			  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12"> 
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"> 
						Дни 
					</div>
					<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"> 	
						Пн-Пт 
					</div>
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"> 	
						Время 
					</div>
					<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"> 		
						9-15, 17-21
					</div>
			  </div>
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"> 
				
				<p class="text-center h3"> 700 грн</p>
				</div>	
			  </div>
			
			  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  <hr>
			  <p class="text-center"><a type="button" class="btn btn-success btn-sm">Оставить заявку</a></p>
			  </div>
			 
			</div>
			  <div class="panel-footer">
			  <p class="text-center">
				Встреча с психологом в теплой и непринужденной обстановке. Уютный кабинет и приятная атмосфера располагает к откровенному диалогу, который позволяет максимально точно понять ситуацию, и ближе познакомится с Вашими переживаниями.
	Благодаря такой беседе, Вы сможете разобраться в причинах возникновения тех или иных трудностей, справиться с внутренним дискомфортом и выстроить гармоничные отношения с окружающим миром.
			<a> подробнее </a>		 				
			  </p>
			  
				</div>
			</div>
		</div>
		
		 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
			  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class="text-center h3">ИНДИВИДУАЛЬНАЯ КОНСУЛЬТАЦИ</p>
				<hr>
			  </div>
			  <div class="row">
			  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12"> 
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 
						Дни 
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 	
						Пн-Пт 
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 		
						Время 
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 		
						9-15, 17-21
					</div>
			  </div>
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"> 
				<p class="text-center"> 700 грн</p>
				</div>	
			  </div>
			
			  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  <hr>
			  <p class="text-center"><a type="button" class="btn btn-success btn-sm">Оставить заявку</a></p>
			  </div>
			 
			</div>
			  <div class="panel-footer">
			  <p class="text-center">
				
Консультация с психологом посредством видео чата, которая существенно сэкономит ваше время, в особенности, если Вам дорога каждая минута. Такой вид психологической помощи легко вписать в привычный распорядок дня. Вы можете получить поддержку и помощь специалиста в любое удобное для вас время.					
			  </p>
			  
				</div>
			</div>
		</div>
		
		 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
			  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class="text-center h3">ИНДИВИДУАЛЬНАЯ КОНСУЛЬТАЦИ</p>
				<hr>
			  </div>
			  <div class="row">
			  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12"> 
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 
						Дни 
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 	
						Пн-Пт 
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 		
						Время 
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 		
						9-15, 17-21
					</div>
			  </div>
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"> 
				<p class="text-center"> 700 грн</p>
				</div>	
			  </div>
			
			  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  <hr>
			  <p class="text-center"><a type="button" class="btn btn-success btn-sm">Оставить заявку</a></p>
			  </div>
			 
			</div>
			  <div class="panel-footer">
			  <p class="text-center">
				Консультация направлена на решение любых, даже самых деликатных, проблем в отношениях между мужчиной и женщиной. В ходе диалога, у супружеской пары будет возможность разобраться в ситуации и вдохнуть новую жизнь в отношения. Психолог, посмотрев на проблему со стороны, покажет Вам легкий путь выхода из кризиса, научит, слушать и слышать друг друга, поможет забыть все обиды и не накапливать негатива.  					
			  </p>
			  
				</div>
			</div>
		</div>
		
		</div>
	
            
</div> 
</body>
</html>


