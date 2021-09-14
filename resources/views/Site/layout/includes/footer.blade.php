<footer>
    <div class="container margin_30_30 p-b-10">
        <div class="row">
            {{-- <div class="col-md-12">
                <p>
                    <a href="{{ route('site.index') }}" title="Findoctor">
                        <img src="#" alt="" width="163" height="36" class="img-fluid">
                    </a>
                </p>
            </div> --}}
            <div class="col-md-4">
                <h5>
                    O SINDFAZENDA
                </h5>
                <hr>
                <p class="p-t-10 m-b-10">
                    O SINDFAZENDA foi criado em 31 de março de 2005, com o objetivo de lutar pela valorização dos servidores administrativos e auxiliares,
                    lotados e em exercício na Receita Federal do Brasil – RFB, com seu crescimento e consolidação surgiu a necessidade de alteração estatutária,
                    passando a defender todos os servidores lotados e em exercício no Ministério da Fazenda,
                    especificamente integrantes do Plano Especial de Cargos do Ministério da Fazenda – PECFAZ.
                </p>
                
            

                
            </div>
            <div class="col-md-4">
                <h5>
                    LOCALIZAÇÃO
                </h5>
                <hr>
                <p class="p-t-10 m-b-10">
                   <strong> ENDEREÇO</strong> <br><br>
                    
                    SCS Qd 01 Bloco K - Sala 904
                    Ed. Denasa Asa Sul -  Brasília/DF | 
                    CEP 70398-900
                </p><hr>
                <p class="m-b-10">
                  <strong>  HORÁRIO DE FUNCIONAMENTO</strong> <br><br>
                    (Durante a Pandemia)<br>
                    
                    Segunda a sexta
                    Das 09h30 às 16h
                </p> 
            </div>

            <div class="col-md-4">
                <h5>
                    CONTATOS
                </h5>
                <hr>             
                <p class="p-t-10 m-b-10">
                   <strong> TELEFONES</strong> <BR><br>
                    
                    <a href="tel:6139630898" target="_blank">
                     +55 (61) 3963-0898
                        <br>
                    </a>
                    <a href="tel:6199917-2315" target="_blank">
                    +55 (61) 9 9917-2315 (CLARO)
                        
                    </a><HR></p>
                   <p class="p-t-10 m-b-10">
                        <strong>E-MAILS</strong><br>
                    <a href="mailto:sindfazenda@sindfazenda.org.br" target="_blank">
                    <br>	sindfazenda@sindfazenda.org.br
                   </a>
                    <a href="mailto:juridico@sindfazenda.org.br" target="_blank">
                    <br>juridico@sindfazenda.org.br
                    </a></p>
                
            </div>
        </div>

        <hr class="m-t-10 m-b-10">
        <div class="row">
            <div class="col-md-6">
                <ul class="display-inline-flex mb-0">
                    <li style="padding-top: 15px;" class="p-r-10 li_social_icons">
                        <a href="https://www.instagram.com/sindafazenda.org.br">
                            <i class="social-icons-footer fa fa-instagram"></i>
                        </a>
                    </li>
                    <li style="padding-top: 15px;" class="p-r-10 li_social_icons">
                        <a href="https://www.facebook.com/Sindfazenda-435783149843883/">
                            <i class="social-icons-footer fa fa-facebook-official"></i>
                        </a>
                    </li>
                    <li style="padding-top: 15px;" class="p-r-10 li_social_icons">
                        <a href="https://www.youtube.com/user/SINDSARF1">
                            <i class="social-icons-footer fa fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="float-right" id="copy">
                    <strong>
                        @if (HelpApplicationSetting::getAppCopyright())    
                            {!! HelpApplicationSetting::getAppCopyright()->copyright !!}
                        @else
                            © ??
                        @endif
                    </strong>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->
</div>
<!-- page -->



<div id="toTop"></div>
<!-- Back to top button -->

<!-- COMMON SCRIPTS -->
<script src="{{ asset('site/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('site/js/common_scripts.min.js') }}"></script>
<script src="{{ asset('site/js/functions.js') }}"></script>

<!-- REVOLUTION SLIDER SCRIPTS -->
<script type="text/javascript" src="{{ asset('site/rev-slider-files/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/rev-slider-files/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/rev-slider-files/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/rev-slider-files/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/rev-slider-files/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/rev-slider-files/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/rev-slider-files/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/rev-slider-files/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/rev-slider-files/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/rev-slider-files/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/rev-slider-files/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript">
    var tpj=jQuery;
    var revapi72;
    tpj(document).ready(function() {
        if (tpj("#rev_slider_72_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_72_1");
        } else {
            revapi72 = tpj("#rev_slider_72_1").show().revolution({
                sliderType:"standard",
                jsFileLocation:"rev-slider-files/js/",
                sliderLayout:"auto",
                dottedOverlay:"none",
                delay:8000,
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                     mouseScrollReverse:"default",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        touchOnDesktop:"off",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style:"gyges",
                        enable:true,
                        hide_onmobile:true,
                        hide_under:560,
                        hide_onleave:true,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        tmp:'',
                        left: {
                            h_align:"left",
                            v_align:"center",
                            h_offset:1,
                            v_offset:-70
                        },
                        right: {
                            h_align:"right",
                            v_align:"center",
                            h_offset:1,
                            v_offset:-70
                        }
                    }
                },
                visibilityLevels:[1240,1024,778,480],
                gridwidth:1920,
                gridheight:600,
                lazyType:"none",
                shadow:0,
                spinner:"spinner0",
                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,
                shuffle:"off",
                autoHeight:"off",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            });
        }
    });	/*ready*/
</script>

<!-- SPECIFIC SCRIPTS -->
{{-- <script src="{{ asset('site/assets/validate.js') }}"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="{{ asset('site/js/mapmarker.jquery.js') }}"></script>
<script src="{{ asset('site/js/mapmarker_contacts_func.js') }}"></script> --}}

<!-- PLUGINS -->
<script type="text/javascript" src="{{ asset('plugins/jquery-mask/dist/jquery.mask.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('plugins/html2canvas/dist/html2canvas.min.js') }}"></script>
<!-- PLUGINS -->

{{-- MY JAVASCRIPT --}}
<script type="text/javascript" src="{{ asset('js/utilities/masks.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/wallet/digital_wallet.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/search.js') }}"></script>

<script src="{{ asset('js/site/evaluations/question_required_reading.js') }}"></script>
{{-- MY JAVASCRIPT --}}

{{-- Recaptcha --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
{{-- Recaptcha --}}

</body>

</html>