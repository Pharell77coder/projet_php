function generateRound(list) {
    let matches = [];
    
    if (list.length % 2 === 1) {
        list.push(null);
    }
    
    for (let j = 0; j < list.length - 1; j++) {
        let halfLength = Math.floor(list.length / 2);
        for (let i = 0; i < halfLength; i++) {
            let match = [list[i], list[list.length - 1 - i]];
            matches.push(match);
        }
        list.splice(1, 0, list.pop());
    }
    
    matches = matches.filter(match => !match.includes(null));
    
    return matches;
}

let teams = ['Team A', 'Team B', 'Team C', 'Team D'];
let rounds = generateRound(teams);
console.log(rounds);
