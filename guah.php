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
    <link rel="stylesheet" href="scss/guah.css">
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
                <li><a href="intropage.php">Обменник</a></li>
                <li><a href="manual.php" >Руководство пользователя</a></li>
                <li><a href="#">Безопасность</a></li>
                <li><a href="#">Поддержка</a></li>
                <li><a href="#">Реферальная программа</a></li>
            </ul>
            <div class="line"></div>
        </header>
        <div class="account">
            <ul class="fiat">
                <li><a href="manual.php">Баланc UAH в </a> <span style="font-size:22px;color:yellow;">0.00                   </span></li>
                <li><a href="">Отдать UAH,получить BTC</a></li>
                <li><a href="rbtc.php">Отдать BTC,получить UAH</a></li>
                <li><a href="outdr.php">Вывести UAH</a></li>
            </ul>
            <ul class="btc">
                <li><a href="">Кошелек BTC</a>
                <span style="font-size:22px;color:yellow;">0.067885</span>
                </li>
                <li><a href="send.php">Перевод BTC</a></li>
            </ul>
        </div>
        <script type="text/javascript" src="js/guah.js"></script>
        <div class="calculation">
            <h2>Отдать UAH, получить BTC</h2>
            <p>Курс покупки <span style="color:lightgreen;">160100.48 UAH</span> за 1 BTC</p>
            <div class="calculator">
                <form action="" method="post">
                    <p>Карта Visa / MasterCard для вывода:</p>
                    <input type="text" class="form-control" id="btc" name="btc" style="width:230px" placeholder="Введите сумму BTC" onkeyup="javascript:recalc_amount()" autocomplete="off">
                    <p>Получить BTC</p>
                    <input type="text" class="form-control" id="uah" name="uah" style="width:230px" placeholder="Введите сумму UAH" required="" onkeyup="javascript:recalc_amount()" autocomplete="off">
                    <p><input type="submit" id="btnSubmit" class="btn btn-success" onclick="ga('send', 'event', 'р-10 Купить ВТС за х-грн  ', 'click', 'Аккаунт'); return true;" value="Купить 0 BTC за 0 UAH"></p>
                </form>        
            </div>
            <p class="last">Последнии операции обмена:</p>
        </div>
        <div class="php">
            <?php
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=userlistdb','root','');
                $pdo->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                } catch(PDOExeption $e){
            exit($e->GetMessage());
            }
            $username=$_SESSION["session_username"];
            $special_select = "SELECT  orders_buy.time,orders_buy.amount_btc, orders_buy.in_ou, orders_buy.amount,orders_buy.state 
                                FROM orders_buy,usertbl 
                                WHERE usertbl.username='$username' AND usertbl.id=orders_buy.user_id";
            $special_result = $pdo->query($special_select,PDO::FETCH_ASSOC);
            $special_array = $special_result->fetchAll();

            echo '<table border="0"  style="border-spacing:0;padding:20px 20px;color:green;">';

            foreach($special_array as $row)
            {
            echo '<tr>';
            foreach($row as $row_2)
            {
            echo "<td>$row_2</td>";
            }
            echo '</tr>';
}

echo '</table>';
            ?>
        </div>
    </div>
</body>
</html>
<?php endif; ?>