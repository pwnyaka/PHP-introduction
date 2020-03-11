"use strict";

function deleteProduct(url = '', data = {}) {
  return fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    headers: {
      'content-type': 'application/json'
    },
  })
      .then(response => response.json())
      .then((data) => {
        document.querySelector('.count').innerText = data.count;
        document.querySelector('.total-sum').innerText = data.basketSum;
        if (document.getElementById(data.id)) {
          document.querySelector(`.product-sum[data-id="${data.id}"]`).innerText = data.productSum;
        }
      })
      .catch(error => console.error(error)); // ловит ошибки
}

let delButtons = document.querySelectorAll('.del-btn');
delButtons.forEach((elem) => {
  elem.addEventListener('click', () => {
    let id = elem.getAttribute('data-id');
    deleteProduct('/api/delete', {"id": id});
    if (document.querySelector(`.quantity[data-id="${id}"]`).innerText == 1) {
      document.getElementById(id).remove();
    } else {
      document.querySelector(`.quantity[data-id="${id}"]`).innerText -= 1;
    }
  })
});