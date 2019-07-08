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
    <link rel="stylesheet" href="scss/send.css">
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
                 <span style="font-size:22px;color:yellow;">
                0.067885                </span></li>
                <li><a href="send.php">Перевод BTC</a></li>
            </ul>
        </div>
        <div class="send">
            <div class="send_form">
                <h1>Перевод BTC</h1>
                <form action="" method="post">
                    <div class="form_group">
                        <label>Адрес получателя</label>
                        <input class="form-control" id="address" type="text" name="address" style="width:350px" value="" placeholder="27-34 символьная цифро-буквенная строка">
                    </div>
                    <div class="form_group" style="width: 150px;">
                        <label>Количество BTC</label>
                        <input class="form-control" id="address" type="text" name="address" style="width:80px" value="" placeholder="0.0000000">
                    </div>
                    <div class="comm">
                        <label>Комиссия BTC</label>
                        <input class="form-control" id="address" readonly="" value="0.00070548" type="text" name="address" style="width:80px; cursor: not-allowed;" value="" placeholder="0.0000000">
                    </div>
                    <p>К переводу доступно: <span style="color: green;font-weight: bold;">0.067885</span></p>
                    <input type="submit" class="btn" name="button">
                </form>
            </div>
            <div class="history">
                <h4>История переводов:</h4>
                <div class="table" style="padding-left: 35px;">Время</div>
                <div class="table">Адрес получателя</div>
                <div class="table" style="padding-left: 90px;">Кол-во BTC</div>
                <div class="table">Статус</div>
                <div class="php">
            <?php
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=userlistdb','root','');
                $pdo->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                } catch(PDOExeption $e){
            exit($e->GetMessage());
            }
            $username=$_SESSION["session_username"];
            $special_select = "SELECT  send_btc.time,send_btc.adr, send_btc.amount_btc, send_btc.state 
                                FROM send_btc,usertbl 
                                WHERE usertbl.username='$username' AND usertbl.id=send_btc.user_id";
            $special_result = $pdo->query($special_select,PDO::FETCH_ASSOC);
            $special_array = $special_result->fetchAll();

            echo '<table border="0"  style="border-spacing:0;padding:20px 20px;">';

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
            
            
        </div>
    </div>
</body>
</html>
<?php endif; ?>