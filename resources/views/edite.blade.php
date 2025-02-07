



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

<div class=" container ">
    <div class="w-70">


        <h3>Page de modification</h3>
        <form action="/update" method="post">
            @csrf
            @method("PUT")
            <input type="hidden" name="idold" value="{{$p[0]}}">
            <div class="mb-3">
                <label  class="form-label">Prenom</label>
                <input type="text" class="form-control" name="prenom" value="{{$p[1]}}">
            </div>
            <div class="mb-3">
                <label  class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" value="{{$p[2]}}">
            </div>
            <div class="mb-3">
                <label  class="form-label">Telephone</label>
                <input type="text" class="form-control" name="telephone" value="{{$p[3]}}" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="datenaisse" value="{{$p[4]}}">
            </div>

            <button type="reset" class="btn btn-default">annuler</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
