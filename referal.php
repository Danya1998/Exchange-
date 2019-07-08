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
    <link rel="stylesheet" href="scss/referal.css">
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
                <li><a href="support.php">Поддержка</a></li>
                <li style="border-bottom: 1px solid #e4e4e4;"><a href="referal.php">Реферальная программа</a></li>
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
        <div class="referal">
            <h1>Подача заявки на участие в Партнерской Программе</h1>
            <h3>Правила участия в Партнерской Программе</h3>

            <p>1. Пользователь допущенный к использованию Партнерской Программы, получает в своем Личном Кабинете партнерскую ссылку;<br>
            2. Партнерская ссылка предназначена для размещения на Интернет-ресурсах принадлежащих пользователю либо на Интернет-ресурсах, на которых пользователь имеет право размещать свои ссылки (напр: facebook.com, vk.com, ok.ru и др.). Запрещено размещение на рекламных сервисах Яндекс.Директ, Google Adwords и подобных.<br>
            3. По партнерской ссылке регистрируются рефералы пользователя. Пользователь видит каждого зарегистрированного реферала и статистику по нему в своем Личном Кабинете;<br>
            4. Когда реферал совершает:<br>
            - ввод или вывод гривен в/из Баланса UAH, пользователь получает вознаграждение в размере 20% от комиссии btcBank (4% от суммы пополнения или выплаты реферала);<br>
            - покупку или продажу BTC-E USD кодов, пользователь получает вознаграждение в размере 0.6% от суммы сделки реферала;<br>
            5. Выплата заработаных средств происходит 1 раз в месяц (1-3 числа следующего месяца). Минимальная выплата - 50 грн. Полученные гривни зачисляются на Баланс UAH пользователя;<br>
            6.В случае обнаружения факта рассылки партнерской ссылки как спама либо размещении на ресурсах, на которых пользователь не имеет права размещать ссылки (при поступлении жалобы от владельца ресурса) - пользователь будет лишен доступа к Партнерской Программе без выплаты заработанных в Партнерской Программе средств. Допускается одно предупреждение.<br>

            Пример: реферал делает пополнение на 10 000 грн. На реферальный счет пользователя начисляется: <b>10000 * 0.04 * 0.2 = 80.00 грн.</b></p>
            <form method="post">    
                <label>Пожалуйста, расскажите где Вы собираетесь размещать свою реферальную ссылку:</label>
                <textarea placeholder="Подробно опишите как Вы собираетесь ипользовать реферальную ссылку. Укажите адреса сайтов." rows="3"></textarea>
                <input type="submit" value="Отправить заявку на рассмотрение">
            </form>
        </div>
    </div>
</body>
</html>
<?php endif; ?>