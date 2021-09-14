        <footer>
            <div class="container margin_30_30 p-b-10">
                <div class="row">
                    <div class="col-md-4">
						<h5>
							CONTATOS
						</h5>
						
						<div class="p-b-10">
							<a href="tel:6131810010" target="_blank">
								<strong>
									<br>??
								</strong>
							</a>
						</div>
					

						<p class="p-t-10 m-b-10">
							??
						</p>
                    </div>
                    <div class="col-md-4">
                        <h5>
							LINKS ÚTEIS
						</h5>

                        <ul class="links">
                            <li>
								<a href="##">
									??
								</a>
							</li>
						</ul>
						
						<a class="display-block p-b-10" href="#">
							<strong>
								??
							</strong>
						</a>
                    </div>
                    <div class="col-md-4">
                        <h5>
							??
						</h5>
						<a class="display-block p-b-10" href="#">
							<strong>
								??
							</strong>
						</a>
						<a class="display-block p-b-10" href="#">
							<strong>
								??
							</strong>
						</a>
					</div>
				</div>

                <hr class="m-t-10 m-b-10">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="display-inline-flex mb-0">
                            <li class="p-r-10 li_ans_branca">
								<a href="##">
									??
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

	
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5f7e122d4704467e89f58892/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->


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