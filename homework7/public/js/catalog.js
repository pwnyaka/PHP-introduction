"use strict";

function addProduct(url = '', data = {}) {
  return fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    headers: {
      'content-type': 'application/json'
    },
  })
      .then(response => response.json())
      .then((data) => {document.querySelector('.count').innerText = data.count})
      .catch(error => console.error(error)); // ловит ошибки
}

let buyButtons = document.querySelectorAll('.buy-btn');
buyButtons.forEach((elem) => {
  elem.addEventListener('click', () => {
    let id = elem.getAttribute('data-id');
    addProduct('/api/buy', {"id": id})
  })
})