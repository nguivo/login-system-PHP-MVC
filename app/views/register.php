<?php

use app\models\User;
use framework\core\Application;
use framework\core\forms\Form;
use framework\core\View;

    /**@var $this View */
    /**@var $model User */
    $this->title = $name ?? "Join Now";

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class=""><head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($this->title)? $this->title : "Telc Admin Registration"; ?></title>
    <link rel="icon" href="https://sso.ow.telc.net/auth/resources/k6315/login/onlinewelt/img/favicon.ico">
    <link href="https://sso.ow.telc.net/auth/resources/k6315/login/onlinewelt/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://sso.ow.telc.net/auth/resources/k6315/login/onlinewelt/css/styles.css" rel="stylesheet">
    <script src="https://sso.ow.telc.net/auth/resources/k6315/login/onlinewelt/js/jquery-3.5.1.slim.min.js"></script>
    <script src="https://sso.ow.telc.net/auth/resources/k6315/login/onlinewelt/js/jquery.conditionize2.min.js"></script>
    <script src="https://sso.ow.telc.net/auth/resources/k6315/login/onlinewelt/js/popper.min.js"></script>
    <script src="https://sso.ow.telc.net/auth/resources/k6315/login/onlinewelt/js/bootstrap.min.js"></script>
    <script src="https://sso.ow.telc.net/auth/resources/k6315/login/onlinewelt/js/main.js"></script>
</head>

<body class="">

<div class="kp-form-wrapper">

    <div class="kp-form-topbar">
        <img class="kp-form-topbar-logo" alt="Telc Logo" src="https://sso.ow.telc.net/auth/resources/k6315/login/onlinewelt/img/logo.svg">

        <ul class="kp-form-topbar-locale">
            <li><a href="/auth/realms/onlinewelt/login-actions/authenticate?client_id=onlinewelt_frontend&amp;tab_id=VJtyulY2tCk&amp;client_data=eyJydSI6Imh0dHBzOi8vY29tbXVuaXR5LnRlbGMubmV0L2JpYmxpb3RoZWsvIiwicnQiOiJjb2RlIiwicm0iOiJmcmFnbWVudCIsInN0IjoiZmEzNjdmYjEtM2QwZC00OWI5LTg0ZWUtMDgzYzZkZjM2NDljIn0&amp;execution=ea6e3958-286d-4be9-ac58-8f302112ec95&amp;kc_locale=de">Deutsch</a></li>
            <li class="active"><a href="/auth/realms/onlinewelt/login-actions/authenticate?client_id=onlinewelt_frontend&amp;tab_id=VJtyulY2tCk&amp;client_data=eyJydSI6Imh0dHBzOi8vY29tbXVuaXR5LnRlbGMubmV0L2JpYmxpb3RoZWsvIiwicnQiOiJjb2RlIiwicm0iOiJmcmFnbWVudCIsInN0IjoiZmEzNjdmYjEtM2QwZC00OWI5LTg0ZWUtMDgzYzZkZjM2NDljIn0&amp;execution=ea6e3958-286d-4be9-ac58-8f302112ec95&amp;kc_locale=en">English</a></li>
        </ul>
    </div>

    <div class="kp-form-header">
        <svg aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512">
            <path fill="currentColor" d="M313.6 288c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zM416 464c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 56.5 0 102.4 45.9 102.4 102.4V464zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"></path>
        </svg>
        <h1>Register</h1>
    </div>


    <div class="kp-login-hint">
        <div class="kp-login-hint-wrapper">
            <h2>Caution!</h2>
            <p>Choose a username and password that you can remember and do not share your password with anyone</p>
        </div>
    </div>

    <div id="kc-form">
        <div id="kc-form-wrapper">
            <?php $form = Form::begin('', 'post'); ?>
                <div class="form-group">
                    <?php echo $form->field($model, 'username', 'Username'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->field($model, 'adm_pwd', 'Password')->passwordField(); ?>
                </div>

                <div class="form-group d-flex justify-content-between mb-5">
                    <div id="kc-form-options">
                        <div class="checkbox">
                            <label>
                                <input tabindex="3" id="rememberMe" name="rememberMe" type="checkbox" data-original-title="" title=""> Remember me
                            </label>
                        </div>
                    </div>
                    <div class="">
                        <span><a tabindex="5" href="">Forgot Password? Contact IT Department</a></span>
                    </div>
                </div>

                <div id="kc-form-buttons" class="form-group">
                    <input tabindex="4" class="btn btn-primary  btn-lg" name="login" id="kc-login" type="submit" value="Register">
                </div>
            <?php $form::end(); ?>
        </div>
    </div>

    <div id="kc-info">
        <div id="kc-info-wrapper" class="">
            <div id="kc-registration">
                <!--<span>New user? <a tabindex="6" href="/auth/realms/onlinewelt/login-actions/registration?client_id=onlinewelt_frontend&amp;tab_id=VJtyulY2tCk&amp;client_data=eyJydSI6Imh0dHBzOi8vY29tbXVuaXR5LnRlbGMubmV0L2JpYmxpb3RoZWsvIiwicnQiOiJjb2RlIiwicm0iOiJmcmFnbWVudCIsInN0IjoiZmEzNjdmYjEtM2QwZC00OWI5LTg0ZWUtMDgzYzZkZjM2NDljIn0">Register</a></span>-->
            </div>
        </div>
    </div>
</div>


</body>
</html>

