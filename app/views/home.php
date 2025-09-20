<?php
use framework\core\Application;
use framework\core\forms\Form;

require_once "home-header.php";

?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>
    input[type="text"], input[type="date"] {
        border: 1px solid #999;
        padding: 7px 10px;
        width: 100%;
    }

    p {
        line-height: 3;
    }
</style>


        <div>
            <div class="container">
                <div class="c-certificatesearch">
                    <div class="c-certificatesearch__content">
                        <h1 class="c-certificatesearch__title"> Verifikation von telc Zertifikaten </h1>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Verifizieren Sie die Ergebnisse eines telc Zertifikats durch die Eingabe von Geburtsdatum, Teilnehmernummer und Datum der Ausstellung.

                                    Bitte beachten Sie, dass alle Prüfungen mit einem Ausstellungsdatum ab 01.10.2021 auf dieser Seite verifiziert werden können.

                                    Ausnahme DTZ (Deutsch-Test für Zuwanderer): Dieser kann nur für die Zeit vom 01.10.2021 bis 31.12.2022 verifiziert werden.</p>
                            </div>
                        </div>
                    </div>

                    <?php $form = Form::begin('', 'post'); ?>
                        <div class="container pa-0 container--fluid">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <?php echo $form->fieldNoLabel($model, 'cert_participants_no', 'Teilnehmernummer'); ?>
                                    
                                    <!--<div class="v-input v-input--dense theme--light v-text-field v-text-field--is-booted v-text-field--enclosed v-text-field--outlined">
                                        <div class="v-input__control">
                                            <div class="v-input__slot"><fieldset aria-hidden="true"><legend style="width: 0px;"><span class="notranslate">​</span></legend></fieldset>
                                                <div class="v-text-field__slot">
                                                    <label for="input-13" class="v-label theme--light" style="left: 0px; right: auto; position: absolute;"> </label>


                                                </div>
                                            </div>
                                            <div class="v-text-field__details">
                                                <div class="v-messages theme--light">
                                                    <div class="v-messages__wrapper">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="col-md-4 col-12">
                                    <input type="text" name="usr_dob" placeholder="Geburtsdatum" value="<?php echo $model->usr_dob ?? ''; ?>" class="date" required>

                                    <!--<div class="v-input v-input--dense theme--light v-text-field v-text-field--is-booted v-text-field--enclosed v-text-field--outlined">
                                        <div class="v-input__control">
                                            <div class="v-input__slot">
                                                <fieldset aria-hidden="true">
                                                    <legend style="width: 0px;">
                                                        <span class="notranslate">​</span>
                                                    </legend>
                                                </fieldset>
                                                <div class="v-text-field__slot">
                                                    <label for="input-17" class="v-label theme--light" style="left: 0px; right: auto; position: absolute;">

                                                    </label>


                                                </div>
                                            </div>
                                            <div class="v-text-field__details">
                                                <div class="v-messages theme--light">
                                                    <div class="v-messages__wrapper"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="v-menu"><!----></div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <input id="cert_issue_date" type="text" name="cert_issue_date" value="<?php echo $model->cert_issue_date ?? ''; ?>" placeholder="Datum der Ausstellung" class="date" required>

                                    <!--<div class="v-input v-input--dense theme--light v-text-field v-text-field--is-booted v-text-field--enclosed v-text-field--outlined">
                                        <div class="v-input__control">
                                            <div class="v-input__slot">
                                                <fieldset aria-hidden="true">
                                                    <legend style="width: 0px;"><span class="notranslate">​</span>
                                                    </legend>
                                                </fieldset>
                                                <div class="v-text-field__slot">
                                                    <label for="input-21" class="v-label theme--light" style="left: 0px; right: auto; position: absolute;">

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="v-text-field__details">
                                                <div class="v-messages theme--light">
                                                    <div class="v-messages__wrapper"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="v-menu"><!---->
                                    </div>
                                </div>
                            </div>
                            <br>

                            <button type="button" class="c-button" dense="">
                                <span aria-hidden="true" class="v-icon notranslate c-button__icon theme--light primary--text">
                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-magnifying-glass v-icon__component theme--light primary--text"><path fill="currentColor" d="M504.1 471l-134-134C399.1 301.5 415.1 256.8 415.1 208c0-114.9-93.13-208-208-208S-.0002 93.13-.0002 208S93.12 416 207.1 416c48.79 0 93.55-16.91 129-45.04l134 134C475.7 509.7 481.9 512 488 512s12.28-2.344 16.97-7.031C514.3 495.6 514.3 480.4 504.1 471zM48 208c0-88.22 71.78-160 160-160s160 71.78 160 160s-71.78 160-160 160S48 296.2 48 208z" class=""></path></svg>
                                </span>
                                <input type="submit" class="c-button__content" value="Zertifikat suchen" style="max-resolution: 0;">
                            </button>
                        </div>
                    </form>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <!----><!----><!----><!----><!---->

                                <?php if(Application::$app->session->getFlash('success')): ?>
                                    <div class="">
                                        <?php echo Application::$app->session->getFlash('success'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(Application::$app->session->getFlash('failed')): ?>
                                    <div class="">
                                        <?php echo Application::$app->session->getFlash('failed'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
        
        

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


<script>
    /*$(document).ready(function() {
        $(".date").datepicker({
            dateFormat: "dd.mm.yy"
        });
    });*/
</script>



<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr(".date", {
            dateFormat: "d.m.Y" // Sets the format to dd.mm.yyyy
        });
    });
</script>

<?php require_once "home-footer.php"; ?>
