<?PHP
session_start();
if($_SESSION['usertype']=="cashier2"){
?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Webpage 3 POS</title>
  </head>
  <body>
    <div class="grid-container">
      <div class="column-left">
        <h1> MERCA'S PIZZERIA ESTD 2022 | POS</h1>
        <pre class="credits"> LABEL 12                    By: Angelica Joy Q. Glory     Terminal #17</pre>
        <div class="screen">
            <form name="OrderDits" class="Summary" action="Wp3POS.php" method="POST">
              <section>
                <fieldset>
                  <label for="NameOfItem" class="dits">Name of an item:</label>
                  <input type="text" id="NameItem" name="NameOfItem" size="60" disabled><br>

                  <label for="qty">Quantity:</label>
                  <input type="text" id="qty" name="qty">
                  <input type="radio" id="SenCtzn" name="Discount" value="SC">
                  <label for="html" class="choices">Senior Citizen</label>
                  <button type="button" class="btn">CALCULATE</button><br>

                  <label for="price">Price: </label>
                  <input type="text" value = "₱" id="price" step="any" name="price" disabled>
                  <input type="radio" id="DiscCard" name="Discount" value="DiscCard">
                  <label for="html" class="choices">With Disc. Card</label>
                  <button type="button" class="btn">NEW</button><br>

                  <label for="DiscAmnt">Discount Amount: </label>
                  <input type="text" id="DiscAmnt" name="DiscAmnt" disabled>
                  <input type="radio" id="EmpDisc" name="Discount" value="EmpDisc">
                  <label for="html" class="choices">Employee Disc</label>
                  <button type="button" class="btn">CANCEL</button><br>

                  <label for="DiscedAmnt">Discounted Amount: </label>
                  <input type="text" id="DiscedAmnt" name="DiscedAmnt" disabled>
                  <input type="radio" id="NoDisc" name="Discount" value="NoDisc">
                  <label for="html" class="choices">No Discount</label>
                  <button type="button" class="btn">EXIT</button><br>
              
                </fieldset>
              </section>
            </form>
        </div>

        <form>
          <section>
            <fieldset>
              <legend>Summary</legend>

              <label for="TotQty">Total Quantity: </label>
              <input type="text" id="TotQty" name="TotQty" size="60" disabled><br>
              <label for="TotDisc">Total Discount Given: </label>
              <input type="text" id="TotDisc" name="TotDisc" size="60" disabled><br>
              <label for="TotDiscedAmt" class="TDA">Total Discounted Amount: </label>
              <input type="text" id="TotDiscedAmt" name="TotDiscedAmt" size="55" disabledz><br>

            </fieldset>
          </section>
        </form>

        <form name="Transaction" class="transact" action="Wp3POS.php" method="POST">
          <section>
            <fieldset class="transact">
              <pre class="cash">   Cash Rendered:        Change:</pre>
              <input type="text" id="CashRndrd" name="CashRndrd" size="12" class="CashRcvd">
              <input type="text" id="Change" name="Change" size="12" class="CashRcvd" disabled><br>
            </fieldset>
          </section>
        </form>

        <form>
          <section>
            <div class=Calc-Container>
              <div class=Col-Enter>
                <input type="button" class="btnEnter" value="ENTER" onclick="Transaction.CashRndrd.value=eval(Transaction.CashRndrd.value)">
              </div>
              <table >
                <tr class=row-Calc>
                  <td><input type="button" class="btnOprtn" value="&divide;" onclick="Transaction.CashRndrd.value+='/'"></td>
                  <td><input type="button" class="btnOprtn" value="&times;" onclick="Transaction.CashRndrd.value+='*'"></td>
                  <td><input type="button" class="btnOprtn" value="&minus;" onclick="Transaction.CashRndrd.value+='-'"></td>
                  <td><input type="button" class="btnOprtn" value="&plus;" onclick="Transaction.CashRndrd.value+='+'"></td>
                </tr>

                <tr class=row-Calc>
                  <td><input type="button" class="btnNum" value="6" onclick="Transaction.CashRndrd.value+='6'"></td>
                  <td><input type="button" class="btnNum" value="7" onclick="Transaction.CashRndrd.value+='7'"></td>
                  <td><input type="button" class="btnNum" value="8" onclick="Transaction.CashRndrd.value+='8'"></td>
                  <td><input type="button" class="btnNum" value="9" onclick="Transaction.CashRndrd.value+='9'"></td>
                </tr>

                <tr class=row-Calc>
                  <td><input type="button" class="btnNum" value="2" onclick="Transaction.CashRndrd.value+='2'"></td>
                  <td><input type="button" class="btnNum" value="3" onclick="Transaction.CashRndrd.value+='3'"></td>
                  <td><input type="button" class="btnNum" value="4" onclick="Transaction.CashRndrd.value+='4'"></td>
                  <td><input type="button" class="btnNum" value="5" onclick="Transaction.CashRndrd.value+='5'"></td>
                </tr>

                <tr class=row-Calc>
                <td><input type="button" class="btnBS" value="⌫" onclick="Transaction.CashRndrd.value=Transaction.CashRndrd.value.substring(0,Transaction.CashRndrd.value.length*1-1)"></td>
                  <td><input type="button" class="btnZero" value="0" onclick="Transaction.CashRndrd.value+='0'"></td>
                  <td><input type="button" class="btnDot" value="." onclick="Transaction.CashRndrd.value+='.'"></td>
                  <td><input type="button" class="btnNum" value="1" onclick="Transaction.CashRndrd.value+='1'"></td>
                </tr>
              </table>  

            </div>
          </section>
        </form>

      </div>

      <div class="column-right">
        <form Name="" Method="" Action="">
          <section> 
            <fieldset> 
              <legend>Items Display</legend>
              <div class="row">
                <div class="col-5">
                  <input Name="PZ1" Type="button" class="MenuButtonL" value="Cheese Mania" onclick="OrderDits.NameOfItem.value='Cheese Mania'; OrderDits.price.value='₱ 500.00'">
                  <pre class="prod-name">CHEESE MANIA</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/2.png" class="MenuButtonM">
                  <pre class="prod-name">HAM & CHEESE</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/3.png" class="MenuButtonM">
                  <pre class="prod-name">PEPPERONI FEAST</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/4.png" class="MenuButtonM">
                  <pre class="prod-name">ANGUS STEAKHOUSE</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/5.png" class="MenuButtonR">
                  <pre class="prod-name">MERCA'S DELUXE</pre>
                </div>
              </div>

              <div class="row">
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/6.png" class="MenuButtonL">
                  <pre class="prod-name">TOMATO & BLACK OLIVES</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/7.png" class="MenuButtonM">
                  <pre class="prod-name">PACIFIC VEGGIE</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/8.png" class="MenuButtonM">
                  <pre class="prod-name">CREAMY & TUNA DELIGHT</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/9.png" class="MenuButtonM">
                  <pre class="prod-name">ULTIMATE PEPPERONI</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/10.png" class="MenuButtonR">
                  <pre class="prod-name">EXTRAVAGANZZA</pre>
                </div>
              </div>

              <div class="row">
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/11.png" class="MenuButtonL">
                  <pre class="prod-name">BACON CHEESEBURGER</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/12.png" class="MenuButtonM">
                  <pre class="prod-name">POTATO BACON</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/13.png" class="MenuButtonM">
                  <pre class="prod-name">MEATZZA</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/14.png" class="MenuButtonM">
                  <pre class="prod-name">WHITE BACON</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/15.png" class="MenuButtonR">
                  <pre class="prod-name">ANGUS BURGER</pre>
                </div>
              </div>

              <div class="row">
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/16.png" class="MenuButtonL">
                  <pre class="prod-name">GARLIC 'N' CHEESE</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/17.png" class="MenuButtonM">
                  <pre class="prod-name">SCALLOP PRIMO</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/18.png" class="MenuButtonM">
                  <pre class="prod-name">TRUFFLE GREENS</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/19.png" class="MenuButtonM">
                  <pre class="prod-name">PEPPERONI & CHEESE</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ1" Type="Image" src="images/20.png" class="MenuButtonR">
                  <pre class="prod-name">PIZZA MERCA</pre>
                </div>
              </div>
            </fieldset>
          </section>
        </form>
      </div>

    </div>
  </body>
</html>
<?php
}
else{
  echo '<script>alert("Unauthorized Web Access")</script>';
  echo '<script>window.location.href=".../login.php"</script>';}
?>