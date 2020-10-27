<?php
if (isset($section)) {
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Books</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<main>

    <header>
        <h1><i class="fas fa-swatchbook"></i> Book Store</h1>
    </header>

    <div id ="contenant-form">
        <form action="?target=search" method="POST">
            <div>
                <figure>
                    <i class="fas fa-id-badge"></i>
                </figure>
                <input id="input-id" type="text" name="bookId"
                       <?= isset($criteria) && array_key_exists('Id', $criteria) ?
                           'value="' . $criteria['Id'] . '"' : '' ; ?>autocomplete="off" placeholder="ID">
            </div>
            <div>
                <figure>
                    <i class="fas fa-book"></i>
                </figure>
                <input id="input-name" type="text" name="bookName"
                       <?= isset($criteria) && array_key_exists('Name', $criteria) ?
                           'value="' . $criteria['Name'] . '"' : ''; ?>autocomplete="off" placeholder="Nom du livre">
            </div>
            <div>
                <div class="bordure">
                    <figure>
                        <i class="fas fa-people-carry"></i>
                    </figure>
                    <input id="input-publisher" type="text" name="bookPublisher"
                           <?= isset($criteria) && array_key_exists('Publisher', $criteria) ?
                               'value="' . $criteria['Publisher'] . '"' : ''; ?>autocomplete="off" placeholder="Editeur">
                </div>
                <div class="bordure">
                    <figure>
                        <i class="fas fa-euro-sign"></i>
                    </figure>
                    <input id="input-price" type="text" name="bookPrice"
                           <?= isset($criteria) && array_key_exists('Price', $criteria) ?
                               'value="' . $criteria['Price'] . '"' : ''; ?>autocomplete="off" placeholder="Prix">
                </div>
            </div>
            <div>
                <button class="btn btn-success"><i class="fas fa-plus"></i></button>
                <button class="btn btn-light"><i class="fas fa-pen-alt"></i></button>
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>

    <?= $section; ?>

</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>
<?php
}
?>