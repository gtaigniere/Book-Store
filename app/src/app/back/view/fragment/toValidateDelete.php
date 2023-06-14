<?php
// Fragment de validation d'un formulaire (suppression)
use App\Back\Util\Form;

if (isset($form) && $form instanceof Form) {
?>
    <div id="book-div">

        <p><span class="label"><i class="fas fa-id-badge"></i></span><span class="input"><?= $form->getValue('bookId') ?></span></p>

        <p><span class="label"><i class="fas fa-id-badge"></i></span><span class="input"><?= $form->getValue('bookName') ?></span></p>

        <div>
            <p><span class="label"><i class="fas fa-id-badge"></i></span><span class="input"><?= $form->getValue('bookPublisher') ?></span></p>
            <p><span class="label"><i class="fas fa-id-badge"></i></span><span class="input"><?= $form->getValue('bookPrice') ?></span></p>
        </div>

    </div>

    <form method="POST">

        <?php foreach($form->getDatas() as $name => $value) :
                echo $form->input($name, null, ['type' => 'hidden', 'value' => $value]);
            endforeach; ?>

        <p class="sure">Etes-vous sûr ?</p>

        <button class="btn btn-success" name="validate" value="true">Confirmer</button>
        <p><a class="btn btn-secondary" href="?target=all">Annuler</a></p>

    </form>

<?php
}
?>
