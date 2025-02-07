



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GPersonne</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gpersonne</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Liste</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ajout">Ajout</a>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="container">
<h3>Liste des personnes</h3>


<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Prenom</th>
        <th scope="col">Nom</th>
        <th scope="col">Telephone</th>
        <th scope="col">date Naissance</th>
        <th scope="col">Age</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($personnes as $t)
    <tr>
        <th scope="row">{{$t->id}}</th>
        <td>{{$t->prenom}}</td>
        <td>{{$t->nom}}</td>
        <td>{{$t->telephone}}</td>
        <td>{{$t->age}}</td>
        <td>{{$t->datenaiss}}</td>
        <td>
            <a href="/edit/{{$t->id}}" class="btn btn-primary">edit</a>
            <a href="/supprimer/{{$t->id}}" class="btn btn-danger">supprimer</a>
        </td>
    </tr>
    @endforeach


    </tbody>
</table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
