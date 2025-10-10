<?php

use framework\app\models\LoginForm;
use framework\core\forms\Form;
use framework\core\View;

/**@var $this View */
/**@var $model LoginForm */
$this->title = $name ?? "Login";


//TODO: Add CSRF token to the form
//DODO: Get user IP address and browser details for logging
?>


<section>
    <div class="container">
        <div class="page-title">
            <h1>Register for An Account</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?php $form = Form::begin('', 'post'); ?>

                <div class="mb-3">
                    <?php echo $form->fieldNoLabel($model, 'username', 'Enter username or email or phone number'); ?>
                </div>

                <div class="mb-3">
                    <?php echo $form->fieldNoLabel($model, 'pwd', 'Password')->passwordField(); ?>
                </div>

                <div class="form-group mb-3">
                    <label class="form-check-label">
                        <input id="rememberMe" name="rememberMe" type="checkbox" class="form-check-input"> Stay logged in.
                    </label>
                </div>

                <div class="mb-5">
                    <input type="submit" name="login" value="Login" class="main-btn" />
                </div>

                <?php $form::end(); ?>

                <div class="">
                    <span>Forgot Password? <a href="">Click here </a></span><br>
                    <span>Don't have account? <a href="">Sign up instead </a></span>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</section>

