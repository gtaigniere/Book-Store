<?php
// Fragment de validation d'un formulaire (modification, suppression)
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
<?php
}
?>
