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
    <link rel="stylesheet" href="scss/manual.css">
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
                <li><a href="intropage.php">Обменик</a></li>
                <li style="border-bottom: 1px solid #e4e4e4;"><a href="#" >Руководство пользователя</a></li>
                <li><a href="security.php">Безопасность</a></li>
                <li><a href="support.php">Поддержка</a></li>
                <li><a href="referal.php">Реферальная программа</a></li>
            </ul>
            <div class="line"></div>
        </header>
        <div class="account">
            <ul class="fiat">
                <li><a href="manual.php">Баланc в UAH</a><span style="font-size:22px;color:yellow;"> 0.00					</span></li>
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
        <div class="buy">
        	<div style="font-size: 18px;">Приобрести биткоины через Приват24 *</div>
        	<div>
        	<form action="https://privat24.ua/" method="post">
        		<input type="number" placeholder="Сумма, грн." >
        		<input type="submit" value="Купить">
        	</form>
        	</div>
        </div>
        <section class="desc" style="padding-bottom: 50px;" >
        	<h2>Руководство пользователя v1.3</h2>

			<h3>Как приобрести биткоины?</h3>

			<p>1. Введите гривны в систему btcBank с помощью пункта меню "Внести UAH". Дождитесь пополнения Баланса UAH;</p>

			<p>2. Купите на сумму пополнения биткоины. Пункт меню "Отдать UAH, получить BTC";</p>

			<p>3. Биткоины зачислятся в Ваш Кошелек BTC в btcBank. После этого их можно вывести из btcBank, подтвердив вывод с помощью 2-х Факторной Авторизации (см. ниже).</p>

			<p>4. Тем не менее, мы рекомендуем хранить Ваши биткоины именно в btcBank (почему - читайте ниже).</p>

			<h3>Как продать биткоины?</h3>

			<p>1. Для приема биткоинов создайте новый bitcoin-адрес нажав соотвествующую кнопку на странице "Мои BTC адреса";</p>

			<p>2. Совершите перевод биткоинов на созданный адрес и дождитесь, когда перевод получит 3 подтверждения Bitcoin-сети;</p>

			<p>3. После зачисления биткоинов на баланс обменяйте их на гривни с помощью пункта меню "Отдать BTC, получить UAH";</p>

			<p>4. Закажите вывод c Баланса UAH на любую карту Visa / MasterCard с помощью пункта меню "Вывести UAH". Вывод происходит как правило в срок от 2 минут до 2 часов.</p>

			<h3>Что такое 2-х Факторная Авторизация (2FA)?</h3>

			<p>2 Factor Authentication - это способ подтверждения действий пользователя в аккаунте, при помощи запроса аутентификационных данных двух разных типов. Мы поддерживаем два разных вида 2FA: с помощью SMS (2FA-SMS) и с помощью мобильного приложения Google Authenticator (2FAGA). При 2FA-SMS Вы должны подтвердить свое действие путем ввода кода из SMS, который для каждого действия отсылается на Ваш телеофон. При 2FAGA каждое действие подтверждается вводом OTP-кода (одноразового пароля с временем жизни 30 секунд) из программы Google Authenticator. После регистрации аккаунта по умолчанию используется 2FA-SMS.</p>

			<h3>Почему мы рекомендуем хранить биткоины в btcBank?</h3>

			<p>1.Хранить биткоины в bitcoin-кошельке на персональном компьютере или телефоне достаточно опасно. Сейчас появляется все больше вирусов и троянских программ, которые создаются специально для хищения секретных bitcoin-ключей (private key) с персональных компьютеров и телефонов пользователей;</p>

			<p>2. Другие онлайн bitcoin-кошельки позволяют совершать переводы только лишь с помощью email-подтверждений. Сегодня взломать email-ящик, как правило, не представляет существенного труда для интернет-злоумышленников. Поэтому множество bitcoin-кошельков не являются действительно надежным решением;</p>

			<p>3. Каждый вывод биткоинов на другой адрес требует прохождения 2-х факторной авторизации. Другого способа вывести биткоины из btcBank не существует. Именно поэтому в btcBank Ваши биткоины находятся под надежной защитой;</p>
        </section>
    </div>
</body>
</html>
<?php endif; ?>