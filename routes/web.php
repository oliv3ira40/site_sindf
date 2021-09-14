<?php

use App\Http\Controllers\Peoples\AdministratorController;
use App\Models\Admin\Calleds\Product;
use App\Models\Admin\Calleds\ProductSeveritie;

Route::group(['middleware' => ['VerifyUserPermissions', 'CheckDefinitivePassword']], function(){

    // ADMIN
        Route::get('adm/', 'Admin\AdminController@index')->name('adm.index');

        // CreatedPermissions
            Route::get('adm/permissoes-criadas/lista', 'Admin\CreatedPermissionController@list')->name('adm.created_permissions.list');
                
            Route::get('adm/permissoes-criadas/nova', 'Admin\CreatedPermissionController@new')->name('adm.created_permissions.new');
            Route::post('adm/permissoes-criadas/salvar', 'Admin\CreatedPermissionController@save')->name('adm.created_permissions.save');
            
            Route::get('adm/permissoes-criadas/editar/{id}', 'Admin\CreatedPermissionController@edit')->name('adm.created_permissions.edit');
            Route::post('adm/permissoes-criadas/atualizar', 'Admin\CreatedPermissionController@update')->name('adm.created_permissions.update');
            
            Route::get('adm/permissoes-criadas/alerta/{id}', 'Admin\CreatedPermissionController@alert')->name('adm.created_permissions.alert');
            Route::post('adm/permissoes-criadas/deletar', 'Admin\CreatedPermissionController@delete')->name('adm.created_permissions.delete');
        // CreatedPermissions

        // Groups
            Route::get('adm/grupos/lista', 'Admin\GroupController@list')->name('adm.groups.list');
            
            Route::get('adm/grupos/novo', 'Admin\GroupController@new')->name('adm.groups.new');
            Route::post('adm/grupos/salvar', 'Admin\GroupController@save')->name('adm.groups.save');
            
            Route::get('adm/grupos/editar/{id}', 'Admin\GroupController@edit')->name('adm.groups.edit');
            Route::post('adm/grupos/atualizar', 'Admin\GroupController@update')->name('adm.groups.update');
            
            Route::get('adm/grupos/alerta/{id}', 'Admin\GroupController@alert')->name('adm.groups.alert');
            Route::post('adm/grupos/deletar', 'Admin\GroupController@delete')->name('adm.groups.delete');
        // Groups

        // User
            Route::match(['get', 'post'], 'adm/usuarios/lista', 'Admin\UserController@list')->name('adm.users.list');
            
            Route::get('adm/usuarios/novo', 'Admin\UserController@new')->name('adm.users.new');
            Route::post('adm/usuarios/salvar', 'Admin\UserController@save')->name('adm.users.save');
            
            Route::get('adm/usuarios/editar/{id}', 'Admin\UserController@edit')->name('adm.users.edit');
            Route::post('adm/usuarios/atualizar', 'Admin\UserController@update')->name('adm.users.update');
            
            Route::get('adm/usuarios/alerta/{id}', 'Admin\UserController@alert')->name('adm.users.alert');
            Route::post('adm/users/delete', 'Admin\UserController@delete')->name('adm.users.delete');

            Route::get('adm/usuarios/restaurar/{id}', 'Admin\UserController@toRestore')->name('adm.users.to_restore');

            Route::get('adm/usuarios/alerta-exclusao-definitiva/{id}', 'Admin\UserController@definitiveExclusionAlert')->name('adm.users.definitive_exclusion_alert');
            Route::post('adm/users/definitive-exclusion', 'Admin\UserController@definitiveExclusion')->name('adm.users.definitive_exclusion');
        // User

        // UserSetting
            Route::post('adm/user/update_dark_mode', 'Admin\UserSettingController@updateDarkMode')->name('adm.user.update_dark_mode');
        // UserSetting
            
        // Avatar
            Route::post('adm/avatars/change_user_avatar', 'Admin\AvatarController@changeUserAvatar')->name('adm.avatars.change_user_avatar');
        // Avatar

        // ApplicationAppearanceSetting
            Route::get('adm/config-aparen-apli/editar', 'Config\ApplicationAppearanceSettingController@edit')
                ->name('adm.application_appearance_settings.edit');
            Route::post('adm/appli_appear_sett/update', 'Config\ApplicationAppearanceSettingController@update')
                ->name('adm.application_appearance_settings.update');
        // ApplicationAppearanceSetting
        // ApplicationSettingController
            Route::get('adm/config-apli/editar', 'Config\ApplicationSettingController@edit')
                ->name('adm.application_settings.edit');
            Route::post('adm/appli_sett/update', 'Config\ApplicationSettingController@update')
                ->name('adm.application_settings.update');
        // ApplicationSettingController


        // FILES
            Route::match(['get', 'post'], 'adm/arquivos-disponiveis', 'Admin\FileController@allFiles')->name('adm.files.all_files');

            Route::post('adm/arquivos-disponiveis/adicionar', 'Admin\FileController@insertFiles')->name('adm.file.insert_files');

            Route::get('adm/arquivos-disponiveis/alerta', 'Admin\FileController@alert')->name('adm.file.alert');
            Route::post('adm/arquivos-disponiveis/delete', 'Admin\FileController@delete')->name('adm.file.delete');
        // FILES
        
        // POSTS // MENU permission adm.menu_posts
            Route::match(['get', 'post'], 'adm/noticias/lista', 'Admin\Site\Post\PostController@list')->name('adm.posts.list');

            Route::get('adm/noticias/novo', 'Admin\Site\Post\PostController@new')->name('adm.post.new');
            Route::post('adm/noticias/save', 'Admin\Site\Post\PostController@save')->name('adm.post.save');
            
            Route::get('adm/noticias/editar/{id}', 'Admin\Site\Post\PostController@edit')->name('adm.post.edit');
            Route::post('adm/noticias/update', 'Admin\Site\Post\PostController@update')->name('adm.post.update');
            
            Route::get('adm/noticias/alerta/{id}', 'Admin\Site\Post\PostController@alert')->name('adm.post.alert');
            Route::post('adm/noticias/delete', 'Admin\Site\Post\PostController@delete')->name('adm.post.delete');
    
            Route::get('adm/noticias/lista-excluidas', 'Admin\Site\Post\PostController@excludedList')->name('adm.posts.excluded_list');
            Route::get('adm/noticias/alerta-restaurar/{id}', 'Admin\Site\Post\PostController@alertRestore')->name('adm.post.alert_restore');
            Route::post('adm/noticias/restore', 'Admin\Site\Post\PostController@restore')->name('adm.post.restore');
    
            Route::get('adm/noticias/alerta-exclusao-definitiva/{id}', 'Admin\Site\Post\PostController@alertDefinitiveExclusion')->name('adm.post.alert_definitive_exclusion');
            Route::post('adm/noticias/definitive-delete', 'Admin\Site\Post\PostController@definitiveDelete')->name('adm.post.definitive_delete');
        // POSTS

        // CategoryPost // MENU adm.menu_category_post
            Route::match(['get', 'post'], 'adm/categoria-noticia/lista', 'Admin\Site\Post\CategoryPostController@list')->name('adm.categories_posts.list');

            Route::get('adm/categoria-noticia/novo', 'Admin\Site\Post\CategoryPostController@new')->name('adm.category_post.new');
            Route::post('adm/categoria-noticia/save', 'Admin\Site\Post\CategoryPostController@save')->name('adm.category_post.save');
            
            Route::get('adm/categoria-noticia/editar/{id}', 'Admin\Site\Post\CategoryPostController@edit')->name('adm.category_post.edit');
            Route::post('adm/categoria-noticia/update', 'Admin\Site\Post\CategoryPostController@update')->name('adm.category_post.update');
            
            Route::get('adm/categoria-noticia/alerta/{id}', 'Admin\Site\Post\CategoryPostController@alert')->name('adm.category_post.alert');
            Route::post('adm/categoria-noticia/delete', 'Admin\Site\Post\CategoryPostController@delete')->name('adm.category_post.delete');
            
            // AJAX
                Route::post('adm/categoria-noticia/new-ajax', 'Admin\Site\Post\CategoryPostController@newAjax')->name('adm.category_post.new_ajax');
        // CategoryPost
        // TagPost // MENU adm.menu_tag_post
            Route::match(['get', 'post'], 'adm/tag-noticia/lista', 'Admin\Site\Post\TagPostController@list')->name('adm.tags_posts.list');

            Route::get('adm/tag-noticia/novo', 'Admin\Site\Post\TagPostController@new')->name('adm.tag_post.new');
            Route::post('adm/tag-noticia/save', 'Admin\Site\Post\TagPostController@save')->name('adm.tag_post.save');
            
            Route::get('adm/tag-noticia/editar/{id}', 'Admin\Site\Post\TagPostController@edit')->name('adm.tag_post.edit');
            Route::post('adm/tag-noticia/update', 'Admin\Site\Post\TagPostController@update')->name('adm.tag_post.update');
            
            Route::get('adm/tag-noticia/alerta/{id}', 'Admin\Site\Post\TagPostController@alert')->name('adm.tag_post.alert');
            Route::post('adm/tag-noticia/delete', 'Admin\Site\Post\TagPostController@delete')->name('adm.tag_post.delete');
            
            // AJAX
                Route::post('adm/tag-noticia/new-ajax', 'Admin\Site\Post\TagPostController@newAjax')->name('adm.tag_post.new_ajax');
        // TagPost
        // StatusPost // MENU adm.menu_status_post
            Route::get('adm/status-noticia/lista', 'Admin\Site\Post\StatusPostController@list')->name('adm.status_posts.list');

            Route::get('adm/status-noticia/novo', 'Admin\Site\Post\StatusPostController@new')->name('adm.status_post.new');
            Route::post('adm/status-noticia/save', 'Admin\Site\Post\StatusPostController@save')->name('adm.status_post.save');

            Route::get('adm/status-noticia/editar/{id}', 'Admin\Site\Post\StatusPostController@edit')->name('adm.status_post.edit');
            Route::post('adm/status-noticia/update', 'Admin\Site\Post\StatusPostController@update')->name('adm.status_post.update');

            Route::get('adm/status-noticia/alerta/{id}', 'Admin\Site\Post\StatusPostController@alert')->name('adm.status_post.alert');
            Route::post('adm/status-noticia/delete', 'Admin\Site\Post\StatusPostController@delete')->name('adm.status_post.delete');

            // AJAX
                Route::post('adm/status-noticia/new-ajax', 'Admin\Site\Post\StatusPostController@newAjax')->name('adm.status_post.new_ajax');
        // StatusPost

        // SLIDERS POST // MENU permission adm.menu_sliders_site
            Route::get('adm/sliders-site/lista', 'Admin\Site\SliderSiteController@list')->name('adm.slider_site.list');

            Route::get('adm/sliders-site/novo', 'Admin\Site\SliderSiteController@new')->name('adm.slider_site.new');
            Route::post('adm/sliders-site/save', 'Admin\Site\SliderSiteController@save')->name('adm.slider_site.save');
            
            Route::get('adm/sliders-site/editar/{id}', 'Admin\Site\SliderSiteController@edit')->name('adm.slider_site.edit');
            Route::post('adm/sliders-site/update', 'Admin\Site\SliderSiteController@update')->name('adm.slider_site.update');
            
            Route::get('adm/sliders-site/alerta/{id}', 'Admin\Site\SliderSiteController@alert')->name('adm.slider_site.alert');
            Route::post('adm/sliders-site/delete', 'Admin\Site\SliderSiteController@delete')->name('adm.slider_site.delete');
        // SLIDERS POST

        // POSTS DESTACADOS // MENU permission adm.menu_featured_post
            Route::get('adm/noticias_destacados/lista', 'Admin\Site\Post\FeaturedPostController@list')->name('adm.featured_post.list');

            Route::get('adm/noticias_destacados/novo', 'Admin\Site\Post\FeaturedPostController@new')->name('adm.featured_post.new');
            Route::post('adm/noticias_destacados/save', 'Admin\Site\Post\FeaturedPostController@save')->name('adm.featured_post.save');
            
            Route::get('adm/noticias_destacados/editar/{id}', 'Admin\Site\Post\FeaturedPostController@edit')->name('adm.featured_post.edit');
            Route::post('adm/noticias_destacados/update', 'Admin\Site\Post\FeaturedPostController@update')->name('adm.featured_post.update');
            
            Route::get('adm/noticias_destacados/alerta/{id}', 'Admin\Site\Post\FeaturedPostController@alert')->name('adm.featured_post.alert');
            Route::post('adm/noticias_destacados/delete', 'Admin\Site\Post\FeaturedPostController@delete')->name('adm.featured_post.delete');
        // POSTS DESTACADOS

        // Xls files for wallets
            Route::get('adm/update-casembrapa-users',
                'Admin\Site\Wallet\XlsFileForWalletController@updateCasembrapaUser')
                ->name('adm.update_casembrapa_users');
            Route::get('adm/update-users-casembrapa-wallet',
                'Admin\Site\Wallet\XlsFileForWalletController@updateUserCasembrapaWallet')
                ->name('adm.update_users_casembrapa_wallet');

            Route::get('adm/update-cassi-wallet',
                'Admin\Site\Wallet\XlsFileForWalletController@updateCassiWallet')
                ->name('adm.update_wassi_wallet');
        // Xls files for wallets

        // Wallets
            Route::get('adm/creating-digital-wallets-of-beneficiaries',
                'Admin\Site\Wallet\WalletController@creatingDigitalWalletsOfBeneficiaries')
                ->name('adm.creating_digital_wallets_of_beneficiaries');
            
            Route::get('adm/send-digital-wallets-to-beneficiaries',
                'Admin\Site\Wallet\WalletController@sendDigitalWalletsToBeneficiaries')
                ->name('adm.send_digital_wallets_to_beneficiaries');
        // Wallets
    // ADMIN

    // SITE
        // USERS
        // USERS

        // Pesquisas
            Route::get('adm/pesquisas/lista',
                'Admin\Evaluations\EvaluationController@list')
                ->name('adm.evaluation.list');

            Route::get('adm/pesquisa/novo',
                'Admin\Evaluations\EvaluationController@new')
                ->name('adm.evaluation.new');
            Route::post('adm/pesquisa/save',
                'Admin\Evaluations\EvaluationController@save')
                ->name('adm.evaluation.save');

            Route::get('adm/pesquisa/editar/{id}',
                'Admin\Evaluations\EvaluationController@edit')
                ->name('adm.evaluation.edit');
            Route::post('adm/pesquisa/update',
                'Admin\Evaluations\EvaluationController@update')
                ->name('adm.evaluation.update');
            
            Route::get('adm/pesquisa/alerta/{id}',
                'Admin\Evaluations\EvaluationController@alert')
                ->name('adm.evaluation.alert');
            Route::post('adm/pesquisa/excluir',
                'Admin\Evaluations\EvaluationController@delete')
                ->name('adm.evaluation.delete');

            Route::get('adm/pesquisa/relatorio/{id}',
                'Admin\Evaluations\EvaluationController@report')
                ->name('adm.evaluation.report');
            Route::post('adm/pesquisa/download-report',
                'Admin\Evaluations\EvaluationController@downloadReport')
                ->name('adm.evaluation.download_report');
            
            // Imagens para as pesquisas
                Route::get('adm/imagens-pesquisa/lista/{evaluation_id}',
                    'Admin\Evaluations\ImageForEvaluationController@list')
                    ->name('adm.image_for_evaluation.list');

                Route::get('adm/imagem-pesquisa/novo/{evaluation_id}',
                    'Admin\Evaluations\ImageForEvaluationController@new')
                    ->name('adm.image_for_evaluation.new');
                Route::post('adm/imagem-pesquisa/save',
                    'Admin\Evaluations\ImageForEvaluationController@save')
                    ->name('adm.image_for_evaluation.save');

                Route::get('adm/imagem-pesquisa/editar/{id}',
                    'Admin\Evaluations\ImageForEvaluationController@edit')
                    ->name('adm.image_for_evaluation.edit');
                Route::post('adm/imagem-pesquisa/update',
                    'Admin\Evaluations\ImageForEvaluationController@update')
                    ->name('adm.image_for_evaluation.update');

                Route::get('adm/imagem-pesquisa/alerta/{id}',
                    'Admin\Evaluations\ImageForEvaluationController@alert')
                    ->name('adm.image_for_evaluation.alert');
                Route::post('adm/imagem-pesquisa/delete',
                    'Admin\Evaluations\ImageForEvaluationController@delete')
                    ->name('adm.image_for_evaluation.delete');
            // Imagens para as pesquisas

            // Configuracoes da pesquisa
                Route::get('adm/configuracoes-da-pesquisa/editar/{id}',
                    'Admin\Evaluations\EvaluationSettingController@edit')
                    ->name('adm.evaluation_setting.edit');
                Route::post('adm/configuracoes-da-pesquisa/update',
                    'Admin\Evaluations\EvaluationSettingController@update')
                    ->name('adm.evaluation_setting.update');
            // Configuracoes da pesquisa

            // Responsaveis pela pesquisa
                Route::get('adm/responsaveis-pela-pesquisa/editar/{evaluation_setting_id}',
                    'Admin\Evaluations\ResponsibleForTheEvaluationController@edit')
                    ->name('adm.responsible_for_the_evaluation.edit');
                Route::post('adm/responsaveis-pela-pesquisa/update',
                    'Admin\Evaluations\ResponsibleForTheEvaluationController@update')
                    ->name('adm.responsible_for_the_evaluation.update');
            // Responsaveis pela pesquisa

            // Grupos permitidos
                Route::get('adm/grupos-permitidos/editar/{evaluation_setting_id}',
                    'Admin\Evaluations\AllowedGroupController@edit')
                    ->name('adm.allowed_group.edit');
                Route::post('adm/grupos-permitidos/update',
                    'Admin\Evaluations\AllowedGroupController@update')
                    ->name('adm.allowed_group.update');
            // Grupos permitidos

            // Topicos das questoes
                Route::get('adm/topicos-das-questoes/lista/{evaluation_id}',
                    'Admin\Evaluations\QuestionTopicController@list')
                    ->name('adm.question_topic.list');    

                Route::get('adm/topicos-das-questoes/novo/{evaluation_id}',
                    'Admin\Evaluations\QuestionTopicController@new')
                    ->name('adm.question_topic.new');
                Route::post('adm/topicos-das-questoes/save',
                    'Admin\Evaluations\QuestionTopicController@save')
                    ->name('adm.question_topic.save');

                Route::get('adm/topicos-das-questoes/editar/{id}',
                    'Admin\Evaluations\QuestionTopicController@edit')
                    ->name('adm.question_topic.edit');
                Route::post('adm/topicos-das-questoes/update',
                    'Admin\Evaluations\QuestionTopicController@update')
                    ->name('adm.question_topic.update');

                Route::get('adm/topicos-das-questoes/alerta/{id}',
                    'Admin\Evaluations\QuestionTopicController@alert')
                    ->name('adm.question_topic.alert');
                Route::post('adm/topicos-das-questoes/delete',
                    'Admin\Evaluations\QuestionTopicController@delete')
                    ->name('adm.question_topic.delete');
            // Topicos das questoes

            // Tipos de questoes
                Route::get('adm/tipos-de-questoes/lista',
                    'Admin\Evaluations\QuestionTypeController@list')
                    ->name('adm.question_type.list');

                Route::get('adm/tipos-de-questoes/novo',
                    'Admin\Evaluations\QuestionTypeController@new')
                    ->name('adm.question_type.new');
                Route::post('adm/tipos-de-questoes/save',
                    'Admin\Evaluations\QuestionTypeController@save')
                    ->name('adm.question_type.save');

                Route::get('adm/tipos-de-questoes/editar/{id}',
                    'Admin\Evaluations\QuestionTypeController@edit')
                    ->name('adm.question_type.edit');
                Route::post('adm/tipos-de-questoes/update',
                    'Admin\Evaluations\QuestionTypeController@update')
                    ->name('adm.question_type.update');

                Route::get('adm/tipos-de-questoes/alerta/{id}',
                    'Admin\Evaluations\QuestionTypeController@alert')
                    ->name('adm.question_type.alert');
                Route::post('adm/tipos-de-questoes/delete',
                    'Admin\Evaluations\QuestionTypeController@delete')
                    ->name('adm.question_type.delete');
            // Tipos de questoes

            // Questoes disponiveis
                Route::get('adm/questoes-disponiveis/lista/{evaluation_id}',
                    'Admin\Evaluations\AvailableQuestionController@list')
                    ->name('adm.available_question.list');    

                Route::get('adm/questoes-disponiveis/novo/{evaluation_id}',
                    'Admin\Evaluations\AvailableQuestionController@new')
                    ->name('adm.available_question.new');
                Route::post('adm/questoes-disponiveis/save',
                    'Admin\Evaluations\AvailableQuestionController@save')
                    ->name('adm.available_question.save');

                Route::get('adm/questoes-disponiveis/editar/{id}',
                    'Admin\Evaluations\AvailableQuestionController@edit')
                    ->name('adm.available_question.edit');
                Route::post('adm/questoes-disponiveis/update',
                    'Admin\Evaluations\AvailableQuestionController@update')
                    ->name('adm.available_question.update');

                Route::get('adm/questoes-disponiveis/alerta/{id}',
                    'Admin\Evaluations\AvailableQuestionController@alert')
                    ->name('adm.available_question.alert');
                Route::post('adm/questoes-disponiveis/delete',
                    'Admin\Evaluations\AvailableQuestionController@delete')
                    ->name('adm.available_question.delete');
            // Questoes disponiveis

            // Possiveis respostas para as perguntas
                Route::get('adm/possiveis-respostas/lista/{available_question_id}',
                    'Admin\Evaluations\PossibleQuestionAnswerController@list')
                    ->name('adm.possible_question_answer.list');

                Route::get('adm/possiveis-respostas/novo/{available_question_id}',
                    'Admin\Evaluations\PossibleQuestionAnswerController@new')
                    ->name('adm.possible_question_answer.new');
                Route::post('adm/possiveis-respostas/save',
                    'Admin\Evaluations\PossibleQuestionAnswerController@save')
                    ->name('adm.possible_question_answer.save');

                Route::get('adm/possiveis-respostas/editar/{id}',
                    'Admin\Evaluations\PossibleQuestionAnswerController@edit')
                    ->name('adm.possible_question_answer.edit');
                Route::post('adm/possiveis-respostas/update',
                    'Admin\Evaluations\PossibleQuestionAnswerController@update')
                    ->name('adm.possible_question_answer.update');

                Route::get('adm/possiveis-respostas/alerta/{id}',
                    'Admin\Evaluations\PossibleQuestionAnswerController@alert')
                    ->name('adm.possible_question_answer.alert');
                Route::post('adm/possiveis-respostas/delete',
                    'Admin\Evaluations\PossibleQuestionAnswerController@delete')
                    ->name('adm.possible_question_answer.delete');
            // Possiveis respostas para as perguntas

            // Condicoes exclusivas para as respostas
                Route::get('adm/condicoes-exclusivas-para-respostas/lista',
                    'Admin\Evaluations\ExclusiveConditionForResponseController@list')
                    ->name('adm.exclusive_condition_for_response.list');

                Route::get('adm/condicoes-exclusivas-para-respostas/novo',
                    'Admin\Evaluations\ExclusiveConditionForResponseController@new')
                    ->name('adm.exclusive_condition_for_response.new');
                Route::post('adm/condicoes-exclusivas-para-respostas/save',
                    'Admin\Evaluations\ExclusiveConditionForResponseController@save')
                    ->name('adm.exclusive_condition_for_response.save');

                Route::get('adm/condicoes-exclusivas-para-respostas/editar/{id}',
                    'Admin\Evaluations\ExclusiveConditionForResponseController@edit')
                    ->name('adm.exclusive_condition_for_response.edit');
                Route::post('adm/condicoes-exclusivas-para-respostas/update',
                    'Admin\Evaluations\ExclusiveConditionForResponseController@update')
                    ->name('adm.exclusive_condition_for_response.update');

                Route::get('adm/condicoes-exclusivas-para-respostas/alerta/{id}',
                    'Admin\Evaluations\ExclusiveConditionForResponseController@alert')
                    ->name('adm.exclusive_condition_for_response.alert');
                Route::post('adm/condicoes-exclusivas-para-respostas/delete',
                    'Admin\Evaluations\ExclusiveConditionForResponseController@delete')
                    ->name('adm.exclusive_condition_for_response.delete');
            // Condicoes exclusivas para as respostas
        // Pesquisas
    // SITE

});	/*Fecha grupo de verificação de permissões*/
        
    // Site
        Route::get('/', 'Site\SiteController@index')->name('site.index');

        // USER
            Route::get('/validando-usuario/{target?}', 'Site\UserController@validateCpf')
                ->name('site.user.validate_cpf');
            Route::post('/validando-usuario_2', 'Site\UserController@validateDateOfBirth')
                ->name('site.user.validate_date_of_birth');
            Route::post('/save_token_user_session', 'Site\UserController@saveTokenUserSession')
                ->name('site.user.save_token_user_session');
        // USER

        // Wallet
            Route::get('/buscar-carteirinha-digital', 'Site\Wallet\WalletController@DigitalWallet')
                ->name('site.wallet.digital_wallet');
            Route::get('/carteirinha-digital', 'Site\Wallet\WalletController@DigitalWallet')
                ->name('site.wallet.digital_wallet');

            // AJAX
            Route::post('/save-casembrapa-wallet', 'Site\Wallet\WalletController@saveCasembrapaWallet')
                ->name('site.casembrapa_wallet.save_casembrapa_wallet');
            Route::post('/save-cassi-wallet', 'Site\Wallet\WalletController@saveCassiWallet')
                ->name('site.cassi_wallet.save_cassi_wallet');
        // Wallet

        // POSTS
            Route::match(['get', 'post'], '/noticias', 'Site\Post\PostController@list')->name('site.posts.list');
            Route::get('/noticias/{id?}', 'Site\Post\PostController@detail')->name('site.posts.detail');
        // POSTS
            
        // Statics
            Route::get('sobre', 'Site\SiteController@about')->name('site.about');
            Route::get('fale-conosco', 'Site\SiteController@contactUs')->name('site.contact_us');
            Route::get('fale-com-o-juridico', 'Site\SiteController@talkToLegal')->name('site.talk_to_legal');
            Route::get('diretoria-nacional-executiva', 'Site\SiteController@nationalExecutiveBoard')->name('site.national_executive_board');
            Route::get('atribuicoes-de-cargo-pecfaz', 'Site\SiteController@positionAssignmentsPecfaz')->name('site.position_assignments_pecfaz');
            Route::get('representantes-regionais', 'Site\SiteController@regionalRepresentatives')->name('site.statics.regional_representatives');
            Route::get('fale-com-o-juridico-page', 'Site\SiteController@talkToLegalPage')->name('site.talk_to_legal_page');
            Route::get('convenios', 'Site\SiteController@agreement')->name('site.statics.agreement');
            Route::get('banco-de-permutas', 'Site\SiteController@exchangeBank')->name('site.statics.exchange_bank');
            Route::get('inscricao', 'Site\SiteController@enrollment')->name('site.statics.enrollment');

            // MODELO DE PAGINA
            // Route::get('titulo-da-pagina', 'Site\SiteController@tituloDaPaginaEmIngles')->name('site.titulo_da_pagina_em_ingles');
        // Statics

        // Private statics
            Route::get('teste', 'Site\PrivSiteController@teste')->name('site.statics.priv.teste');
            Route::get('regimento-interno', 'Site\PrivSiteController@bylaws')->name('site.statics.priv.bylaws');
            Route::get('regimento-eleitoral', 'Site\PrivSiteController@electoralRegiment')->name('site.statics.priv.electoral_regiment');

            Route::get('mapeamento-de-processos', 'Site\PrivSiteController@processMapping')->name('site.statics.priv.process_mapping');
            Route::get('prestacao-de-contas', 'Site\PrivSiteController@accountability')->name('site.statics.priv.accountability');
        
            // MODELO DE PAGINA
            // Route::get('titulo-da-pagina', 'Site\PrivSiteController@tituloDaPaginaEmIngles')->name('site.titulo_da_pagina_em_ingles');
        // Private statics
           
        // AUTH
            Route::get('faca-seu-login', 'Site\Auth\LoginController@pageLogin')->name('site.page_login');
            
            Route::post('login', 'Site\Auth\LoginController@login')->name('site.login');
            Route::get('usuario-logado', 'Site\Auth\LoginController@success')->name('site.success');
            Route::get('logout', 'Site\Auth\LoginController@logout')->name('site.logout');
            
            Route::get('esqueci-a-senha', 'Site\Auth\LoginController@resetPassword')->name('site.reset_password');
            Route::post('validate-personal-data', 'Site\Auth\LoginController@validatePersonalData')->name('site.validate_personal_data');
            
            Route::get('nova-senha/{remember_token}', 'Site\Auth\LoginController@newPassword')->name('site.new_password');
            Route::post('save-new-password', 'Site\Auth\LoginController@saveNewPassword')->name('site.save_new_password');

            Route::get('defina-sua-nova-senha', 'Site\Auth\LoginController@definitivePassword')->name('site.definitive_password');
            Route::post('definitive-password-save', 'Site\Auth\LoginController@definitivePasswordSave')->name('site.definitive_password_save');
        // AUTH

        // FORMS
            Route::get('/confirmacao-do-envio', 'Site\Form\FormController@shippingConfirmation')->name('site.form.shipping_confirmation');
            
            Route::post('/contact-form-send', 'Site\Form\ContactFormController@send')->name('site.contact_form.send');
            Route::post('/cadastral-update-send', 'Site\Form\CadastralUpdateController@send')->name('site.cadastral_update.send');
            Route::post('/ombudsman-send', 'Site\Form\OmbudsmanController@send')->name('site.ombudsman.send');
            Route::post('/contact-form-2-send', 'Site\Form\ContactForm2Controller@send')->name('site.contact_form_2.send');
        // FORMS

        // RECAPTCHA
            Route::get('nao-autorizado', 'Site\SiteController@recaptcha')->name('site.recaptcha');
        // RECAPTCHA

        // Pesquisas
            // Route::post('/get-evalutations-by-date',
            // 'Admin\Evaluations\EvaluationController@getEvalutationsByDate')
            // ->name('adm.evaluation.get_evalutations_by_date');

            // Pesquisas Completas
                Route::get('iniciando-pesquisa/{evaluation_id?}',
                    'Site\Evaluation\CompletedEvaluationController@new')
                    ->name('site.completed_evaluations.new');
                Route::post('save-evaluation',
                    'Site\Evaluation\CompletedEvaluationController@save')
                    ->name('site.completed_evaluations.save');

                Route::get('pesquisa-concluida',
                    'Site\Evaluation\CompletedEvaluationController@completed')
                    ->name('site.completed_evaluations.completed');
                Route::get('pesquisa-ja-respondida',
                    'Site\Evaluation\CompletedEvaluationController@alreadyAnswered')
                    ->name('site.completed_evaluations.already_answered');
            // Pesquisas Completas

            // Graficos
                Route::post('/donut_by_question',
                    'Admin\Evaluations\EvaluationController@donutByQuestion')
                    ->name('site.evaluation.donut_by_question');

                Route::post('/bar_by_question',
                    'Admin\Evaluations\EvaluationController@barByQuestion')
                    ->name('site.evaluation.bar_by_question');
            // Graficos
        // Pesquisas
    // Site

    // ADM
        Route::get('adm/sem-permissao', 'Admin\AdminController@withoutPermission')->name('adm.withoutPermission');
        
        // User
            Route::get('adm/defina-sua-nova-senha', 'Admin\UserController@definitivePassword')->name('adm.definitive_password');
            Route::post('adm/definitive-password-save', 'Admin\UserController@definitivePasswordSave')->name('adm.definitive_password_save');
        // User

        // AUTH
            // Auth::routes();
            Route::get('adm/email_entry', 'Admin\Auth\LoginController@emailEntry')->name('adm.email_entry');
            
            Route::post('adm/check_email', 'Admin\Auth\LoginController@checkEmail')->name('adm.check_email');
            Route::get('adm/bem-vindo-de-volta/{id}', 'Admin\Auth\LoginController@welcomeBack')->name('adm.welcome_back');
        
            Route::post('adm/login', 'Admin\Auth\LoginController@login')->name('adm.login');
            Route::get('adm/logout', 'Admin\Auth\LoginController@logout')->name('adm.logout');
            
            Route::get('adm/esqueci-a-senha', 'Admin\Auth\LoginController@resetPassword')->name('adm.reset_password');
            Route::post('adm/send-new-password', 'Admin\Auth\LoginController@sendNewPassword')->name('adm.send_new_password');
        // AUTH
    // ADM