<?php

use App\Back\Model\Book;

if (isset($books)) {
?>
    <section id="sect-all">
        <div>
            <table class="color_line">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Editeur</th>
                    <th>Prix</th>
                    <th>Modification</th>
                </tr>
                </thead>

                <tbody>

                <?php foreach ($books as $book) : ?>

                    <?php if ($book instanceof Book) : ?>

                            <tr>
                                <td><?= $book->getId(); ?></td>
                                <td><?= $book->getName(); ?></td>
                                <td><?= $book->getPublisher(); ?></td>
                                <td><?= $book->getPrice(); ?></td>
                                <td>
                                    <a class="btn btn-warning" href=""><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" href="?target=delete&id=<?= $book->getId(); ?>"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                    <?php endif; ?>

                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </section>
<?php
}
?>
