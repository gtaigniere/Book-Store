<?php
use App\Back\Util\Form;

if (isset($form) && $form instanceof Form) {
?>

    <section id="sect-valid">

        <h1>Demande de Confirmation</h1>

            <?php if ($_GET['target'] == 'delete') : ?>

                <?php require_once ROOT_DIR . 'back/view/fragment/toValidateDelete.php'; ?>

            <?php else : ?>

                <?php require_once ROOT_DIR . 'back/view/fragment/toValidateAddOrModify.php'; ?>

            <?php endif; ?>

    </section>
<?php
}
?>
