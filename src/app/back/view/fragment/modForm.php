<?php
if (isset($form, $datas)) {
?>
    <form id="book-form">
        <div>
            <?= $form->input('bookId', '<i class="fas fa-id-badge"></i></label>', ['id' => 'input-id', 'value' => $datas['bookId'] , 'disabled' => 'disabled', 'placeholder' => 'ID']) ?>
        </div>
        <div>
            <?= $form->input('bookName', '<i class="fas fa-book"></i></label>', ['id' => 'input-name', 'value' => $datas['bookName'], 'disabled' => 'disabled', 'placeholder' => 'Nom du livre']) ?>
        </div>
        <div>
            <div class="bordure">
                <?= $form->input('bookPublisher', '<i class="fas fa-people-carry"></i></label>', ['id' => 'input-publisher', 'value' => $datas['bookPublisher'], 'disabled' => 'disabled', 'placeholder' => 'Editeur']) ?>
            </div>
            <div class="bordure">
                <?= $form->input('bookPrice', '<i class="fas fa-euro-sign"></i></label>', ['id' => 'input-price', 'value' => $datas['bookPrice'], 'disabled' => 'disabled', 'placeholder' => 'Prix']) ?>
            </div>
        </div>
    </form>
<?php
}
?>
