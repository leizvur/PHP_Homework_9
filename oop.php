<!DOCTYPE html>
<html>
<head>
	<title>Инкапсуляция</title>
</head>
<body>
	<h1>Инкапсуляция</h1>
	<p><strong>Инкапсуляция</strong> - принцип ООП, позволяющий объединить весь код, связанный с одной сущностью, в блок - класс и назначить коду внутри класса область видимости.</p>
	<p>Класс хранит в себе свойства и методы сущности, которые могут быть только введены в классе (без конкретных значений или кода) или заданы.</p>
	<p><strong>Свойство</strong>- это некоторый признак сущности, описанный в классе (например, цвет, длина, размер и пр.), который помимо значения имеет область видимости.</p>
	<p><strong>Метод</strong> - это функция\действие, описанная в классе, которые сущность выполняет (двигаться, расти, рисовать и пр.), также обладает областью видимости.</p>
	<p>Таким образом, инкапсуляция позволяет нам проектировать сущности и далее использовать их для создания конкретных объектов с предварительно объявленной областью видимости свойств и методов, а подчас и их значений.</p>
	<p>Плюсы объектов:</p>
	<ul>
		<li>исходное шаблонирование из класса;</li>
		<li>быстрое изменение свойств и методов из класса;</li>
		<li>фиксация значений, запрещенных к изменению;</li>
		<li>инкапсуляция кода по объекту в рамках одного блока;</li>
		<li>возможность переиспользования объекта в другом объекте - своего рода single-source.</li>
	</ul>
	<p>Минусы объектов:</p>
	<ul>
		<li>ограничения области видимости;</li>
		<li>не работают без параметров;</li>
	</ul>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


class ClassCar
{
	public $name; //название модели	
	public $transmission; // тип коробки передач
	public $region; // регион продаж
	public $package; // комплектация
	public $currency; //валюта продаж
	public $exchangerate; //курс обмена валют к доллару
	public $price; // цена
	public $alarm; // сигнализация
	
	public function __construct($name, $region, $price)
	{
		$this->name=$name;
		$this->region=$region;
		$this->price=$price;
		echo "<pre>";
		print_r("Поступил в продажу новый объект класса ClassCar!");
		echo "</pre>";
	}
	public function methodSale($region, $package, $transmission)
	{
		$this->package=$package;
		$this->transmission=$transmission;
		$this->region=$region;
		if (!empty($region) && $region="Russia") 
		{
			
			echo "Продажи ограничены!" . "Доступна комплектация: " . $package . " с коробкой передач: " . $transmission;


		} 
		elseif (!empty($region) && $region="USA")  
		{
			echo "Доступен широкий выбор моделей! Позвоните нам для получения дополнительной информации.";
		}
		else
		{
			echo "Да прибудет с вами сила!";
		}		
	}

}
?>
<h2>Тачки</h2>
<?php 
$carToyota=new ClassCar("Toyota Avensis", "Russia", 1200000);
$carToyota->currency="RUR";
$carToyota->region="Russia";
$carToyota->transmission="Manual";
$carToyota->package="Sol";
 ?>
<ul>
	<li><?php print_r("Название модели: " . $carToyota->name);?></li>
	<li><?php print_r("Регион продаж: " . $carToyota->region);?></li>
	<li><?php print_r("Стоимость от: " . $carToyota->price . $carToyota->currency);?></li>
	<li><?php print_r("Информация для диллеров: "); print_r($carToyota->methodSale("Russia", "Sol", "Manual"));?></li>
</ul>

<?php 
$carBMW=new ClassCar("BMW X5", "USA", 300000);
$carBMW->currency="USD";
$carBMW->region="USA";
 ?>
<ul>
	<li><?php print_r("Название модели: " . $carBMW->name);?></li>
	<li><?php print_r("Регион продаж: " . $carBMW->region);?></li>
	<li><?php print_r("Стоимость от: " . $carBMW->price . $carBMW->currency);?></li>
	<li><?php print_r("Информация для диллеров: "); print_r($carBMW->methodSale($carBMW->region, $carBMW->package, $carBMW->transmission));?></li>
</ul>


<h2>Телеки</h2>
<?php 

class ClassTV
{
	public $model; //название модели	
	public $lighting; // подсветка
	public $diagonal; //диагональ экрана
	public $dataformat;
	public $price; 
	
	public function getSurPrise($price, $lighing)
	{
		$this->price=$price;
		if ($lighting=1) 
		{
			return $price;
		}
		
		if ($lighting=0) 
		{
			
			echo "Подарите это барахло клиентам! Разгрузите склад!"; 
		}
	}

	public function __construct($model, $diagonal, $dataformat)
	{
		$this->model=$model;
		$this->diagonal=$diagonal;
		$this->dataformat=$dataformat;
		echo "<pre>";
		print_r ("На склад доставлены модели телевизоров " . $model . " диагональю " . $diagonal . ". Формат: "  . $dataformat);
		echo "</pre>";
	}
}

$tvDigital=new ClassTV("iDaTV", "200", "4K");
$tvDigital->lighting=1;
echo "<pre>";
print_r("Стоимость: " . $tvDigital->getSurPrise(120, 1));
echo "</pre>";


$tvAnalog=new ClassTV("NeDoTV", "100", "ЭраДоHD");
$tvAnalog->lighting=0;
echo "<pre>";
print_r("Стоимость: " . $tvAnalog->getSurPrise(10, 0));
echo "</pre>";

?>
<h2>Ручки</h2>

<?php 
 
 class ClassPen 
 {
 	public $color;
 	public $audience;
 	public $amount;
 	
 	public function __construct($color, $audience, $amount)
 	{
 		$this->amount=$amount;
 		$this->color=$color;
 		$this->audience=$audience;
 		echo "<pre>";
 		print_r("Новые позиции на складе: " . $color . " ручки в количестве " . $amount . " штук.");
 		echo "<pre>";
 		echo "</pre>";
 		print_r($audience . " ждут новые " . $color . " ручки как можно скорее.");
 		echo "</pre>";
 	}
 }

$penSchool=new ClassPen("синие", "Школьники", 100);
$penBusiness=new ClassPen("черные", "Менеджеры", 200);
?>
<h2>Утки</h2>

<?php

class ClassDuck
{
	public $food;
	public $sex;

	public function __construct($food, $sex)
	{
		
	}

	public function methodChild()
	{
		if ($this->sex="boy") 
		{
			echo "Покорми уток-девочек хлебом";
		}
		elseif ($this->sex="boy") 
		{
			echo "Покорми уток-мальчиков зерном";
		}
	}
}

$duckHome=new ClassDuck("bred", "girl");
echo "<pre>";
print_r("На наш пруд прилетели редчайшие утки! Нужно накормить их!");
echo "</pre>";
echo $duckHome->methodChild();

$duckWild=new ClassDuck("corn", "boy");
echo $duckWild->methodChild();
?>
<h2>Товар</h2>
<?php 

class ClassProduct
{
	public $id;
	public $name;
	public $type;
	public $price;
	public $category;

	public function __construct($id, $type, $name, $category, $price)
	{
		echo "<pre>";
		print_r("Поступил новый товар.");
		echo "</pre>";
	}
	
	public function methodSort()
	{
		$this->type=$type;
		$this->name=$name;
		$this->category=$category;

		if ($this->type=="еда") 
		{
			echo "Положить товар " . $name . " в холодильник!";
		}
		elseif ($this->type=="ПО") 
		{
			echo "Разместить товар " . $name . " на складе в категории " . $category;
		}
	}
	
}

$productFood=new ClassProduct(1, "еда", "капуста", "бахчевые", 65);
echo $productFood->methodSort();

$productSoft=new ClassProduct(2, "ПО", "АРМ", "ПО для товароведения", 1600);
echo $productSoft->methodSort();

$productFood1=new ClassProduct(3, "еда", "кабачки", "бахчевые", 85);
echo $productFood1->methodSort();




?>

</body>
</html>