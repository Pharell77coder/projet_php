import sqlite3

DATAPATH = 'component/db/data.db'

def create_user():
    conn = sqlite3.connect(DATAPATH)

    cursor = conn.cursor()

    cursor.execute('''
        CREATE TABLE IF NOT EXISTS utilisateur (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            pseudo VARCHAR(30),
            email VARCHAR(30),
            mdp VARCHAR(30),
            image VARCHAR(255)
        )
    ''')

    conn.commit()
    conn.close()

def reset_user():
    conn = sqlite3.connect(DATAPATH)
    cursor = conn.cursor()
    cursor.execute('DROP TABLE IF EXISTS utilisateur')
    conn.commit()
    conn.close()

def add_user(pseudo, email, mdp, image):
    conn = sqlite3.connect(DATAPATH)
    cursor = conn.cursor()
    cursor.execute('INSERT INTO utilisateur (pseudo, email, mdp, image) VALUES (?, ?, ?, ?)', (pseudo, email, mdp, image))
    conn.commit()
    conn.close()

def update_user(pseudo, email, mdp, image):
    conn = sqlite3.connect(DATAPATH)
    cursor = conn.cursor()

    cursor.execute('''
        UPDATE utilisateur
        SET pseudo = ?,
            mdp = ?,
            image = ?
        WHERE email = ?;
    ''', (pseudo, mdp, image, email))

    conn.commit()
    conn.close()


full = True
if full:
    reset_user()
    create_user()
    add_user("Administrateur", "administrateur@gmail.com", "12345678", "https://www.dailypioneer.com/uploads/2018/story/images/big/the-cosmic-man-2018-11-11.jpg")
    add_user("Pharell", "pharell@gmail.com", "mot de passe", "data:image/jpeg;base64,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")
    add_user("Zelda", "zelda@gmail.com", "linktotk", "https://wallpapers-clan.com/wp-content/uploads/2023/11/zelda-link-sword-aesthetic-desktop-wallpaper-preview.jpg")
    add_user("Joker", "joker@gmail.com", "corason", "https://3690702807-files.gitbook.io/~/files/v0/b/gitbook-x-prod.appspot.com/o/spaces%2FQ1mssvSs3nQmEFzPssng%2Fuploads%2FQpMY7eYBx2h2t16GVKeh%2Fdoflamingo.gif?alt=media&token=af465479-e2b2-42d0-aff5-fc9106ec9d65")
    add_user("Madara", "madara@hotmail.com", "madamada", "https://s3.innout.pe/luma-public/product_images/production/21f14866-ee06-4650-9c75-fc415c8ab9a4.webp")
    add_user("Ichigo", "ichigo@outlook.com", "soul_society_13", "https://images-ng.pixai.art/images/thumb/1440cd7c-9930-4a27-bd8c-29403f1c9a1d")
    add_user("Malenia", "malenia@gmail.com", "melimeli", "https://images-ng.pixai.art/images/orig/1b31b693-44dc-4ecd-966c-0acb4dfd23ba")
    add_user("Red", "red@gmail.com", "dracaufeu", "https://images-ng.pixai.art/images/orig/4f719047-f365-41a7-8192-c381771a5ca5")
    add_user("Goku", "goku@gmail.com", "vegeta", "https://images-ext-1.discordapp.net/external/1U8nXhDHzZQZk0rRYLcfRdlpd2vzY2WujSC-SlGYPLc/https/images-ng.pixai.art/images/orig/ffc268fa-82ff-4b0a-b2ad-604c3fab436b?format=webp&width=440&height=662")
    update_user("administrateur", "administrateur@gmail.com", "modifie", "https://wallpapers-clan.com/wp-content/uploads/2023/11/zelda-link-sword-aesthetic-desktop-wallpaper-preview.jpg")

pseudo =  "test"
email = "test"
mdp = "test"
image = "test"
if pseudo != "test": 
    add_user(pseudo, email, mdp, image)