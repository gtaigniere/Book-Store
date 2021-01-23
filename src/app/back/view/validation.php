<?php
use App\Back\Util\Form;

if (isset($form) && $form instanceof Form) {
?>
    <section id="sect-valid">

        <h1>Demande de Confirmation</h1>

        <form method="POST">

            <?php foreach($form->getDatas() as $name => $value) :
                echo $form->input($name, null, ['type' => 'hidden', 'value' => $value]);
            endforeach; ?>

            <p>Etes-vous sûr ?</p>

            <button class="btn btn-success" name="validate" value="true">Confirmer</button>
            <p><a class="btn btn-secondary" href="?target=all">Annuler</a></p>

        </form>

    </section>
<?php
}
?>
