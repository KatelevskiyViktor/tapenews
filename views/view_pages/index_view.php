

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http //www.w3.org/TR/xhtml1/DTD/xhtml-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<title>Главная страница сайта новостей.</title>
	</head>
	<body>
		<fieldset id="fi"><legend>Лента новостей.</legend>
			<ul>
			<?php
			
			foreach($items as $item){
				echo "<li>
					<img src='".$item->img."' alt='".$item->title."' title='".$item->title."' />
					<h4>".$item->title."</h4>
					<p>".$item->date."</p>
					<p>";
					$myStr = mb_substr($item->text,0,100);
					echo $myStr."...
					<a href='index.php?ctrl=News&act=One&id=".$item->id."'>Подробнее</a></p>
					</li>";
			}
			?>
				
			</ul>
			<?php 
			echo "<a id='add' href='index.php?ctrl=Admin&act=AddNews'>Добавить новость</a>";
			?>
		</fieldset>
	
	</body>


</html>