// header
const Header = document.getElementById('header').innerHTML = '<h4>Dashboard</h4><div class="profile"><span class="fas fa-search"></span><img class="profile-image" alt="no avaible image" src="https://pbs.twimg.com/media/FREjAjXXwAASCp7.jpg:large"><p class="profile-name">Administrateur</p></div>';

// nav
const navData = [
    { title: 'général', icon: 'fas fa-clipboard-list'},
    { title: 'equipes', icon: 'fas fa-users'},
    { title: 'rencontres', icon: 'fas fa-futbol'},
    { title: 'joueurs', icon: 'fas fa-chart-line'},
    { title: 'contact', icon: 'fas fa-id-card'},
    { title: 'parametre', icon: 'fas fa-cog'}
];

const Nav = document.getElementById('nav');
navData.forEach(ligne => {
    Nav.innerHTML += `
    <div class="nav-menu"><span class="${ligne.icon}"></span><p>${ligne.title[0].toUpperCase()}${ligne.title.slice(1)}</p></div>
    `;
});

// 4 cards top
const topCardData = [
    { title: 'Revenue', paragraphe: 'Lorem ipsem dolor', numbers: ['1,873,250', 'USD'], icon: 'fas fa-money-check-alt'},
    { title: 'Total Orders', paragraphe: 'Lorem ipsem dolor', numbers: ['10,890', 'Orders'], icon: 'fas fa-boxes'},
    { title: 'Customer', paragraphe: 'Lorem ipsem dolor', numbers: ['340', 'Compagnies'], icon: 'fas fa-user-friends'},
    { title: 'Daily Orders', paragraphe: 'Lorem ipsem dolor', numbers: ['56', 'Orders'], icon: 'fas fa-shipping-fast'}
];

let i = 0;
const Main = document.getElementById('main');
/*topCardData.forEach(ligne => {
    i += 1;
    Main.innerHTML += `<div class="card total${i}"><div class="info">
    <div class="info-detail"><h3>${ligne.title}</h3>
    <p>${ligne.paragraphe}</p><h2>${ligne.numbers[0]} <span>${ligne.numbers[1]}</span></h2>
    </div><div class="info-image"><i class="${ligne.icon}"></i></div></div></div>`;
});*/

// frist card bottom 
/*const detail = document.createElement("div");
detail.className = "card detail";
detail.id = "card detail";

const headerDetail = document.createElement("div");
headerDetail.className = "detail-header";
headerDetail.id = "detail-header";
headerDetail.innerHTML += '<h2>Rencontres</h2><button> See More</button>';

const tableData = [
    {domicile: 'Paris-SG', score: '4-1', exterieur: 'Marseille', date: 'Apr 11, 2021'},
    {domicile: 'Lyon', score: '3-3', exterieur: 'Lille', date: 'Mar 29, 2021'},
    {domicile: 'Lille', score: '2-4', exterieur: 'Paris-SG', date: 'Feb 10, 2020'},
    {domicile: 'Marseille', score: '1-2', exterieur: 'Lyon', date: 'Dec 11, 2020'},
    {domicile: 'Paris-SG', score: '3-2', exterieur: 'Lyon', date: 'Nov 20, 2020'},
    {domicile: 'Marseille', score: '1-3', exterieur: 'Lille', date: 'Nov 01, 2020'}
    
];

const tableDetail = document.createElement("table");
tableDetail.innerHTML = `<tr><th>Date</th><th>Domicile</th>
<th>Score</th><th>Exterieur</th></tr>`;

tableData.forEach(ligne => {
    tableDetail.innerHTML += `<tr><td>${ligne.date}</td><td>${ligne.domicile}</td><td>${ligne.score}</td>
    <td>${ligne.exterieur}</td></tr>`;
});

detail.appendChild(headerDetail);
detail.appendChild(tableDetail);
Main.appendChild(detail);*/


// Second Bottom card
const customer = document.createElement("div");
customer.className = "card customer";
customer.id = "card customer";
customer.innerHTML = "<h2>Joueurs</h2>";

const Data = [
    {image: 'https://pbs.twimg.com/media/EYt947jXYAY7So1.jpg:large', name: 'Baggy', description: 'Aux milles pieces', login: 'Today'},
    {image: 'https://img.wattpad.com/story_parts/1254730024/images/170858dbfeceef4b569029974783.gif', name: 'Doflamingo', description: 'Joker', login: 'Today'},
    {image: 'https://pbs.twimg.com/media/ErXj7hSW8AckL_l.jpg', name: 'Teach', description: 'Barbe noire', login: 'Yesterday'},
    {image: 'https://64.media.tumblr.com/001bdb860de2ea9bc9cc21fc6988f13b/d66cbcd97ae5ebef-43/s540x810/2187a41e09b8d1096783e166d83fbabe1019d592.jpg', name: 'Zoro', description: 'Le chasseur de pirates', login: 'Yesterday'},
    {image: 'https://yzgeneration.com/wp-content/uploads/2022/04/One_Piece_1015_3.webp', name: 'Yamato', description: 'La fille du demon', login: 'Yesterday'}
];

Data.forEach(ligne => {
    customer.innerHTML += `<div class="customer-wrapper">
    <img class="customer-image" alt="no avaible image" src="${ligne.image}">
    <div class="customer-name">
      <h4>${ligne.name}</h4>
      <p>${ligne.description}</p>
    </div>
    <p class="customer-date">${ligne.login}</p>
  </div>`;
});


Main.appendChild(customer);



function saveMatchData(content) {
    fetch('http://localhost:3000/saveMatch', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ content: content }),
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
}

function main_league(liste_equipe) {
    const Container = document.getElementById('main');
    const Element = document.createElement("div");
    Element.innerHTML = `<div class="matchs-header"><h2>Toutes les rencontres</h2><button>Reboot</button></div><table>
        <tr><th>Date</th><th>Dom</th><th>Score</th><th>Ext</th></tr>`;
    Element.className = "card";
    Element.id = "card";

    let equipes = liste_equipe;
    let matchs = generateRound(equipes, '2023-08-05', 2);
    let classement = {};
    for (let equipe of equipes) {
        classement[equipe] = { points: 0 };
    }
    for (let ronde = 0; ronde < matchs.length; ronde++) {
        let scoreDom = Math.floor(Math.random() * 6);
        let scoreExt = Math.floor(Math.random() * 6);
        if (scoreDom === scoreExt) {
            classement[matchs[ronde][0]].points += 1;
            classement[matchs[ronde][1]].points += 1;
        } else if (scoreDom > scoreExt) {
            classement[matchs[ronde][0]].points += 3;
        } else if (scoreDom < scoreExt) {
            classement[matchs[ronde][1]].points += 3;
        }
        Element.innerHTML += `<tr><th>${matchs[ronde][2]}</th><th>${matchs[ronde][0]}</th><th>${scoreDom} : ${scoreExt}</th><th>${matchs[ronde][1]}</th>`;
    }
    Element.innerHTML += `</table>`;
    let items = Object.keys(classement).map(function(key) {
        return [key, classement[key].points];
    });
    items.sort(function(first, second) {
        return second[1] - first[1];
    }); 

    const Ranking = document.createElement("div");
    Ranking.className = "card ranking";
    Ranking.id = "card";
    Ranking.innerHTML = `<div class="ranking-header"><h2>Classement</h2><button>Reboot</button></div>`;
    const Classement = generateRanking(items)
    Ranking.appendChild(Classement);
    Container.appendChild(Ranking);
    Container.appendChild(Element);

    // Save the generated HTML to the database
    saveMatchData(Element.innerHTML);
}
