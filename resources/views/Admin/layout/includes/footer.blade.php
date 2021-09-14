
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    @if (HelpApplicationSetting::getAppCopyright())    
                        {!! HelpApplicationSetting::getAppCopyright()->copyright !!}
                    @else
                        © StartProject
                    @endif
                </footer>
                @php
                    $flash = session()->all();
                    
                    $notification = null;
                    if (isset($flash['notification'])) {
                        $notification = HelpAdmin::prepareNotification($flash['notification']);
                    }
                @endphp
                @if ($notification != null)
                    @section('type', $notification['type'])
                    @section('msg', $notification['msg'])
                @endif
                <div style="display: none;" id="config_notifications" data-type="@yield('type')">@yield('msg')</div>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Configurações</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user-desc ml-0">
                                    {!! Form::open(['url'=>route('adm.user.update_dark_mode'), 'id'=>'update_dark_mode']) !!}
                                        {!! Form::hidden('id', \Auth::user()->UserSetting->id) !!}
                                        {!! Form::hidden('method', \Request::method()) !!}

                                        <label for="dark_mode" id="label-dark-mode" style="width: min-content;">
                                            <span class="name font-weight font-15">
                                                {{-- {{ (\Auth::user()->UserSetting->dark_mode) ? 'Desativar' : 'Ativar' }} --}}
                                                Modo escuro
                                            </span>
                                        </label>
                                        <div class="div-btn-dark-mode">
                                            @if (\Auth::user()->UserSetting->dark_mode)
                                                <input id="dark_mode" type="checkbox" checked data-plugin="switchery" data-size="small" data-color="#4c5667"/>
                                            @else
                                                <input id="dark_mode" type="checkbox" data-plugin="switchery" data-size="small" data-color="#4c5667"/>
                                            @endif
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </a>
                        </li>
                        
                        @if (in_array('adm.application_appearance_settings.edit', HelpAdmin::permissionsUser()))
                            <li class="list-group-item">
                                <a href="{{ route('adm.application_appearance_settings.edit') }}" class="user-list-item text-black">
                                    <i class="mdi mdi-settings font-16"></i>
                                    <span>
                                        Config de aparência
                                    </span>
                                </a>
                            </li>
                        @endif
                        @if (in_array('adm.application_settings.edit', HelpAdmin::permissionsUser()))
                            <li class="list-group-item">
                                <a href="{{ route('adm.application_settings.edit') }}" class="user-list-item text-black">
                                    <i class="mdi mdi-settings font-16"></i>
                                    <span>
                                        Config da aplicação
                                    </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->
        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/detect.js') }}"></script>
        <script src="{{ asset('admin/assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('admin/assets/js/waves.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.scrollTo.min.js') }}"></script>

        @if (isset($data['required_files']) AND in_array('dropify', $data['required_files']))
            <!-- file uploads js -->
            <script src="{{ asset('admin/assets/plugins/fileuploads/js/dropify.min.js') }}"></script>
            <script type="text/javascript">
                $('.dropify').dropify({
                    messages: {
                        'default': 'Arraste e solte um arquivo aqui ou clique',
                        'replace': 'Arraste e solte ou clique para substituir',
                        'remove': 'Remover',
                        'error': 'Ops, algo errado foi acrescentado.'
                    },
                    error: {
                        'fileSize': 'O tamanho do arquivo é muito grande'
                    }
                });
            </script>
        @endif

        <!--Morris Chart-->
        <script src="{{ asset('admin/assets/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/raphael/raphael-min.js') }}"></script>
        <script src="{{ asset('admin/assets/pages/jquery.morris.init.js') }}"></script>

        <script src="{{ asset('admin/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        
        <!-- Buttons examples -->
        <script src="{{ asset('admin/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/buttons.print.min.js') }}"></script>

        <!-- Key Tables -->
        <script src="{{ asset('admin/assets/plugins/datatables/dataTables.keyTable.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('admin/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Selection table -->
        <script src="{{ asset('admin/assets/plugins/datatables/dataTables.select.min.js') }}"></script>

        <!-- Plugins Js -->
        <script src="{{ asset('admin/assets/plugins/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/jquery-quicksearch/jquery.quicksearch.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/moment/moment.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

        <!-- Toastr js -->
        <script src="{{ asset('admin/assets/plugins/toastr/toastr.min.js') }}"></script>

        <!--form wysiwig js-->
        <script src="{{ asset('admin/assets/plugins/tinymce/tinymce.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.app.js') }}"></script>

        {{-- form wysiwig js --}}
        <script type="text/javascript">
            $(document).ready(function () {
                if($("#elm1").length > 0){
                    tinymce.init({
                        language: 'pt_BR',
                        selector: "textarea#elm1",
                        theme: "modern",
                        height: 500,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                        style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ]
                    });
                }

                if($("#elm2").length > 0){
                    // tinymce.init({
                    //     selector: 'textarea#elm2',
                    //     plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
                    //     imagetools_cors_hosts: ['picsum.photos'],
                    //     menubar: 'file edit view insert format tools table help',
                    //     toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
                    //     toolbar_sticky: true,
                    //     autosave_ask_before_unload: true,
                    //     autosave_interval: '30s',
                    //     autosave_prefix: '{path}{query}-{id}-',
                    //     autosave_restore_when_empty: false,
                    //     autosave_retention: '2m',
                    //     image_advtab: true,
                    //     link_list: [
                    //         { title: 'My page 1', value: 'https://www.tiny.cloud' },
                    //         { title: 'My page 2', value: 'http://www.moxiecode.com' }
                    //     ],
                    //     image_list: [
                    //         { title: 'My page 1', value: 'https://www.tiny.cloud' },
                    //         { title: 'My page 2', value: 'http://www.moxiecode.com' }
                    //     ],
                    //     image_class_list: [
                    //         { title: 'None', value: '' },
                    //         { title: 'Some class', value: 'class-name' }
                    //     ],
                    //     importcss_append: true,
                    //     file_picker_callback: function (callback, value, meta) {
                    //         /* Provide file and text for the link dialog */
                    //         if (meta.filetype === 'file') {
                    //         callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                    //         }

                    //         /* Provide image and alt text for the image dialog */
                    //         if (meta.filetype === 'image') {
                    //         callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                    //         }

                    //         /* Provide alternative source and posted for the media dialog */
                    //         if (meta.filetype === 'media') {
                    //         callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                    //         }
                    //     },
                    //     templates: [
                    //             { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                    //         { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                    //         { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
                    //     ],
                    //     template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                    //     template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                    //     height: 600,
                    //     image_caption: true,
                    //     quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                    //     noneditable_noneditable_class: 'mceNonEditable',
                    //     toolbar_mode: 'sliding',
                    //     contextmenu: 'link image imagetools table',
                    //     skin: useDarkMode ? 'oxide-dark' : 'oxide',
                    //     content_css: useDarkMode ? 'dark' : 'default',
                    //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                    // });



                    tinymce.init({
                        selector: "textarea#elm2",
                        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template  table charmap hr pagebreak nonbreaking anchor  insertdatetime advlist lists wordcount imagetools textpattern noneditable charmap emoticons',
                        
                        imagetools_cors_hosts: ['picsum.photos'],
                        menubar: 'file edit view insert format tools table help',
                        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
                        toolbar_sticky: true,
                        autosave_ask_before_unload: true,
                        autosave_interval: '30s',
                        autosave_prefix: '{path}{query}-{id}-',
                        autosave_restore_when_empty: false,
                        autosave_retention: '2m',
                        image_advtab: true,
                        link_list: [
                            { title: 'My page 1', value: 'https://www.tiny.cloud' },
                            { title: 'My page 2', value: 'http://www.moxiecode.com' }
                        ],
                        image_list: [
                            { title: 'My page 1', value: 'https://www.tiny.cloud' },
                            { title: 'My page 2', value: 'http://www.moxiecode.com' }
                        ],
                        image_class_list: [
                            { title: 'None', value: '' },
                            { title: 'Some class', value: 'class-name' }
                        ],
                        importcss_append: true,
                        file_picker_callback: function (callback, value, meta) {
                            /* Provide file and text for the link dialog */
                            if (meta.filetype === 'file') {
                            callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                            }

                            /* Provide image and alt text for the image dialog */
                            if (meta.filetype === 'image') {
                            callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                            }

                            /* Provide alternative source and posted for the media dialog */
                            if (meta.filetype === 'media') {
                                callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                            }
                        },
                        templates: [
                                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                            { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                            { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
                        ],
                        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                        height: 600,
                        image_caption: true,
                        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                        noneditable_noneditable_class: 'mceNonEditable',
                        toolbar_mode: 'sliding',
                        contextmenu: 'link image imagetools table',
                        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                    });
                }
            });
        </script>

        {{-- My js --}}
            <script src="{{ asset('js/plugins/data_tables.js') }}"></script>
            
            <script src="{{ asset('js/utilities/masks.js') }}"></script>
            <script src="{{ asset('js/utilities/via_cep.js') }}"></script>
            <script src="{{ asset('js/utilities/my_data_ranges.js') }}"></script>
            
            <script src="{{ asset('js/date_picker.js') }}"></script>
            <script src="{{ asset('js/div_update_password.js') }}"></script>
            <script src="{{ asset('js/form_advanced.js') }}"></script>
            <script src="{{ asset('js/notifications.js') }}"></script>
            
            <script src="{{ asset('js/user_settings/btn_dark_mode.js') }}"></script>

            <script src="{{ asset('js/avatars/change_avatar.js') }}"></script>

            <script src="{{ asset('js/evaluations/reports/morris-init.js') }}"></script>
            <script src="{{ asset('js/evaluations/reports/get_evalutations_by_date.js') }}"></script>
        {{-- My js --}}

    </body>
</html>