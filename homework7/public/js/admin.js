"use strict";

function acceptOrder(url = '', data = {}) {
  return fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    headers: {
      'content-type': 'application/json'
    },
  })
      .then(response => response.json())
      .then(() => document.location.reload())
      .catch(error => console.error(error)); // ловит ошибки
}

let acceptButtons = document.querySelectorAll('.accept');
acceptButtons.forEach((elem) => {
  elem.addEventListener('click', () => {
    let id = elem.getAttribute('data-id');
    acceptOrder('/api/accept', {"id": id})
  })
});