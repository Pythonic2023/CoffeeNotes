import { buttonClicked } from './openmenu.js';
import { closeModal } from './openmenu.js';

const btn = document.querySelector('.menu-button');
btn.addEventListener('click', buttonClicked);

const closeButton = document.querySelector(".close");
closeButton.addEventListener('click', closeModal);
