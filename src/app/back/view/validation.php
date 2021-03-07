<?php
use App\Back\Util\Form;

if (isset($form) && $form instanceof Form) {
?>

    <section id="sect-valid">

        <h1>Demande de Confirmation</h1>

        <?php
        require_once $_GET['target'] == 'delete' ? ROOT_DIR . 'back/view/fragment/toValidateDelete.php' : ROOT_DIR . 'back/view/fragment/toValidateAddOrModify.php';
        ?>

    </section>
<?php
}
?>
