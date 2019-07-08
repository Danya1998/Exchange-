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
    <link rel="stylesheet" href="scss/outdr.css">
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
                <li><a href="#" >Руководство пользователя</a></li>
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
                <li><a href="">Вывести UAH</a></li>
            </ul>
            <ul class="btc">
                <li><a href="">Кошелек BTC</a>
                <span style="font-size:22px;color:yellow;">
                <?php  
                printf("0.067885")
                ?>
                </span>
                </li>
                <li><a href="">Перевод BTC</a></li>
            </ul>
        </div>
        <div class="calculation" style="margin-bottom: 50px;">
            <h2>Вывод с баланса UAH</h2>
            <div class="calculator">
            
                <form action="" method="post">
                    <p>Карта Visa / MasterCard для вывода:</p>
                    <input type="text" class="form-control" name="card" style="width:330px;margin-top: 10px;" placeholder="Введите номер карты" autocomplete="off">
                    <p>Сумма, UAH (минимум 250 грн.):</p>
                    <input type="text" class="form-control" name="summa" style="width:330px;margin-top: 10px;" placeholder="Сумма к выводу (минимум 250 грн.):" required=""  autocomplete="off">
                    <p><input type="submit" style="background-color:green;" value="Вывод"></p>
                </form>        
            </div>
        </div>
        <div class="commission">
            <p>Комиссия: 4% (снимается с указанной суммы во время выплаты)</p>
            <p><u>Минимальная сумма вывода на карты Visa/MasterCard:</u></p>
            <ul>
                <li>- ПриватБанка Украины: 250 грн.</li>
                <li>- других банков Украины: 500 грн.</li>
                <li>- не украинских банков: 1300 грн.</li>
            </ul>
            <p><u>Помните, что:</u></p>
            <ul>
                <li>1. При выводе на НЕ гривневую карту курс валютной конвертанции устанавливается банком эмитентом карты;</li>
                <li>2. Вывод на не-гривневую карту ПриватБанка не поддерживается. </li>
            </ul>
            <h3>Последнии операции обмена:</h3>
        </div>
        
        <div class="php" >    
            <?php
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=userlistdb','root','');
                $pdo->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                } catch(PDOExeption $e){
            exit($e->GetMessage());
            }
            $username=$_SESSION["session_username"];
            $special_select = "SELECT orders_sell.in_ou, orders_sell.time,orders_sell.amount,orders_sell.state
                                FROM orders_sell,usertbl 
                                WHERE usertbl.username='$username' AND usertbl.id=orders_sell.id";
            $special_result = $pdo->query($special_select,PDO::FETCH_ASSOC);
            $special_array = $special_result->fetchAll();

            echo '<table border="0"  style="border-spacing:0;padding:20px 20px;color:red;">';

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
<?php endif; ?>