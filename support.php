<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bitcoin Exchanger and Wallet</title>
    <link rel="stylesheet" href="scss/support.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
        <div class="top">
            <div>
                <a href="main.html">
                    <b>btc</b>Bank
                </a>
            </div>
            <div class="currency">Курс 1 BTC: 146856.32 грн / 160100.48 UAH</div>
            <div class="regist">
                <div id="welcome">
					<img class="logo" src="img/icon-user.png"> <span>Hi,<?php echo $_SESSION['session_username'];?>!</span>
  					<button><a href="logout.php">Выйти</a></button>
				</div>
            </div>
        </div>
		<header>
            <ul class="nav">
                <li ><a href="intropage.php">Обменник</a></li>
                <li><a href="manual.php" >Руководство пользователя</a></li>
                <li><a href="security.php">Безопасность</a></li>
                <li style="border-bottom: 1px solid #e4e4e4;"><a href="support.php">Поддержка</a></li>
                <li><a href="referal.php">Реферальная программа</a></li>
            </ul>
            <div class="line"></div>
        </header>
        <div class="account">
            <ul class="fiat">
                <li><a href="manual.php">Баланc UAH</a>
                    <span style="font-size:22px;color:yellow;">0.00</span>
                </li>
                <li><a href="guah.php">Отдать UAH,получить BTC</a></li>
                <li><a href="rbtc.php">Отдать BTC,получить UAH</a></li>
                <li><a href="guah.php">Вывести UAH</a></li>
            </ul>
            <ul class="btc">
                <li><a href="">Кошелек BTC</a>
                    <span style="font-size:22px;color:yellow;">0.067885</span>
                </li>
                <li><a href="send.php">Перевод BTC</a></li>
            </ul>
        </div>
        <div class="supp">
            <h1>Служба поддержки</h1>
            <p class="des">Некоторые вопросы которые Вас могут заинтересовать, вероятно уже имеют ответы.<br>
            Проверьте тут «Дружественные Вопросы и Ответы (FAQ)»</p>
            <button id="radio">Создать обращение</button>

            <div id="view" class="make">
                <form action="db/supp.php" method="post">
                    <label for="send">Ваша почта</label><br>
                    <input type="email" name="email" id="send" placeholder="Здесь должна быть Ваша почта" class="form-control"><br>
                    <label for="theme">Тема</label><br>
                    <input type="text" name="theme" id="theme" placeholder="Укажите тему вашего обращения" class="form-control"><br>
                    <label for="sms">Сообщение</label><br>
                    <textarea id="sms" name="mess" placeholder="Пожалуйста, предоставьте детальную, исчерпывающую информацию по Вашему вопросу." class="form-control"></textarea><br>
                    <input type="submit" id="btn">
                </form>
            </div>
        </div>
    </div>
</body>
<script src="js/radio.js"></script>
</html>
<?php endif; ?>