<!doctype html> 
<html lang="ru">
	<head> 
		<meta charset="UTF-8">
		<title>Музеи мира</title> 
		<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css"><!--подключаем файл стилей-->
	</head>
	
	<body >
		<header><!--шапка сайта-->
		<button class="sp11" style="	padding: 0;
	border: none;
	color: rgb(15, 224, 224);
	background-color: transparent;
	cursor: pointer;
	height: 70px;
	width: 250px;
      position: absolute;   
    top:0px;
	left: 0px;
font: italic small-caps bold 16px/2 cursive;


	
	
	font-size: 28px; " onclick="openNav()">Меню</button>
		
			<div>
			
				<h1 style="font-size: 76px; font: italic small-caps bold 76px/2 cursive;
">HTML/CSS/JAVASCRIPT</h1>
                                				
			<div>
		</header>

			 
			<div id="myNav" class="overlay">


  <a href="javascript:void(0)" class="closebtn" id="but" onclick="closeNav()">&times;</a>
     <div class="overlay-content">

    <a href="/">ГЛАВНАЯ</a>
    <a href="/blog">БЛОГ</a>
    <a href="/novosti">НОВОСТИ</a>
    <a href="/history">ИСТОРИЯ РАЗВИТИЯ</a>
    <a href="/opportunities">ВОЗМОЖНОСТИ HTML</a>
    <a href="/browser">HTML И БРАУЗЕР</a>
    <a href="/neobychnye-muzei-mira">CSS</a>
    <a href="/history/js">JavaScript</a>
    <a href="/console">КОНСОЛЬ</a>


  </div> 

</div> 



<!-- Use any element to open/show the overlay navigation menu -->

<script>
	function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
			
			

			<!--блок содержит раздел навигации и контент страницы-->		
			<div class="wrapper">			
			<div class="content"> 
				<div class="row">

					@yield('content')


				</div>
			</div>			
		</div>
		
		<footer><!--подвал сайта-->
		<div>
			<p><i>HTML CSS JS</i></p>
				
		</div>
		</footer>
	</body>
</html>



