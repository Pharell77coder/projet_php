function generateRound(list, start, game = 1) {
  let matches = [];
  let date = new Date(start);
  let match;
  
  if (list.length % 2 === 1) {
      list.push(null);
  }
  for (let k = 0; k < game; k++) {
      for (let j = 0; j < list.length - 1; j++) {
          let halfLength = Math.floor(list.length / 2);
          for (let i = 0; i < halfLength; i++) {
              if (k % 2 === 1) {
                  match = [list[list.length - 1 - i], list[i], new Date(date).toLocaleDateString(),];
              } else{
                  match = [list[i], list[list.length - 1 - i], new Date(date).toLocaleDateString(),];
          }
              matches.push(match);
          }
          list.splice(1, 0, list.pop());
          if (j % (list.length / 2)  === 0){
              date.setDate(date.getDate() + 7);
          }
      }
  }
  matches = matches.filter(match => !match.includes(null));
  
  return matches;
}

function generateRanking(items){
  const Classement = document.createElement("table");
  const classementHeader = document.createElement('tr');
  const classementHeaderCells = ['Pos', 'Équipe', 'Pts'];
  Classement.className = "classement";
  Classement.id = "classement";

  classementHeaderCells.forEach(cellText => {
    const cell = document.createElement('th');
    cell.textContent = cellText;
    classementHeader.appendChild(cell);
    });
    Classement.appendChild(classementHeader);
    items.forEach((equipe, index) => {
        
        const classementRow = document.createElement('tr');
        const classementRowCells = [index + 1, equipe[0], equipe[1]];
        classementRow.classList.add('classement-row-' + (index + 1));
        classementRowCells.forEach(cellText => {
        const cell = document.createElement('td');
        cell.textContent = cellText;
        classementRow.appendChild(cell);
        });
        Classement.appendChild(classementRow);
    });
    return Classement;
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
        //console.log(`${matchs[ronde][2]} Ronde ${ronde + 1}: ${matchs[ronde][0]} contre ${matchs[ronde][1]}`);
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
}