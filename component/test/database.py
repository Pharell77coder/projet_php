import sqlite3

# Correct path with double backslashes
DATAPATH = 'component\\test\\database.db'

try:
    bdd = sqlite3.connect(DATAPATH)
    cur = bdd.cursor()

    #cur.execute("DROP TABLE IF EXISTS equipes")

    cur.execute('''
        CREATE TABLE IF NOT EXISTS utilisateur (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            pseudo VARCHAR(30),
            image VARCHAR(255)
        )
    ''')

    cur.execute('''
        CREATE TABLE IF NOT EXISTS matchs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            date DATE,
            domicile VARCHAR(30),
            exterieur VARCHAR(30),
            score_dom INTEGER,
            score_ext INTEGER,
            competition VARCHAR(30)
        )
    ''')

    cur.execute('''
        CREATE TABLE IF NOT EXISTS joueurs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nom VARCHAR(30),
            prenom VARCHAR(30),
            image VARCHAR(255),
            nationalité VARCHAR(30),
            club VARCHAR(30)
        )
    ''')

    cur.execute('''
        CREATE TABLE IF NOT EXISTS equipes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nom VARCHAR(30),
            image VARCHAR(255),
            federation VARCHAR(30),
            confederation VARCHAR(30)
        )
    ''')

    cur.execute("INSERT INTO utilisateur (pseudo, image) VALUES (?, ?)", ('Pharell', 'https://pbs.twimg.com/media/FREjAjXXwAASCp7.jpg:large'))

    cur.execute("INSERT INTO matchs (date, domicile, exterieur, score_dom, score_ext, competition) VALUES (?, ?, ?, ?, ?, ?)", ('2024-05-01', 'Paris-SG', 'Marseille', '4', '1', 'Ligue 1'))
    cur.execute("INSERT INTO matchs (date, domicile, exterieur, score_dom, score_ext, competition) VALUES (?, ?, ?, ?, ?, ?)", ('2024-05-01', 'Lyon', 'Lille', '3', '3', 'Ligue 1'))
    cur.execute("INSERT INTO matchs (date, domicile, exterieur, score_dom, score_ext, competition) VALUES (?, ?, ?, ?, ?, ?)", ('2024-05-08', 'Lille', 'Paris-SG', '2', '4', 'Ligue 1'))
    cur.execute("INSERT INTO matchs (date, domicile, exterieur, score_dom, score_ext, competition) VALUES (?, ?, ?, ?, ?, ?)", ('2024-05-08', 'Marseille', 'Lyon', '1', '2', 'Ligue 1'))
    cur.execute("INSERT INTO matchs (date, domicile, exterieur, score_dom, score_ext, competition) VALUES (?, ?, ?, ?, ?, ?)", ('2024-05-15', 'Paris-SG', 'Lyon', '3', '2', 'Ligue 1'))
    cur.execute("INSERT INTO matchs (date, domicile, exterieur, score_dom, score_ext, competition) VALUES (?, ?, ?, ?, ?, ?)", ('2024-05-15', 'Marseille', 'Lille', '1', '3', 'Ligue 1'))

    cur.execute("INSERT INTO joueurs (prenom, nom, image, nationalité, club) VALUES (?, ?, ?, ?, ?)", ('Killian', 'Mbappe', 'https://img.olympics.com/images/image/private/t_1-1_300/f_auto/primary/ron2ny1sxmnrrqlxgnak', 'Français', 'Real Madrid'))
    cur.execute("INSERT INTO joueurs (prenom, nom, image, nationalité, club) VALUES (?, ?, ?, ?, ?)", ('Erling', 'Haaland', 'https://img.a.transfermarkt.technology/portrait/big/418560-1709108116.png?lm=1', 'Norvégien', 'Manchester United'))
    cur.execute("INSERT INTO joueurs (prenom, nom, image, nationalité, club) VALUES (?, ?, ?, ?, ?)", ('Cristiano', 'Ronaldo', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Cristiano_Ronaldo_playing_for_Al_Nassr_FC_against_Persepolis%2C_September_2023_%28cropped%29.jpg/800px-Cristiano_Ronaldo_playing_for_Al_Nassr_FC_against_Persepolis%2C_September_2023_%28cropped%29.jpg', 'Portugais', 'Al-nasser'))
    cur.execute("INSERT INTO joueurs (prenom, nom, image, nationalité, club) VALUES (?, ?, ?, ?, ?)", ('Lionnel', 'Messi', 'https://www.fifpro.org/media/fhmfhvkx/messi-world-cup.jpg?rxy=0.48356841796117644,0.31512414378031967&width=1600&height=1024&rnd=133210253587130000', 'Argentin', 'Inter Miami CF'))
    cur.execute("INSERT INTO joueurs (prenom, nom, image, nationalité, club) VALUES (?, ?, ?, ?, ?)", ('Harry', 'Kane', 'https://static.independent.co.uk/2024/06/12/12/newFile.jpg', 'Anglais', 'Bayern Munich'))

    teams = [
        ["Paris-SG", "https://ssl.gstatic.com/onebox/media/sports/logos/mcpMspef1hwHwi9qrfp4YQ_48x48.png", "FFF", "UEFA"],
        ["Monaco", "https://ssl.gstatic.com/onebox/media/sports/logos/RX0XTi5Dtg4joMtuHNmYKg_48x48.png", "FFF", "UEFA"],
        ["Brest", "https://ssl.gstatic.com/onebox/media/sports/logos/HNqZwlu71GHXo60XjYrPxg_48x48.png", "FFF", "UEFA"],
        ["Lille", "https://ssl.gstatic.com/onebox/media/sports/logos/D2AQe8qoyPIP4K8MzLvwuA_48x48.png", "FFF", "UEFA"],
        ["Nice", "https://ssl.gstatic.com/onebox/media/sports/logos/Llrxrqsc3Tw4JzE6xM7GWw_48x48.png", "FFF", "UEFA"],
        ["Lyon", "https://ssl.gstatic.com/onebox/media/sports/logos/SrKK55dUkCxe4mJsyshfCg_48x48.png", "FFF", "UEFA"],
        ["Lens", "https://ssl.gstatic.com/onebox/media/sports/logos/TUvwItKazVFpgThEhhlN1Q_48x48.png", "FFF", "UEFA"],
        ["Marseille", "https://ssl.gstatic.com/onebox/media/sports/logos/KfBX1kHNj26r9NxpqNaTkA_48x48.png", "FFF", "UEFA"],
        ["Reims", "https://ssl.gstatic.com/onebox/media/sports/logos/NWzvJ-A3j8HQkeQZ0sJP1w_48x48.png", "FFF", "UEFA"],
        ["Rennes", "https://ssl.gstatic.com/onebox/media/sports/logos/guI8eg4hoTyIp6rO1opjxA_48x48.png", "FFF", "UEFA"],
        ["Toulouse", "https://ssl.gstatic.com/onebox/media/sports/logos/DrzFcMWJgtG1nDSdfN0dBA_48x48.png", "FFF", "UEFA"],
        ["Montpelier", "https://ssl.gstatic.com/onebox/media/sports/logos/fL5Nk_2eUanYiOSB9AnBpQ_48x48.png", "FFF", "UEFA"],
        ["Strasbourg", "https://ssl.gstatic.com/onebox/media/sports/logos/Eb9xtMpUy8FXQ0RCKvLxcg_48x48.png", "FFF", "UEFA"],
        ["Nantes", "https://ssl.gstatic.com/onebox/media/sports/logos/r3qizrAtoAXPICgYjFYCyA_48x48.png", "FFF", "UEFA"],
        ["Le Havre", "https://ssl.gstatic.com/onebox/media/sports/logos/BRitaBE1_mjMJguk6xzTRw_48x48.png", "FFF", "UEFA"],
        ["Metz", "https://ssl.gstatic.com/onebox/media/sports/logos/b7iBf-aijuqQaScGSpDV7A_48x48.png", "FFF", "UEFA"],
        ["Lorient", "https://ssl.gstatic.com/onebox/media/sports/logos/bbYkAWWtD6lpK5KyGfr1vA_48x48.png", "FFF", "UEFA"],
        ["Clermont", "https://ssl.gstatic.com/onebox/media/sports/logos/0aur9jOW37pq6dUzu61wWQ_48x48.png", "FFF", "UEFA"]
    ]

    for team in teams:
        cur.execute("INSERT INTO equipes (nom, image, federation, confederation) VALUES (?, ?, ?, ?)", team)

    cur.execute("SELECT * FROM utilisateur")
    resultat = cur.fetchall()
    print(resultat)

    cur.execute("SELECT * FROM matchs")
    resultat = cur.fetchall()
    print(resultat)

    cur.execute("SELECT * FROM joueurs")
    resultat = cur.fetchall()
    print(resultat)

    cur.execute("SELECT * FROM equipes")
    resultat = cur.fetchall()
    print(resultat)

    bdd.commit()

except sqlite3.Error as e:
    print(f"An error occurred: {e}")

finally:
    if bdd:
        bdd.close()
