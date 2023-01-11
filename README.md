# miniproject_cinema

## Files structure
### index.php: home page showing movies
   	Navbar:
        A search bar for films.
        IF $_SESSION['idAccount']: show profile link
        ELSE: show login signup link
    Film selected -> send to film.php
    Filtre films

    IF $_SESSION['type']=='admin' -> send to admin.php

### login.php: login page
    IF isset($_SESSION['type']) -> send to index.php
    ELSE IF $_SESSION['type']=='admin'-> send to page admin.php
    ELSE IF $_SESSION['type']=='user'-> send to page index.php

### signup.php: signup page

### film.php: shows more informations about a movie.
    shows movie program.
    shows movie rating:
    hour selected -> send to order.php

### order.php: order page after hour selection, connected_condition
    choose tickets quantity
    enter order personel informations

### admin.php: page de gestion des films
    add a film -> add-film.php
    show films:
        modify -> modify-film.php
        delete -> delete-film.php

## Sessions:
    session account: $_SESSION['idAccount'] = idAccount from table accounts.
    session type: $_SESSION['type'] = type from table accounts.
    session order: $_SESSION['order'] = array(idAccount, idFilm, quantity, price)

## structure BD: WebCinema
### accounts:
    idAccount: AI
    username:
    password:
    type: user / admin
    createdDate: type:timestamp; default: timestamp
    lastModifiedDate: type:timestamp; default: timestamp

### films:
    idFilm: AI
    idGenre: (relation contrainte avec idGenre du table genre)
    poster: image du film
    title: titre du film
    date:
    description:
    inProjection: en cours de projection
    price: prix billet
    rating: note generale
    createdDate: type:timestamp; default: timestamp
    lastModifiedDate: type:timestamp; default: timestamp

### genres:
    idGenre: AI
    libelle: nom du genre
    description:
    createdDate: type:timestamp; default: timestamp
    lastModifiedDate: type:timestamp; default: timestamp

### programme:
    idProgram: AI
    idFilm: (relation contrainte avec idFilm du table films)
    date: jour de projection
    hours: les heures de projection: $heures="9:00, 12:00, 16:00"
    room: numero de la salle
    createdDate: type:timestamp; default: timestamp
    lastModifiedDate: type:timestamp; default: timestamp

### commande:
    idOrder: AI
    idAccount: RC
    idFilm: (relation contrainte avec idFilm du table films)
    quantity: nombre des buillets
    price: prix total
    createdDate: type:timestamp; default: timestamp

### infoPero:
    idPerso: AI
    idAccount: RC
    FullName: Nom et Prenom
    Email:
    BankCard:
    createdDate: type:timestamp; default: timestamp
    lastModifiedDate: type:timestamp; default: timestamp

### rating:
    idRating: AI
    idFilm: RC
    idAccount: RC
    score: echelle de 1 à 5

# Using github:
1. Starting a new local repo:

        cd [path to your work folder]
        git init # in a folder to setup a git repo in it # one time

2. configuration:

        git config user.name "[Name]" # one time
        git config user.email "[Email]" # one time

3. Working inside repo

4. commiting the changes:

        git add --all
        git commit -m "[commit description]"

5. push it to remote (github):

        git remote add origin [github/remote/repo/url].git # one time
        git push origin master # push the changes to the origin master branch
