<?php

use App\Back\Model\Book;

if (isset($book)) {
    ?>
    <section id="sect-one">
        <div>

            <h1><?= $book->getId(); ?></h1)>

            <p><?= $book->getNom(); ?></p>
            <p><?= $book->getEditeur(); ?></p>
            <p><?= $book->getPrice(); ?></p>

            <p>
                <a class="btn btn-warning" href=""><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
            </p>

        </div>
    </section>
    <?php
}
?>
