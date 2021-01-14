<?php
if (isset($form, $datas)) {
?>
    <div id="book-div">

        <p><span class="label"><i class="fas fa-id-badge"></i></span><span class="input"><?= $datas['bookId'] ?></span></p>

        <p><span class="label"><i class="fas fa-id-badge"></i></span><span class="input"><?= $datas['bookName'] ?></span></p>

        <div>
            <p><span class="label"><i class="fas fa-id-badge"></i></span><span class="input"><?= $datas['bookPublisher'] ?></span></p>
            <p><span class="label"><i class="fas fa-id-badge"></i></span><span class="input"><?= $datas['bookPrice'] ?></span></p>
        </div>

    </div>
<?php
}
?>
