<?php

use framework\app\models\RegistrationForm;
use framework\core\forms\Form;
use framework\core\View;

    /**@var $this View */
    /**@var $model RegistrationForm */
    $this->title = $name ?? "Sign Up";

    //TODO: get user's timezone using javascript
    //TODO: add captcha
?>


<section>
    <div class="container">
        <div class="page-title">
            <h1>Register for An Account</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?php $form = Form::begin('', 'post'); ?>

                <div class="row mb-3">
                    <div class="col-6">
                        <?php echo $form->fieldNoLabel($model, 'first_name', 'First name'); ?>
                    </div>
                    <div class="col-6">
                        <?php echo $form->fieldNoLabel($model, 'last_name', 'Last name'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <?php echo $form->fieldNoLabel($model, 'username', 'Username'); ?>
                </div>

                <div class="mb-3">
                    <?php echo $form->fieldNoLabel($model, 'email', 'Email')->emailField(); ?>
                </div>

                <div class="mb-3">
                    <?php echo $form->fieldNoLabel($model, 'dob', '')->dateField(); ?>
                </div>

                <div class="mb-3">
                    <?php echo $form->fieldNoLabel($model, 'pwd', 'Password')->passwordField(); ?>
                </div>

                <div class="mb-3">
                    <?php echo $form->fieldNoLabel($model, 'cpwd', 'Confirm password')->passwordField(); ?>
                </div>

                <input type="hidden" name="timezone" value="" />

                <div class="mb-3">
                    <span>By clicking on Sign Up, you have read and agreed to our <a href="">Terms and Conditions of Use</a>, <a href="">Privacy Policy</a> and <a href="">Cookies Policy</a></span>
                </div>

                <div class="mb-5">
                    <input type="submit" name="signup" value="Sign Up" class="main-btn" />
                </div>
                <?php $form::end(); ?>

                <div class="">
                    <span>Already have an account? <a href="/login">Login instead </a></span>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</section>

<script>
    document.getElementById('timezone').value = Intl.DateTimeFormat().resolvedOptions().timeZone;
</script>