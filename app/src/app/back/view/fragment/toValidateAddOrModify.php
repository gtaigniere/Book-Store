<?php
// Fragment de validation d'un formulaire (ajout, modification)
use App\Back\Util\Form;

if (isset($form) && $form instanceof Form) {
?>
    <form method="POST">

        <div>
            <?= $form->input('bookId', '<i class="fas fa-id-badge"></i></label>', ['id' => 'input-id', 'placeholder' => 'ID']) ?>
        </div>
        <div>
            <?= $form->input('bookName', '<i class="fas fa-book"></i></label>', ['id' => 'input-name', 'placeholder' => 'Nom du livre']) ?>
        </div>
        <div>
            <div class="bordure">
                <?= $form->input('bookPublisher', '<i class="fas fa-people-carry"></i></label>', ['id' => 'input-publisher', 'placeholder' => 'Editeur']) ?>
            </div>
            <div class="bordure">
                <?= $form->input('bookPrice', '<i class="fas fa-euro-sign"></i></label>', ['id' => 'input-price', 'placeholder' => 'Prix']) ?>
            </div>
        </div>

        <p class="sure">Etes-vous sûr ?</p>

        <button class="btn btn-success" name="validate" value="true">Confirmer</button>
        <p><a class="btn btn-secondary" href="?target=all">Annuler</a></p>

    </form>

<?php
}
?>
