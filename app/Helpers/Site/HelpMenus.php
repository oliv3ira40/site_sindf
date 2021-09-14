<?php

	namespace App\Helpers\Site;

	/**
	* HelpMenus
	*/
	class HelpMenus
	{
		public static function TopMenu()
		{
			$action = \Request::route()->action['as'] ?? '';
			$auth_user = \Auth::user();

            // Example
            // [
            //     'permission' => '#',        // permission or #
            //     'label'      => 'Início',   // name or ''
            //     'url'        => '#',        // route or #
            //     'full_url'   => '',         // full url or #
            //     'file'       => '#',        // path or #
            //     'target'     => '_blank',   // target or ''
            //     'id'         => '',         // id or ''
            //     'class'      => '',         // class or ''
            //     'i'          => '#',        // class or #
            // ],


            return [
                // Página Inicial
                [
                    'permission' => '#',          // permission or #
                    'label' => 'Início',          // name or ''
                    'url' => '#',        // route or #
                    'full_url' => '#',            // full url or #
                    'file' => '#',                // path or #
                    'target' => '_blank',               // target or ''
                    'id' => '',                   // id or ''
                    'class' => '',                // class or ''
                    'i' => '#',                  // class or #
                ],
                
                
                // Institucional
                [
                    'permission' => '#',          // permission or #
                    'label' => 'Institucional',  // name or ''
                    'url' => '#',        // route or #
                    'full_url' => '#', 
                    'file' => '#',                // path or #
                    'target' => '',               // target or ''
                    'id' => '',                   // id or ''
                    'class' => '',                // class or ''
                    'i' => '#',                  // class or #
                   
                   
                    'sub_menu' => [
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Sobre',  // name or ''
                        'url' => 'site.about',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '_blank',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Atribuições Cargos PECFAZ',  // name or ''
                        'url' => 'site.position_assignments_pecfaz',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Estatuto',  // name or ''
                        'url' => '#',        // route or #
                        'full_url' => 'https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Estatuto_atual-Livre.pdf', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                         [
                        'permission' => '#',          // permission or #
                        'label' => 'Jurídico',  // name or ''
                        'url' => 'site.talk_to_legal_page',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                         [
                        'permission' => '#',          // permission or #
                        'label' => 'Regimento Interno',  // name or ''
                        'url' => 'site.statics.priv.bylaws',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                         [
                        'permission' => '#',          // permission or #
                        'label' => 'Regimento Eleitoral',  // name or ''
                        'url' => 'site.statics.priv.electoral_regiment',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                         [
                        'permission' => '#',          // permission or #
                        'label' => 'Diretoria Executiva',  // name or ''
                        'url' => 'site.national_executive_board',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                         [
                        'permission' => '#',          // permission or #
                        'label' => 'Prestação de Contas',  // name or ''
                        'url' => 'site.statics.priv.accountability',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                         [
                        'permission' => '#',          // permission or #
                        'label' => 'ATAS',  // name or ''
                        'url' => '#',        // route or #
                        'full_url' => 'https://www.sindfazenda.org.br/tttt/public/noticias?category_post_id=20', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                         [
                        'permission' => '#',          // permission or #
                        'label' => 'Representantes Regionais',  // name or ''
                        'url' => 'site.statics.regional_representatives',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                    ]
                ],
                
                
                //Filiação
                
                    [
                    'permission' => '#',          // permission or #
                    'label' => 'Filiação',  // name or ''
                    'url' => '#',        // route or #
                    'full_url' => '#', 
                    'file' => '#',                // path or #
                    'target' => '',               // target or ''
                    'id' => '',                   // id or ''
                    'class' => '',                // class or ''
                    'i' => '#',                  // class or #
                   
                   
                    'sub_menu' => [
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Inscrição',  // name or ''
                        'url' => 'site.statics.enrollment',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Atualização Cadastral',  // name or ''
                        'url' => '#',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                    ]
                ],
                
                
                // Serviços
                [
                    'permission' => '#',          // permission or #
                    'label' => 'Serviços',  // name or ''
                    'url' => '#',        // route or #
                    'full_url' => '#', 
                    'file' => '#',                // path or #
                    'target' => '',               // target or ''
                    'id' => '',                   // id or ''
                    'class' => '',                // class or ''
                    'i' => '#',                  // class or #
                   
                   
                    'sub_menu' => [
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Convênios',  // name or ''
                        'url' => 'site.statics.agreement',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Banco de Permutas',  // name or ''
                        'url' => 'site.statics.exchange_bank',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Mapeamento de Processos',  // name or ''
                        'url' => 'site.statics.priv.process_mapping',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                         [
                        'permission' => '#',          // permission or #
                        'label' => 'Área Restrita',  // name or ''
                        'url' => 'site.page_login',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                    ]
                ],
                
                
                // Notícias
                [
                    'permission' => '#',
                    'label' => 'Publicações',
                    'url' => 'site.posts.list',
                    'full_url' => 'https://www.sindfazenda.org.br/tttt/public/noticias?category_post_id=11', 
                    'file' => '#',
                    'target' => '',
                    'id' => '',
                    'class' => '',
                    'i' => '#',
                
                
                'sub_menu' => [
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Notícias',  // name or ''
                        'url' => '#',        // route or #
                        'full_url' => 'https://www.sindfazenda.org.br/tttt/public/noticias?category_post_id=11', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Assembleias',  // name or ''
                        'url' => '#',        // route or #
                        'full_url' => 'https://www.sindfazenda.org.br/tttt/public/noticias?category_post_id=15', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Destaques',  // name or ''
                        'url' => '#',        // route or #
                        'full_url' => 'https://www.sindfazenda.org.br/tttt/public/noticias?category_post_id=12', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Fotos',  // name or ''
                        'url' => '#',        // route or #
                        'full_url' => 'https://www.sindfazenda.org.br/tttt/public/noticias?category_post_id=24', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Eleições',  // name or ''
                        'url' => '#',        // route or #
                        'full_url' => 'https://www.sindfazenda.org.br/tttt/public/noticias?category_post_id=19', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Jurídico',  // name or ''
                        'url' => '#',        // route or #
                        'full_url' => 'https://www.sindfazenda.org.br/tttt/public/noticias?category_post_id=16', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Vídeos',  // name or ''
                        'url' => '#',        // route or #
                        'full_url' => 'https://www.youtube.com/user/SINDSARF1', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Atas',  // name or ''
                        'url' => '#',        // route or #
                        'full_url' => 'https://www.sindfazenda.org.br/tttt/public/noticias?category_post_id=20', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                    ]
                ],
                        
                        
                
                
                // Contatos
                
                    [
                    'permission' => '#',          // permission or #
                    'label' => 'Contatos',  // name or ''
                    'url' => '#',        // route or #
                    'full_url' => '#', 
                    'file' => '#',                // path or #
                    'target' => '',               // target or ''
                    'id' => '',                   // id or ''
                    'class' => '',                // class or ''
                    'i' => '#',                  // class or #
                   
                    
                    'sub_menu' => [
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Fale Conosco',  // name or ''
                        'url' => 'site.contact_us',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                        [
                        'permission' => '#',          // permission or #
                        'label' => 'Fale Com o Jurídico',  // name or ''
                        'url' => 'site.talk_to_legal',        // route or #
                        'full_url' => '#', 
                        'file' => '#',                // path or #
                        'target' => '',               // target or ''
                        'id' => '',                   // id or ''
                        'class' => '',                // class or ''
                        'i' => '#',                  // class or #
                        ],
                        
                    ]
                        
                ],
                    
                
                // Buscar
                [
                    'permission' => '#',
                    'label' => 'Buscar',
                    'url' => '#',
                    'full_url' => '#', 
                    'file' => '#',
                    'target' => '',
                    'id' => 'btn_search',
                    'class' => 'text-primary',
                    'i' => 'fa fa-search font-18 p-l-5 icon_search_menu_site',
                ],
                
            ];
		}
	}