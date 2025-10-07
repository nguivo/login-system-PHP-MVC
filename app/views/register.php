<?php

use app\models\User;
use framework\core\Application;
use framework\core\forms\Form;
use framework\core\View;

    /**@var $this View */
    /**@var $model User */
    $this->title = $name ?? "Join Now";

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
                    <?php echo $form->fieldNoLabel($model, 'email', 'Email'); ?>
                </div>

                <div class="mb-3">
                    <?php echo $form->fieldNoLabel($model, 'dob', '')->dateField(); ?>
                </div>

                <div class="mb-3">
                    <?php echo $form->fieldNoLabel($model, 'pwd', 'Password')->passwordField(); ?>
                </div>

                <div class="form-group mb-3">
                    <div class="checkbox mb-3">
                        <label>
                            <input id="rememberMe" name="rememberMe" type="checkbox" data-original-title="" title=""> Remember me
                        </label>
                    </div>
                    <div class="">
                        <span><a href="">Forgot Password? </a></span>
                    </div>
                </div>

                <div class="mb-5">
                    <input class="btn btn-primary  btn-lg" name="login" type="submit" value="Register">
                </div>
                <?php $form::end(); ?>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</section>

