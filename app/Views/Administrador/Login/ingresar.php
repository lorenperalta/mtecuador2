<?= $this->extend('Layout/Clientedash')?>
<?= $this->section('contenido')?>


<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in"><label hidden for="tab-1"
            class="tab">Registrarse</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Iniciar
            Sesion</label>
        <div class="login-form">
            <div class="sign-up-htm">
                <form id="account" method="post" action="<?php echo base_url('LoginController/login') ?>">
                    <div asp-validation-summary="All" class="text-danger"></div>
                    <div class="group">
                        <label class="label">Correo</label>
                        <input type="text" class="input" name="usuario"/>
                    </div>
                    <div class="group">
                        <label class="label">Contraseña</label>
                        <input type="password" class="input" name="contraseña"/>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Iniciar Sesion">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a id="forgot-password" asp-page="./ForgotPassword">Olvidaste tu contraseña?</a>
                    </div>
                    <br>
                    <div class="foot-lnk">
                        <a asp-page="./Register" asp-route-returnUrl="@Model.ReturnUrl">Registrar un nuevo usuario</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        margin: 0;
        color: #6a6f8c;
    }
    *,
    :after,
    :before {
        box-sizing: border-box
    }
    .clearfix:after,
    .clearfix:before {
        content: '';
        display: table
    }
    .clearfix:after {
        clear: both;
        display: block
    }
    a {
        color: inherit;
        text-decoration: none;
        color: #0b42b8;
    }
    .login-wrap {
        font: 600 16px/18px 'Open Sans', sans-serif;
        width: 100%;
        margin: auto;
        max-width: 525px;
        min-height: 670px;
        position: relative;
        background: url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;
        box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
    }
    .login-html {
        width: 100%;
        height: 100%;
        position: absolute;
        padding: 90px 70px 50px 70px;
        background: rgba(184, 135, 11, 0.69)
    }
    .login-html .sign-in-htm,
    .login-html .sign-up-htm {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        transform: rotateY(180deg);
        backface-visibility: hidden;
        transition: all .4s linear;
    }
    .login-html .sign-in,
    .login-html .sign-up,
    .login-form .group .check {
        display: none;
    }
    .login-html .tab,
    .login-form .group .label,
    .login-form .group .button {
        text-transform: uppercase;
    }
    .login-html .tab {
        font-size: 22px;
        margin-right: 15px;
        padding-bottom: 5px;
        margin: 0 15px 10px 0;
        display: inline-block;
        border-bottom: 2px solid transparent;
    }
    .login-html .sign-in:checked+.tab,
    .login-html .sign-up:checked+.tab {
        color: #000;
        border-color: #b8860b;
    }
    .login-form {
        min-height: 345px;
        position: relative;
        perspective: 1000px;
        transform-style: preserve-3d;
    }
    .login-form .group {
        margin-bottom: 15px;
    }
    .login-form .group .label,
    .login-form .group .input,
    .login-form .group .button {
        width: 100%;
        color: #000;
        display: block;
    }
    .login-form .group .input,
    .login-form .group .button {
        border: none;
        padding: 15px 20px;
        border-radius: 25px;
        background: rgba(255, 255, 255, 0.295);
    }
    .login-form .group input[data-type="password"] {
        text-security: circle;
        -webkit-text-security: circle;
    }
    .login-form .group .label {
        color: #000;
        font-size: 12px;
    }
    .login-form .group .button {
        background: #b8860b;
    }
    .login-form .group label .icon {
        width: 15px;
        height: 15px;
        border-radius: 2px;
        position: relative;
        display: inline-block;
        background: rgba(255, 255, 255, .1);
    }
    .login-form .group label .icon:before,
    .login-form .group label .icon:after {
        content: '';
        width: 10px;
        height: 2px;
        background: #fff;
        position: absolute;
        transition: all .2s ease-in-out 0s;
    }
    .login-form .group label .icon:before {
        left: 3px;
        width: 5px;
        bottom: 6px;
        transform: scale(0) rotate(0);
    }
    .login-form .group label .icon:after {
        top: 6px;
        right: 0;
        transform: scale(0) rotate(0);
    }
    .login-form .group .check:checked+label {
        color: #fff;
    }
    .login-form .group .check:checked+label .icon {
        background: #b8860b;
    }
    .login-form .group .check:checked+label .icon:before {
        transform: scale(1) rotate(45deg);
    }
    .login-form .group .check:checked+label .icon:after {
        transform: scale(1) rotate(-45deg);
    }
    .login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
        transform: rotate(0);
    }
    .login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
        transform: rotate(0);
    }
    .hr {
        height: 2px;
        margin: 60px 0 50px 0;
        background: rgba(255, 255, 255, .2);
    }
    .foot-lnk {
        text-align: center;
    }
    input:focus {
        outline: none !important;
        border: 1px solid;
        box-shadow: 0 0 10px;
    }
</style>


<?= $this->endSection()?>