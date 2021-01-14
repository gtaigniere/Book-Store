<?php
if (isset($form, $datas)) {
?>
    <section id="sect-valid">

        <h1>Demande de Confirmation</h1>

        <form action="" method="POST">

            <?php foreach($datas as $name => $value) :
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
