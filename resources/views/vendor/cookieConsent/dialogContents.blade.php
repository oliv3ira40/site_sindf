{{-- <div>
    <h5>Controle sua privacidade</h5>
    <p>Nosso site usa cookies para melhorar a navegação.</p>
    <a href="">Política de privacidade</a>

    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div> --}}


<style>
    .js-cookie-consent {
        opacity: 80%;
        position: fixed;
        width: 100%;
        z-index: 999999999;
        color: white;
        padding: 10px 0;
        bottom: 0;
        text-align: center;
        /* background-color: #1ab892; */
        background-color: black;
        padding: 10px 10px;
    }
    .js-cookie-consent a {
        color: white;
        font-weight: bold;
    }
    .js-cookie-consent a:hover {
        color: white;
    }
    .js-cookie-consent button {
        border: none;
        color: #fff;
        /* background: #74d1c6; */
        background: #1ab892;
        outline: none;
        cursor: pointer;
        display: inline-block;
        text-decoration: none;
        padding: 10px 20px;
        color: #fff;
        font-weight: 600;
        text-align: center;
        line-height: 1;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        font-size: 14px;
        font-size: 0.875rem;
        margin-left: 15px;
        /* border-radius: 30px; */
        font-weight: normal;
    }
    .js-cookie-consent button:hover {
        background-color: #fff;
        color: #2d8aac;
    }

    @media (min-width: 320px) and (max-width: 767px) {
        .js-cookie-consent {
            text-align: justify !important;
        }
        .js-cookie-consent button {
            margin: 10px 0 0 0;
            width: 100%;
        }
    }
    @media (min-width: 768px) and (max-width: 1439px) {
        .js-cookie-consent {
            text-align: left !important;
        }
        .js-cookie-consent button {
            margin: 10px 0 0 0;
            width: 100%;
        }
    }
</style>

<div class="js-cookie-consent">
    <span class="cookie-consent__message" style="font-size: 12px;">
        Usamos cookies para melhorar a navegação e oferecer uma experiência mais agradável na utilização do nosso site. Ao continuar, você concorda com a nossa <a target="_blank" href="{{ asset('pages/lgpd/POLITICA_DE_PRIVACIDADE_BENEFICIARIO.pdf') }}">Política de Privacidade</a>.
    </span>

    <button class="js-cookie-consent-agree cookie-consent__agree">
        Aceitar
    </button>
</div>