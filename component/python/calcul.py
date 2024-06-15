def probabilite(x, y):
    if x < 0 or y < 0:
        raise ValueError("Les nombres doivent être positifs")

    somme = x + y
    
    prob_x = x / somme
    prob_y = y / somme
    
    prob_nul = abs(x - y) / somme
    
    return prob_x, prob_y, prob_nul

def cotes(probabilite):
    if probabilite > 0:
        return 1 / probabilite
    else:
        return float('inf')

def calcul_elo(s1, s2, prob_x, prob_y):
    if s1 > s2:
        x = 1 - prob_x/prob_x+prob_y
        y = 0 - prob_y/prob_x+prob_y
    elif s1 == s2:
        x = 0.5 - prob_x/prob_x+prob_y
        y = 0.5 - prob_y/prob_x+prob_y
    elif s1 < s2:
        x = 0 - prob_x/prob_x+prob_y
        y = 1 - prob_y/prob_x+prob_y
    return x, y

def rencontre(x, y):
    for i in range(10000):
        prob_x, prob_y, prob_nul = probabilite(x, y)
        cote_x = cotes(prob_x)
        cote_y = cotes(prob_y)
        cote_nul = cotes(prob_nul)
        dx, dy = calcul_elo(1, 0, prob_x, prob_y, k = 100)
        x += dx
        y += dy

        print(f"La probabilité que {x} gagne est: {prob_x:.2f}")
        print(f"La probabilité que {y} gagne est: {prob_y:.2f}")
        print(f"La probabilité d'un match nul est: {prob_nul:.2f}")
        print(f"La cote pour que {x} gagne est: {cote_x:.2f}")
        print(f"La cote pour que {y} gagne est: {cote_y:.2f}")
        print(f"La cote pour un match nul est: {cote_nul:.2f}")
        print(f"Nouvelle valeur Elo pour x: {x:.2f}")
        print(f"Nouvelle valeur Elo pour y: {y:.2f}")

    return x, y

x = 1000
y = 1000
x, y = rencontre(x, y)