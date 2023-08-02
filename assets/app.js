/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

const valueIdEl = document.getElementById('value-id');
const inputEl = document.querySelector('.user-input');

inputEl.addEventListener('input', async (e) => {
  const response = await fetch(`check-value/${e.target.value}`);
  const data = await response.json();

  if (data.rangeId) {
    valueIdEl.innerText = data.rangeId;
    return;
  }

  valueIdEl.innerText = 'Нет совпадений';
});
