<?php

$connection = mysqli_connect('localhost', 'root', '', 'documentolog');

$query1 = mysqli_query($connection , "SELECT a.name FROM `employees` AS a, `employees` AS b WHERE a.salary > b.salary AND a.chiefid = b.employeeid");

$query2 = mysqli_query($connection , "SELECT department, COUNT(employeeid) FROM `employees` GROUP BY department HAVING COUNT(employeeid) > 2");

while($result1 = mysqli_fetch_assoc($query1)){
		echo $result1['name'].'<hr>';
		}
		echo "<br> SECOND QUERY <br><br>";

		while($result2 = mysqli_fetch_assoc($query2)){
		echo $result2['department']." - ".$result2['COUNT(employeeid)'].'<hr>';
		}

mysqli_close($connection);


/* QUESTION #3
Определить форму нормализаций данной табицы.
Ответ: 1 и 2, ПЕРВАЯ нормальная форма: устранение повторяющихся групп и ВТОРАЯ нормальная форма: устранение избыточных данных.*/
?>

