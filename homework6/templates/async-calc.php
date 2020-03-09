<h2>Калькулятор на асинхронных запросах</h2>
<h6>(Результат по нажатию на кнопки операций)</h6>
<div class="calc-wrapper">
  <input type="text" class="operand1" value="">
  <button class="operation sum">+</button>
  <button class="operation sub">-</button>
  <button class="operation mul">*</button>
  <button class="operation div">/</button>
  <input type="text" class="operand2" value="">
  <button class="operation action">=</button>
  <input class="result" type="text" value="">
</div>
<script>
  "use strict";
  const operand1 = document.querySelector('.operand1'),
      operand2 = document.querySelector('.operand2'),
      sum = document.querySelector('.sum'),
      sub = document.querySelector('.sub'),
      mul = document.querySelector('.mul'),
      div = document.querySelector('.div');


  sum.addEventListener('click', () => {
    postData('/add', {"operand1": operand1.value, "operand2": operand2.value, "operation": sum.innerText})
  });
  sub.addEventListener('click', () => {
    postData('/add', {"operand1": operand1.value, "operand2": operand2.value, "operation": sub.innerText})
  });
  mul.addEventListener('click', () => {
    postData('/add', {"operand1": operand1.value, "operand2": operand2.value, "operation": mul.innerText})
  });
  div.addEventListener('click', () => {
    postData('/add', {"operand1": operand1.value, "operand2": operand2.value, "operation": div.innerText})
  });

  function postData(url = '', data = {}) {
    return fetch(url, {
      method: 'POST',
      body: JSON.stringify(data),
      headers: {
        'content-type': 'application/json'
      },
    })
        .then(response => response.json())   // парсит JSON ответ в Javascript объект
        .then((data) => {document.querySelector('.result').value = data.result}) // записывает значение в конечный инпут
        .catch(error => console.error(error)); // ловит ошибки
  }
</script>
