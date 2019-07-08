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
    <link rel="stylesheet" href="scss/intro2.css">
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
                <li style="border-bottom: 1px solid #e4e4e4;"><a href="#">Обменник</a></li>
                <li><a href="manual.php" >Руководство пользователя</a></li>
                <li><a href="security.php">Безопасность</a></li>
                <li><a href="support.php">Поддержка</a></li>
                <li><a href="referal.php">Реферальная программа</a></li>
            </ul>
            <div class="line"></div>
        </header>
        <div class="name">
            <h1>Обменник денег на Bitcoin</h1>
            <div class="count">Сегодня <i>
                <?php  
                try{
                $pdo = new PDO('mysql:host=localhost;dbname=userlistdb','root','');
                $pdo->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                } catch(PDOExeption $e){
                exit($e->GetMessage());
                }
                $special_select =$pdo->prepare('SELECT MAX(order_id) FROM orders_buy');
                echo $special_select->execute();
                ?>

            </i> успешных операций</div>
        </div>
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
        <div class="calculate">
            <script type="text/javascript" src="js/money.js"></script>
            <form action="https://privat24.ua/" method="post">
            <h4>Для смены направления обмена нажмите на кнопку</h4>
            <div class="obm">
                    <div class="bl2">
                    <h5>Get</h5>
                    <img src="img/btc-logo.png" class="img">
                    <input id="btc" name="btc" type="text" class="form-control" value="0.1000" autocomplete="off">
                </div>
                <a href="intropage.php"><img src="img/button-exchange_blue2.gif" class="gif" onmouseover="this.src='img/button-exchange_blue1.gif'"
                onmouseout="this.src='img/button-exchange_blue2.gif'"></a>
                <div class="bl1">
                    <h5>Send</h5>
                    <img src="img/privat24.png" class="img">
                    <input id="p24" name="p24" type="text" class="form-control" value="5000" style="border-left:none;" autocomplete="off">
                    <select>
                        <option>UAH</option>
                        <option>USD</option>
                        <option>EUR</option>
                    </select>
                </div>
            </div>  
            <div class="sum">
                <span>К оплате с комиссией (4%)</span>
                <input type="text" id="uah_com" name="uah_com" class="form-control" value="1040.0" autocomplete="off">
            </div>
            <div class="send"><input type="submit" value="Обменять деньги на Bitcoin" class="exc"></div>
            </form>
        </div>
        <div class="description">  
            Комиссия ввода/вывода BTC: 0 / до 0.001 BTC; Гривен UAH: ввод 4 % / вывод 4%. 
            Минимальная сумма ввода/вывода в UAH: 500 / 250<br>
            При покупке биткоины зачисляются в Кошелек btcBank
        </div>
        <section class="three">
        <div class="parag">
            <h1>Video. What is Bitcoin?</h1>
            <p><i>Bitcoin - это уникальный феномен в мире денег. Теперь денежная политика не зависит от личных интересов ограниченных групп, стоящих за денежными печатными станками. Эмиссия биткоина проста, прозрачна и предсказуема. Биткоины, которые принадлежат Вам, не могут быть изъяты кем бы то ни было без физического доступа к вашему кошельку. Это по настоящему свободная цифровая валюта, которая не подвержена инфляции в силу запрограммированной ограниченности своей эмиссии.</i>
            </p>
        </div>
        <video width="400px" height="300"controls preload="metadata">
            <source src="video/bit.mp4" >
        </video>
        <div class="line"></div>
    </section>
    <section class="four">
        <ul>
            <li><a href="">Bitcoin обменник</a></li>
            <li><a href="">Bitcoin кошелек</a></li>
            <li><a href="">FAQ</a></li>
        </ul>
        <ul>
            <li><a href="">Новости сайта</a></li>
            <li><a href="">Инфорцация сайта</a></li>
            <li><a href="">Контакты</a></li>
        </ul>
        <ul>
            <li><a href="">Регистрация / Вход</a></li>
            <li><a href="">Соглашения</a></li>
            <li><a href="">Отзывы</a></li>
        </ul>
    </section>
    <div class="line"></div>
    <div class="foot">
        <ul>
            <li>Поддержка:<a href="mailto:yurchenkodanil1998@gmail.com">yurchenkodanil1998@gmail.com</a></li>
            <li>&reg;2019</li>
        </ul>
        <ul>
            <li>Комиссия ввода / вывода BTC: 0 / до 0.001 BTC; UAH: 4% / 4%</li>
            <li>Минимальная сумма ввода / вывода в UAH: 500 / 250 UAH</li>
        </ul>
    </div> 
    </div>
</body>
</html>

	
<?php endif; ?>