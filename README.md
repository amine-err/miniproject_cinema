# miniproject_cinema

## Using github:
    cd C:/Users/pc/Desktop/miniproject_cinema
### First configuration:
    git init
    git config user.name "[Name]"
    git config user.email "[Email]"
    git remote add origin [github/remote/repo/url].git

### To get files from github:
    git pull origin [branch name]

## To put files in github:
git branch [branch]
git add -A
git commit -m "comment"
git push origin [branch]



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
    IF $_SESSION['account']['type']!='admin' -> send to admin.php
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
    IF isset($_SESSION['account']) -> send to index.php
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
    IF $_SESSION['account']['type']!='user':
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

## Sessions:
    $_SESSION['account']['id'] = idAccount from table accounts.
    $_SESSION['account']['type'] = type from table accounts.
    $_SESSION['order'][] = array("idFilm"=>val, "quantity"=>val, "hour"=val, "price"=>val)

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
    poster: image du film
    title: titre du film
    year:
    duration:
    genre:
    rating: note generale
    description:
    director:
    inProjection: en cours de projection
    price: prix billet
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
    price: prix
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
