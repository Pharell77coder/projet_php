def probabilite(x, y):
    somme = x + y
    
    prob_x = x / somme
    prob_y = y / somme
    
    prob_nul = abs(x - y)
    
    return prob_x, prob_y, prob_nul

def cotes(probabilite):
    if probabilite > 0:
        return 1 / probabilite
    else:
        return float('inf')

def calcul_elo(s1, s2, prob_x, prob_y, k=10):
    if s1 > s2:
        score_x = 1
        score_y = 0
    elif s1 == s2:
        score_x = 0.5
        score_y = 0.5
    else:
        score_x = 0
        score_y = 1

    delta_x = k * (score_x - prob_x)
    delta_y = k * (score_y - prob_y)

    return delta_x, delta_y

x = 600
y = 1200

prob_x, prob_y, prob_nul = probabilite(x, y)
cote_x = cotes(prob_x)
cote_y = cotes(prob_y)
cote_nul = cotes(prob_nul)
dx, dy = calcul_elo(1, 0, prob_x, prob_y)
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

