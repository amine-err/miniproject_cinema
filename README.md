# miniproject_cinema

## Files structure

### index.php: home page showing movies
   	IF $_SESSION['account']['type']=='admin' -> admin.php
    Navbar:
        IF $_SESSION['idAccount']:
            link: profile
        ELSE: link: login, link: signup
    Body: List of films:
        Film selected -> film.php
        input: A search bar for films.
        input: Filtre films

### film.php: shows more informations about a movie.
    IF $_SESSION['account']['type']!='user' -> send to index.php
    Navbar: index navbar
    Body: get data from POST index.php
        shows movie program.
        shows movie rating.
        show form:
            input: hours
            input: quantity
            button: save to shopcart: create session order
            button: confirm -> order.php

### login.php: login page
    IF isset($_SESSION['type']) -> send to index.php
    Body: login form
        input: username
        input: password
        submit: check DB
            create session type, session idAccount
            IF $_SESSION['account']['type']=='admin'-> admin.php
            ELSE IF $_SESSION['account']['type']=='user'-> index.php

### signup.php: signup page
    IF isset($_SESSION['account']) -> send to index.php
    Body: signup form
        input: username
        input: password
        submit: save to DB

### profile.php: profile page for an user account
    IF $_SESSION['account']['type']!='user' -> send to index.php
    Navbar: index navbar
    Body:
        section shopcart: show session orders
            input: change hour
            input: change quantity
            button: confirm: -> order.php
        section orders: show database orders

### order.php: order page after hour selection, connected_condition
    show session order
    show total price
    form:
        input: personel informations
        button: confirm order:
            save infos to DB infos
            save order to DB order

### admin.php: page de gestion des films
    menu link manage films:
        menu link add a film -> add-film.php
        show films with link for:
            modify -> modify-film.php
            delete: delete a film
    menu link manage genre:
        menu link add genre -> add-genre.php
        show genres with link for:
            modify -> modify-genre.php
            delete: delete a genre

## Sessions:
    session account: $_SESSION['account']['id'] = idAccount from table accounts.
    session type: $_SESSION['account']['type'] = type from table accounts.
    
    session order: $_SESSION['order'][idFilm] = array(quantity, hour, price)

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

### programs:
    idProgram: AI
    idFilm: (relation contrainte avec idFilm du table films)
    date: jour de projection
    hours: les heures de projection: format="09:00,12:00,16:00"
    room: numero de la salle
    createdDate: type:timestamp; default: timestamp
    lastModifiedDate: type:timestamp; default: timestamp

### orders:
    idOrder: AI
    idAccount: RC
    idFilm: (relation contrainte avec idFilm du table films)
    hour: hour choosed, format="13:34"
    quantity: nombre des buillets
    price: prix total
    createdDate: type:timestamp; default: timestamp

### infos:
    idInfo: AI
    idAccount: RC
    fullname: Nom Prenom
    email:
    bankcard:
    createdDate: type:timestamp; default: timestamp
    lastModifiedDate: type:timestamp; default: timestamp

### rating:
    idRating: AI
    idFilm: RC
    idAccount: RC
    score: echelle de 1 à 5
    createdDate: type:timestamp; default: timestamp
    lastModifiedDate: type:timestamp; default: timestamp

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
