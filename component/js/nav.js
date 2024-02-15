"use strict";

const navData = [
    { title: 'accueil'},
    { title: 'match'},
    { title: 'calendrier'},
    { title: 'classement'}
];

//Barre de navigation en javascript
const navContainer = document.getElementById('nav');
const navElement = document.createElement('ul');
navData.forEach(ligne => {
    navElement.innerHTML += `
      <li><a href="../php/${ligne.title}.php">${ligne.title[0].toUpperCase()}${ligne.title.slice(1)}</a></li>
    `;
    navContainer.appendChild(navElement);
});