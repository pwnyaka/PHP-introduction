<form class="calc-wrapper" action="/calculator" method="post">
  <input type="text" name="value1" value="<?=$values["value1"]?>">
  <select name="operation"">
    <option <?if ($values["operation"] == '+') echo "selected";?> value="+">+</option>
    <option <?if ($values["operation"] == '-') echo "selected";?> value="-">-</option>
    <option <?if ($values["operation"] == '*') echo "selected";?> value="*">*</option>
    <option <?if ($values["operation"] == '/') echo "selected";?> value="/">/</option>
  </select>
  <input type="text" name="value2" value="<?=$values["value2"]?>">
  <button style="width: 50px;" type="submit">=</button>
  <input type="text" value="<?=$values["result"]?>">
</form>