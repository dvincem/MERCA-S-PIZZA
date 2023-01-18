<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles1.css" />
    <link rel="javascript" href="script.js" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Webpage 3 POS</title>
  </head>
  <body>

  <script>
    var CompDiscedAmnt = "";
    var CompDiscAmnt = "";
    var CompNoDiscedAmnt = "";
    var CompNoDiscAmnt = "";
    var NullDiscedAmnt = "₱ 0.00";
    var DiscedAmnt = "";
    var DiscAmnt = "";
    var Subtotal = "";
    var NoDisc = "";
    var Total = "";
    var Qty = "";
    var TotalQty = "";
    var TotalDisc = "";
    var TotalNoDisc = "";
    var CashRndrd = "";
    var CompChange = "";
    var Change = "";

    function NewButton() {
      document.getElementById("OrderDits").reset();
      TotalQty = document.getElementById('TotQty').value= 0;
      Total = document.getElementById('TotAmt').value= "₱ 0.00";
      TotalDisc = document.getElementById('TotDisc').value= "₱ 0.00";
    }
    function ExitButton() {
      window.location.href="dashboard.php";
    }
    function CancelButton() {
      document.getElementById("OrderDits").reset();
      TotalQty = document.getElementById('TotQty').value= 0;
      Total = document.getElementById('TotAmt').value= "₱ 0.00";
      TotalDisc = document.getElementById('TotDisc').value= "₱ 0.00";
      alert("ORDER HAS BEEN CANCELLED");
    }

    function DiscountButton() {
      Qty = parseFloat(document.getElementById('qty').value);
      Subtotal = Qty*500;
      CompDiscAmnt = Subtotal * .25; 
      CompDiscedAmnt = Subtotal- CompDiscAmnt;
      DiscAmnt = document.getElementById('DiscAmnt').value= "₱ " + CompDiscAmnt + ".00";
      DiscedAmnt = document.getElementById('DiscedAmnt').value= "₱ " + CompDiscedAmnt + ".00";
    
      if (document.getElementById('qty').value.length == 0 || document.getElementById('qty').value.length == 0){
        alert("QUANTITY SHOULD BE AT LEAST 1")
        NoDisc = 0;
        CompNoDiscAmnt = NoDisc * .25; 
        CompNoDiscedAmnt = NoDisc - CompNoDiscAmnt;
        DiscAmnt = document.getElementById('DiscAmnt').value= "₱ " + CompNoDiscAmnt + ".00";
        DiscedAmnt = document.getElementById('DiscedAmnt').value= "₱ " + CompNoDiscedAmnt + ".00";
      }
    }

    function NoDiscButton() {
      NoDisc = 0;
      CompNoDiscAmnt = NoDisc * .25; 
      CompNoDiscedAmnt = NoDisc - CompNoDiscAmnt;
      DiscAmnt = document.getElementById('DiscAmnt').value= "₱ " + CompNoDiscAmnt + ".00";
      DiscedAmnt = document.getElementById('DiscedAmnt').value= "₱ " + CompNoDiscedAmnt + ".00";

      if (document.getElementById('qty').value.length == 0 || document.getElementById('qty').value.length == 0){
        alert("QUANTITY SHOULD BE AT LEAST 1")
        return false;
      }
    }

    function CalculateButton() {
      Qty = parseFloat(document.getElementById('qty').value);
      if (DiscAmnt == "₱ " + CompNoDiscAmnt + ".00"){
        TotalQty = document.getElementById('TotQty').value= Qty;
        Subtotal = Qty*500;
        NoDisc = Qty*0;
        CompNoDiscAmnt = NoDisc * .25; 
        CompNoDiscedAmnt = NoDisc - CompNoDiscAmnt;
        Total = document.getElementById('TotAmt').value= "₱ " + Subtotal + ".00";
        TotalNoDisc = document.getElementById('TotDisc').value= "₱ " + CompNoDiscedAmnt + ".00";
      }

      else if (DiscAmnt => 1){
        TotalQty = document.getElementById('TotQty').value= Qty;
        Total = document.getElementById('TotAmt').value= "₱ " + CompDiscedAmnt + ".00";
        TotalDisc = document.getElementById('TotDisc').value= "₱ " + CompDiscAmnt + ".00";
      }
      
    }

    function ChangeButton() {
      Qty = parseFloat(document.getElementById('qty').value);
      if (DiscAmnt == "₱ " + CompNoDiscAmnt + ".00"){
        CashRndrd = parseFloat(document.getElementById('CashRndrd').value);
        CompChange = CashRndrd - Subtotal; 
        Change = document.getElementById('Change').value= "₱ " + CompChange + ".00";
        
       if (CompChange == 0) {
          return Change = document.getElementById('Change').value= "₱ 0.00";
        }
       if (CashRndrd <= Subtotal || CashRndrd === null || CashRndrd <= 0){
          alert ("CASH IS INVALID! TRY AGAIN!");
          return Change = document.getElementById('Change').value= "₱ 0.00";
        }
      }

      else if (DiscAmnt => 1){
        CashRndrd = parseFloat(document.getElementById('CashRndrd').value);
        CompChange = CashRndrd - CompDiscedAmnt; 
        Change = document.getElementById('Change').value= "₱ " + CompChange + ".00";

        if (CompChange == 0) {
          return Change = document.getElementById('Change').value= "₱ 0.00";
        }
        if (CashRndrd <= CompDiscedAmnt || CashRndrd === null || CashRndrd <= 0) {
          alert ("CASH IS INVALID! TRY AGAIN!");
          return Change = document.getElementById('Change').value= "₱ 0.00";
        }
      }
    
    }
    
  </script>
 <! return DiscAmnt = document.getElementById('DiscAmnt').value= "₱ 0.00";
        return NullDiscedAmnt = document.getElementById('DiscedAmnt').value= NullDiscedAmnt;>

    <div class="grid-container">
      <div class="column-left">
        <h1> MERCA'S PIZZERIA ESTD 2022 | POS</h1> 
        <pre class="credits"> LABEL 12                    By: Angelica Joy Q. Glory     Terminal #17</pre>
        <div class="screen">
            <form id="OrderDits" name="OrderDits" class="Summary" action="Wp3POS.php" method="POST">
              <section>
                <fieldset>
                  <label for="NameOfItem" class="dits">Name of an item:</label>
                  <input type="text" class="details" placeholder = "Pizza Name" id="NameItem" name="NameOfItem" size="40" disabled>
                  <button type="button" class="btn" onclick="ChangeButton()">CHANGE</button><br>

                  <label for="qty">Quantity:</label>
                  <input type="number" class="details" placeholder = "0" id="qty" name="qty" min="1">
                  <input type="radio" id="SenCtzn" name="Discount" value="SC" onclick="DiscountButton();">
                  <label for="html" class="choices">Senior Citizen</label>
                  <button type="button" class="btn" onclick="CalculateButton()">CALCULATE</button><br>

                  <label for="price">Price: </label>
                  <input type="text" class="Amntdetails" class="details" placeholder = "&#8369; 0.00" id="price" step="any" name="price" disabled>
                  <input type="radio" id="DiscCard" name="Discount" value="DiscCard" onclick="DiscountButton()">
                  <label for="html" class="choices">With Disc. Card</label>
                  <button type="button" class="btn" onclick="NewButton()">NEW</button><br>

                  <label for="DiscAmnt">Discount Amount: </label>
                  <input type="text" class="Amntdetails" placeholder = "&#8369; 0.00" id="DiscAmnt" name="DiscAmnts" disabled>
                  <input type="radio" id="EmpDisc" name="Discount" value="EmpDisc" onclick="DiscountButton()">
                  <label for="html" class="choices">Employee Disc</label>
                  <button type="button" class="btn" onclick="CancelButton()">CANCEL</button><br>

                  <label for="DiscedAmnt">Discounted Amount: </label>
                  <input type="text" class="Amntdetails" placeholder = "&#8369; 0.00" id="DiscedAmnt" name="DiscedAmnts" disabled>
                  <input type="radio" id="NoDisc" name="Discount" value="NoDisc" onclick="NoDiscButton()">
                  <label for="html" class="choices">No Discount</label>
                  <button type="button" class="btn" onclick="ExitButton()">EXIT</button><br>
              
                </fieldset>
              </section>
            </form>
        </div>

        <form>
          <section>
            <fieldset>
              <legend>Summary</legend>
              <label for="TotQty">Total Quantity: </label>
              <input type="text" class="SumAmntdetails" placeholder = "0" id="TotQty" name="TotQty" size="55" disabled><br>
              <label for="TotDisc">Total Amount: </label>
              <input type="text" class="SumAmntdetails" placeholder = "&#8369; 0.00" id="TotAmt" name="TotAmt" size="55" disabled><br>
              <label for="TotDisc">Total Discount Given: </label>
              <input type="text" class="SumAmntdetails" placeholder = "&#8369; 0.00" id="TotDisc" name="TotDisc" size="55" disabled><br>

            </fieldset>
          </section>
        </form>

        <form id="Transaction" name="Transaction" class="transact" action="Wp3POS.php" method="POST">
          <section>
            <fieldset class="transact">
              <pre class="cash">   Cash Rendered:        Change:</pre>
              <input type="text" placeholder = "&#8369; 0.00" id="CashRndrd" name="CashRndrd" size="12" class="CashRcvd">
              <input type="text" placeholder = "&#8369; 0.00" id="Change" name="Change" size="12" class="CashRcvd" disabled><br>
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
                  <input Name="PZ1" Type="button" class="MenuButtonL" onclick="OrderDits.NameOfItem.value='Cheese Mania'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">CHEESE MANIA</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ2" Type="button" class="MenuButtonM"  onclick="OrderDits.NameOfItem.value='Ham N Cheese'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">HAM & CHEESE</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ3" Type="button" class="MenuButtonM"  onclick="OrderDits.NameOfItem.value='Pepperoni Feast'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">PEPPERONI FEAST</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ4" Type="button" class="MenuButtonM"  onclick="OrderDits.NameOfItem.value='Angus Steakhouse'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">ANGUS STEAKHOUSE</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ5" Type="button" class="MenuButtonR"  onclick="OrderDits.NameOfItem.value='Merca\'s Deluxe'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">MERCA'S DELUXE</pre>
                </div>
              </div>

              <div class="row">
                <div class="col-5">
                  <input Name="PZ6" Type="button" class="MenuButtonL" onclick="OrderDits.NameOfItem.value='Tomato N Black Olives'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">TOMATO & BLACK OLIVES</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ7" Type="button" class="MenuButtonM" onclick="OrderDits.NameOfItem.value='Pacific Veggie'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">PACIFIC VEGGIE</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ8" Type="button" class="MenuButtonM" onclick="OrderDits.NameOfItem.value='Creamy N Tuna Delight'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">CREAMY & TUNA DELIGHT</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ9" Type="button" class="MenuButtonM" onclick="OrderDits.NameOfItem.value='Ultimate Pepperoni'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">ULTIMATE PEPPERONI</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ10" Type="button" class="MenuButtonR" onclick="OrderDits.NameOfItem.value='Extravaganza'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">EXTRAVAGANZZA</pre>
                </div>
              </div>

              <div class="row">
                <div class="col-5">
                  <input Name="PZ11" Type="button" class="MenuButtonL" onclick="OrderDits.NameOfItem.value='Bacon Cheeseburger'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">BACON CHEESEBURGER</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ12" Type="button" class="MenuButtonM" onclick="OrderDits.NameOfItem.value='Potato Bacon'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">POTATO BACON</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ13" Type="button" class="MenuButtonM" onclick="OrderDits.NameOfItem.value='Meatzza'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">MEATZZA</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ14" Type="button" class="MenuButtonM" onclick="OrderDits.NameOfItem.value='White Bacon'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">WHITE BACON</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ15" Type="button" class="MenuButtonR" onclick="OrderDits.NameOfItem.value='Angus Burger'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">ANGUS BURGER</pre>
                </div>
              </div>

              <div class="row">
                <div class="col-5">
                  <input Name="PZ16" Type="button" class="MenuButtonL" onclick="OrderDits.NameOfItem.value='Garlic N Cheese'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">GARLIC 'N' CHEESE</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ17" Type="button" class="MenuButtonM" onclick="OrderDits.NameOfItem.value='Scallop Primo'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">SCALLOP PRIMO</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ18" Type="button" class="MenuButtonM" onclick="OrderDits.NameOfItem.value='Truffle Greens'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">TRUFFLE GREENS</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ19" Type="button" class="MenuButtonM" onclick="OrderDits.NameOfItem.value='Pepperoni N Cheese'; OrderDits.price.value='&#8369; 500.00'">
                  <pre class="prod-name">PEPPERONI & CHEESE</pre>
                </div>
                <div class="col-5">
                  <input Name="PZ20" Type="button" class="MenuButtonR" onclick="OrderDits.NameOfItem.value='Pizza Merca'; OrderDits.price.value='&#8369; 500.00'">
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