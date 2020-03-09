<form class="calc-wrapper" action="/calculator" method="post">
  <input type="text" name="value1" value="<?=$value1?>">
  <select name="operation"">
    <option <?if ($operation == '+') echo "selected";?> value="+">+</option>
    <option <?if ($operation == '-') echo "selected";?> value="-">-</option>
    <option <?if ($operation == '*') echo "selected";?> value="*">*</option>
    <option <?if ($operation == '/') echo "selected";?> value="/">/</option>
  </select>
  <input type="text" name="value2" value="<?=$value2?>">
  <button style="width: 50px;" type="submit">=</button>
  <input type="text" value="<?=$result?>">
</form>