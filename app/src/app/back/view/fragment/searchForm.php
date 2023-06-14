<?php
// Formulaire par défaut (ajout, modification, recherche)
use App\Back\Util\Form;

if (isset($form) && $form instanceof Form) {
?>
    <form>
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
        <div>
            <button id="add-button" class="btn btn-success" formaction="?target=add" formmethod="POST"><i class="fas fa-plus"></i></button>
            <button id="modify-button" class="btn btn-light" formaction="?target=modify" formmethod="POST"><i class="fas fa-pen-alt"></i></button>
            <button id="search-button" class="btn btn-primary"  formmethod="GET" name="target" value="search"><i class="fas fa-search"></i></button>
        </div>
    </form>
<?php
}
?>
