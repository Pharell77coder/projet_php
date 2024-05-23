// Tableau des équipes
const equipes = [
    {nom: "Paris", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Lens", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Marseille", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Monaco", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Lille", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Rennes", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Lyon", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Reims", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
      {nom: "Nice", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Lorient", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Clermont", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Toulouse", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Montpelier", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Nantes", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Auxerre", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
    {nom: "Brest", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
      {nom: "Strasbourg", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
      {nom: "Troyes", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
      {nom: "Ajaccio", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
      {nom: "Angers", victoires: 0, nuls: 0, defaites: 0, butsPour: 0, butsContre: 0},
  ];
  
  // Fonction pour calculer le nombre de points d'une équipe
  function calculerPoints(equipe) {
    return equipe.victoires * 3 + equipe.nuls;
  }
  
  // Trier les équipes par points, puis différence de buts, puis buts pour
  function trieClassement() {
    equipes.sort((a, b) => {
    const diffPoints = calculerPoints(b) - calculerPoints(a);
    if (diffPoints !== 0) {
      return diffPoints;
    } else {
      const diffButs = b.butsPour - b.butsContre - (a.butsPour - a.butsContre);
      if (diffButs !== 0) {
        return diffButs;
      } else {
        return b.butsPour - a.butsPour;
      }
    }
  });
  }
  
  // Créer une table HTML pour afficher le classement
  let classementTable = document.createElement('table');
  let classementHeader = document.createElement('tr');
  let classementHeaderCells = ['Pos', 'Équipe', 'V', 'N', 'D', 'BP', 'BC', 'Diff', 'Pts'];
  classementHeaderCells.forEach(cellText => {
    const cell = document.createElement('th');
    cell.textContent = cellText;
    classementHeader.appendChild(cell);
  });
  classementTable.appendChild(classementHeader);
  
  equipes.forEach((equipe, index) => {
    
    const classementRow = document.createElement('tr');
    const classementRowCells = [index + 1, equipe.nom, equipe.victoires, equipe.nuls, equipe.defaites, equipe.butsPour, equipe.butsContre, equipe.butsPour - equipe.butsContre, calculerPoints(equipe)];
    classementRow.classList.add('classement-row-' + (index + 1));
    classementRowCells.forEach(cellText => {
      const cell = document.createElement('td');
      cell.textContent = cellText;
      classementRow.appendChild(cell);
    });
    classementTable.appendChild(classementRow);
  });
  
  // Ajouter la table de classement au DOM
  const classementContainer = document.getElementById('classement');
  classementContainer.appendChild(classementTable);
  
  // Tableau des matchs
  function generateMatchs(start) {
    const matchs = [];
    let date = new Date(start);
    let n = equipes.length;
    let moitie = Math.floor(n / 2);
  
    // Créer un tableau pour les numéros des matchs
    let matchs1 = [];
    for (var i = 0; i < n - 1; i++) {
      matchs1.push(i + 1);
    }
  
    for (let jour = 0; jour < n - 1; jour++) {
        for (let i = 0; i < moitie; i++) {
          const equipe1 = equipes[i];
          const equipe2 = equipes[n - 1 - i];
          let cote1 = 3.5 - (equipes[i].victoires + equipes[i].defaites+ equipes[i].nuls+1) / (equipes[i].victoires+equipes[n - 1 - i].defaites+1);
          let cote2 = 3.5 - (equipes[n - 1 - i].victoires + equipes[n - 1 - i].defaites+ equipes[i].nuls+1) / (equipes[n - 1 - i].victoires+equipes[i].defaites+1); 
          let coteN = 7 - cote1 - cote2;
            matchs.push({
              date: new Date(date).toLocaleDateString(),
              equipe1: equipe1,
              equipe2: equipe2,
              cote1: cote1,
              coteN: coteN,
              cote2: cote2
            });
          // Faire tourner le ruban
          
  
      }date.setDate(date.getDate() + 7);
      equipes.splice(1, 0, equipes.pop());
    }
  
    return matchs;
  }
  
  let matchs = generateMatchs('2022-08-05');
  console.log(matchs);
  
  function formatDate(date) {
    const day = date.getDate().toString().padStart(2, '0');
    const month = (date.getMonth() + 1).toString().padStart(2, '0');
    const year = date.getFullYear().toString();
    return `${day}/${month}/${year}`;
  }
  
  // Créer une table HTML pour afficher le calendrier avec les cotes
  const calendrierTable = document.createElement('table');
  const calendrierHeader = document.createElement('tr');
  const calendrierHeaderCells = ['Date', 'Match', '1x', 'X', '2x'];
  calendrierHeaderCells.forEach(cellText => {
    const cell = document.createElement('th');
    cell.textContent = cellText;
    calendrierHeader.appendChild(cell);
  });
  calendrierTable.appendChild(calendrierHeader);
  
  matchs.forEach(match => {
    const calendrierRow = document.createElement('tr');
    const dateCell = document.createElement('td');
    dateCell.textContent = match.date;
    const matchCell = document.createElement('td');
    matchCell.textContent = `${match.equipe1.nom} - : - ${match.equipe2.nom}`;
    const cote1Cell = document.createElement('td');
    cote1Cell.textContent = match.cote1;
    const coteNCell = document.createElement('td');
    coteNCell.textContent = match.coteN;
    const cote2Cell = document.createElement('td');
    cote2Cell.textContent = match.cote2;
    
    calendrierRow.appendChild(dateCell);
    calendrierRow.appendChild(matchCell);
    calendrierRow.appendChild(cote1Cell);
    calendrierRow.appendChild(coteNCell);
    calendrierRow.appendChild(cote2Cell);
    
    calendrierTable.appendChild(calendrierRow);
  });
  
  // Ajouter la table au DOM
  const calendrierContainer = document.getElementById('calendrier');
  calendrierContainer.appendChild(calendrierTable);
  
  const base_de_donnees = [];
   
  function simulMatch(data) {
    const equipe1 = data.equipe1;
    const equipe2 = data.equipe2;
    const date = data.date;
    let cote1 = ((equipe1.victoires + equipe1.defaites+ equipe1.nuls+3) / (equipe1.victoires+1)).toFixed(2);
     let cote2 = ((equipe2.victoires + equipe2.defaites+ equipe2.nuls+3) / (equipe2.victoires+1)).toFixed(2); 
          let coteN = ((equipe1.victoires + equipe1.defaites + equipe1.nuls + equipe2.victoires + equipe2.defaites + equipe2.nuls+3) / (equipe1.nuls +equipe2.nuls + 1)).toFixed(2);
    let score1 = 0;
    let score2 = 0;
    for (let i = 0; i < 10; i++) {
      let resultat = Math.floor(Math.random()*10);
      if (resultat == 1) {
        score2++;
      }else if(resultat == 0) {
        score1++;
      }
    }if (score1 > score2) {
      equipe1.victoires++;
      equipe2.defaites++;
    }else if (score1 < score2) {
      equipe2.victoires++;
      equipe1.defaites++;
    }else {
      equipe1.nuls++;
      equipe2.nuls++;
    }
    equipe1.butsPour += score1;
    equipe2.butsPour += score2;
    equipe1.butsContre += score2;
    equipe2.butsContre += score1;  
    base_de_donnees.push({
              date: date,
              equipe1: equipe1,
              equipe2: equipe2,
              score1: score1,
              score2: score2,
              cote1: cote1,
              coteN: coteN,
              cote2: cote2
            });
    return base_de_donnees;
  }
  
  const boutonEffacer = document.getElementById('jour-suivant');
  const tableau = document.querySelector('#calendrier');
  let compteur = 0;
  
  
  boutonEffacer.addEventListener('click', function() {
    base = simulMatch(matchs[compteur]);
    compteur++;
    if (compteur == matchs.length) {
      //compteur = 0;
      //matchs = generateMatchs('2023-08-05');
      boutonEffacer.innerHTML = 'fin';
    }
    tableau.innerHTML = ''; // Efface le contenu du tableau
    classementTable.innerHTML = '';
    let i = base.length;
      // Créer une table HTML pour afficher le calendrier avec les cotes
  const calendrierTable = document.createElement('table');
  const calendrierHeader = document.createElement('tr');
  const calendrierHeaderCells = ['Date', 'Match', '1x', 'X', '2x'];
  calendrierHeaderCells.forEach(cellText => {
    const cell = document.createElement('th');
    cell.textContent = cellText;
    calendrierHeader.appendChild(cell);
  });
  calendrierTable.appendChild(calendrierHeader);
  
  base.forEach(match => {
    const calendrierRow = document.createElement('tr');
    const dateCell = document.createElement('td');
    dateCell.textContent = match.date;
    const matchCell = document.createElement('td');
    matchCell.textContent = `${match.equipe1.nom} ${match.score1} : ${match.score2} ${match.equipe2.nom}`;
    const cote1Cell = document.createElement('td');
    cote1Cell.textContent = match.cote1;
    const coteNCell = document.createElement('td');
    coteNCell.textContent = match.coteN;
    const cote2Cell = document.createElement('td');
    cote2Cell.textContent = match.cote2;
    
    calendrierRow.appendChild(dateCell);
    calendrierRow.appendChild(matchCell);
    calendrierRow.appendChild(cote1Cell);
    calendrierRow.appendChild(coteNCell);
    calendrierRow.appendChild(cote2Cell);
    
    calendrierTable.appendChild(calendrierRow);
  });
  
  // Ajouter la table au DOM
  const calendrierContainer = document.getElementById('calendrier');
  calendrierContainer.appendChild(calendrierTable);
    
    
  trieClassement();
  
  // Créer une table HTML pour afficher le classement
  classementTable = document.createElement('table');
  classementHeader = document.createElement('tr');
  classementHeaderCells = ['Pos', 'Équipe', 'V', 'N', 'D', 'BP', 'BC', 'Diff', 'Pts'];
  classementHeaderCells.forEach(cellText => {
    const cell = document.createElement('th');
    cell.textContent = cellText;
    classementHeader.appendChild(cell);
  });
  classementTable.appendChild(classementHeader);
  
  equipes.forEach((equipe, index) => {
    
    const classementRow = document.createElement('tr');
    const classementRowCells = [index + 1, equipe.nom, equipe.victoires, equipe.nuls, equipe.defaites, equipe.butsPour, equipe.butsContre, equipe.butsPour - equipe.butsContre, calculerPoints(equipe)];
    classementRow.classList.add('classement-row-' + (index + 1));
    classementRowCells.forEach(cellText => {
      const cell = document.createElement('td');
      cell.textContent = cellText;
      classementRow.appendChild(cell);
    });
    classementTable.appendChild(classementRow);
  });
  
  // Ajouter la table de classement au DOM
  const classementContainer = document.getElementById('classement');
  classementContainer.appendChild(classementTable);
  
    
  });
  
  const navLinks = document.querySelectorAll('nav a');
   
  for (const link of navLinks) {
    link.addEventListener('click', clickHandler);
  }
   
  function clickHandler(e) {
    e.preventDefault();
    const href = this.getAttribute('href');
    const offsetTop = document.querySelector(href).offsetTop;
   
    scroll({
      top: offsetTop,
      behavior: 'smooth'
    });
  }
