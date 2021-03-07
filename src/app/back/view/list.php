<?php

use App\Back\{
    Util\ErrorManager,
    Util\SuccessManager,
    Model\Book
};

if (isset($books)) {
?>
    <div id ="contenant-form">

        <?php require_once ROOT_DIR . 'back/view/fragment/searchForm.php'; ?>

    </div>

    <section id="sect-all">

        <?php
        foreach (ErrorManager::getMessages() as $message) : ?>
            <p class="alert alert-danger" role="alert">
                <?= $message ?>
            </p>
        <?php endforeach;
        ErrorManager::destroy();
        ?>
        <?php
        foreach (ErrorManager::getMessages() as $message) : ?>
            <p class="alert alert-success" role="alert">
                <?= $message ?>
            </p>
        <?php endforeach;
        SuccessManager::destroy();
        ?>

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
                                <td><?= $book->getId() ?></td>
                                <td><?= $book->getName() ?></td>
                                <td><?= $book->getPublisher() ?></td>
                                <td><?= $book->getPrice() ?></td>
                                <td>
                                    <a class="btn btn-warning" href="?target=one&id=<?= $book->getId(); ?>"><i class="fas fa-edit"></i></a>
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
