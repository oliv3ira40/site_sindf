<?php

	namespace App\Helpers;
	
	use App\Helpers\HelpAdmin;

	/**
	* HelpMenuAdmin
	*/
	class HelpMenuAdmin
	{
		public static function SideMenu()
		{
			$action = \Request::route()->action['as'] ?? '';
			$auth_user = \Auth::user();

			if (HelpAdmin::IsUserDeveloper())
			{
				
				return [
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
					// Site
					[
						'permission'=>'#',
						'label'=>'Site',
						'url'=>'site.index',
						'icon'=>'fa fa-globe',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['site.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['site.index'])) ? 'true' : '',
					],
	
					// MENU Desenvolvedor
					[
						'permission'=>'adm.menu_developer',
						'name_menu'=>'Desenvolvedor',
					],
					// Usuários
					[
						'permission'=>'adm.menu_users',
						'label'=>'Usuários',
						'url'=>'#',
						'link_btn'=>'user_id',
						'icon'=>'fa fa-users',
	
						'a-active'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.users.list',
								'active_page'=>(in_array($action, ['adm.users.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo usuário',
								'url'=>'adm.users.new',
								'active_page'=>(in_array($action, ['adm.users.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Grupo
					[
						'permission'=>'adm.menu_groups',
						'label'=>'Grupo',
						'url'=>'#',
						'link_btn'=>'group_id',
						'icon'=>'fa fa-th-large',
	
						'a-active'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.groups.list',
								'active_page'=>(in_array($action, ['adm.groups.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo grupo',
								'url'=>'adm.groups.new',
								'active_page'=>(in_array($action, ['adm.groups.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Permissões
					[
						'permission'=>'adm.menu_created_permissions',
						'label'=>'Permissões',
						'url'=>'#',
						'link_btn'=>'permi_id',
						'icon'=>'fa fa-list',
						'line'=>false,

						'a-active'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.created_permissions.list',
								'active_page'=>(in_array($action, ['adm.created_permissions.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novas permissões',
								'url'=>'adm.created_permissions.new',
								'active_page'=>(in_array($action, ['adm.created_permissions.new'])) ? 'active-page' : '',
							],
						],
					],

					// MENU Site
					[
						'permission'=>'adm.menu_site',
						'name_menu'=>'Posts / Sliders',
					],
					// Arquivos disponíveis
					[
						'permission'=>'adm.files.all_files',
						'label'=>'Arquivos disponíveis',
						'url'=>'adm.files.all_files',
						'icon'=>'fa fa-files-o',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.files.all_files'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.files.all_files'])) ? 'true' : '',
					],
					// Notícias
					[
						'permission'=>'adm.menu_posts',
						'label'=>'Notícias',
						'url'=>'#',
						'link_btn'=>'post_id',
						'icon'=>'fa fa-file-text-o',
	
						'a-active'=>(in_array($action, [
							'adm.posts.list',
							'adm.post.new',
							'adm.post.edit',
							'adm.post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.posts.list',
							'adm.post.new',
							'adm.post.edit',
							'adm.post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.posts.list',
							'adm.post.new',
							'adm.post.edit',
							'adm.post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.posts.list',
								'active_page'=>(in_array($action, ['adm.posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova notícia',
								'url'=>'adm.post.new',
								'active_page'=>(in_array($action, ['adm.post.new'])) ? 'active-page' : '',
							],
							[
								'label'=>'Notícias excluidas',
								'url'=>'adm.posts.excluded_list',
								'active_page'=>(in_array($action, ['adm.posts.excluded_list'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Noticias destacadas
					[
						'permission'=>'adm.menu_featured_post',
						'label'=>'Noticias destacadas',
						'url'=>'#',
						'link_btn'=>'featured_post_id',
						'icon'=>'fa fa-sliders',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.featured_post.list',
							'adm.featured_post.new',
							'adm.featured_post.edit',
							'adm.featured_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.featured_post.list',
							'adm.featured_post.new',
							'adm.featured_post.edit',
							'adm.featured_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.featured_post.list',
							'adm.featured_post.new',
							'adm.featured_post.edit',
							'adm.featured_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.featured_post.list',
								'active_page'=>(in_array($action, ['adm.featured_post.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo destaque',
								'url'=>'adm.featured_post.new',
								'active_page'=>(in_array($action, ['adm.featured_post.new'])) ? 'active-page' : '',
							],
						],
					],
					// Categorias
					[
						'permission'=>'adm.menu_category_post',
						'label'=>'Categorias',
						'url'=>'#',
						'link_btn'=>'category_post_id',
						'icon'=>'fa fa-list',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.categories_posts.list',
							'adm.category_post.new',
							'adm.category_post.edit',
							'adm.category_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.categories_posts.list',
							'adm.category_post.new',
							'adm.category_post.edit',
							'adm.category_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.categories_posts.list',
							'adm.category_post.new',
							'adm.category_post.edit',
							'adm.category_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.categories_posts.list',
								'active_page'=>(in_array($action, ['adm.categories_posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova categoria',
								'url'=>'adm.category_post.new',
								'active_page'=>(in_array($action, ['adm.category_post.new'])) ? 'active-page' : '',
							],
						],
					],
					// Tags
					[
						'permission'=>'adm.menu_tag_post',
						'label'=>'Tags',
						'url'=>'#',
						'link_btn'=>'tag_post_id',
						'icon'=>'fa fa-list',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.tags_posts.list',
							'adm.tag_post.new',
							'adm.tag_post.edit',
							'adm.tag_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.tags_posts.list',
							'adm.tag_post.new',
							'adm.tag_post.edit',
							'adm.tag_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.tags_posts.list',
							'adm.tag_post.new',
							'adm.tag_post.edit',
							'adm.tag_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.tags_posts.list',
								'active_page'=>(in_array($action, ['adm.tags_posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova tag',
								'url'=>'adm.tag_post.new',
								'active_page'=>(in_array($action, ['adm.tag_post.new'])) ? 'active-page' : '',
							],
						],
					],
					// Status
					[
						'permission'=>'adm.menu_status_post',
						'label'=>'Status',
						'url'=>'#',
						'link_btn'=>'status_post_id',
						'icon'=>'fa fa-list',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.status_posts.list',
							'adm.status_post.new',
							'adm.status_post.edit',
							'adm.status_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.status_posts.list',
							'adm.status_post.new',
							'adm.status_post.edit',
							'adm.status_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.status_posts.list',
							'adm.status_post.new',
							'adm.status_post.edit',
							'adm.status_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.status_posts.list',
								'active_page'=>(in_array($action, ['adm.status_posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo status',
								'url'=>'adm.status_post.new',
								'active_page'=>(in_array($action, ['adm.status_post.new'])) ? 'active-page' : '',
							],
						],
					],
					// Sliders
					[
						'permission'=>'adm.menu_sliders_site',
						'label'=>'Sliders',
						'url'=>'#',
						'link_btn'=>'slider_site_id',
						'icon'=>'fa fa-sliders',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.slider_site.list',
							'adm.slider_site.new',
							'adm.slider_site.edit',
							'adm.slider_site.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.slider_site.list',
							'adm.slider_site.new',
							'adm.slider_site.edit',
							'adm.slider_site.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.slider_site.list',
							'adm.slider_site.new',
							'adm.slider_site.edit',
							'adm.slider_site.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.slider_site.list',
								'active_page'=>(in_array($action, ['adm.slider_site.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo slider',
								'url'=>'adm.slider_site.new',
								'active_page'=>(in_array($action, ['adm.slider_site.new'])) ? 'active-page' : '',
							],
						],
					],

					// MENU Pesquisas
					[
						'permission'=>'adm.menu_evaluations',
						'name_menu'=>'Pesquisas / Relatórios',
					],
					// Pesquisas
					[
						'permission'=>'adm.menu_evaluations',
						'label'=>'Pesquisas',
						'url'=>'#',
						'link_btn'=>'evaluation_id',
						'icon'=>'fa fa-newspaper-o',
	
						'a-active'=>(in_array($action, [
							'adm.evaluation.list',
							'adm.evaluation.new',
							'adm.evaluation.edit',
							'adm.evaluation.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.evaluation.list',
							'adm.evaluation.new',
							'adm.evaluation.edit',
							'adm.evaluation.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.evaluation.list',
							'adm.evaluation.new',
							'adm.evaluation.edit',
							'adm.evaluation.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.evaluation.list',
								'active_page'=>(in_array($action, ['adm.evaluation.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova pesquisa',
								'url'=>'adm.evaluation.new',
								'active_page'=>(in_array($action, ['adm.evaluation.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],

					// fa fa-newspaper-o
				];

			} elseif (HelpAdmin::IsUserAdministrator())
			{

				return [
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
					// Site
					[
						'permission'=>'#',
						'label'=>'Site',
						'url'=>'site.index',
						'icon'=>'fa fa-globe',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['site.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['site.index'])) ? 'true' : '',
					],
	
					// MENU Desenvolvedor
					[
						'permission'=>'adm.menu_developer',
						'name_menu'=>'Desenvolvedor',
					],
					// Usuários
					[
						'permission'=>'adm.menu_users',
						'label'=>'Usuários',
						'url'=>'#',
						'link_btn'=>'user_id',
						'icon'=>'fa fa-users',
	
						'a-active'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.users.list',
								'active_page'=>(in_array($action, ['adm.users.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo usuário',
								'url'=>'adm.users.new',
								'active_page'=>(in_array($action, ['adm.users.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Grupo
					[
						'permission'=>'adm.menu_groups',
						'label'=>'Grupo',
						'url'=>'#',
						'link_btn'=>'group_id',
						'icon'=>'fa fa-th-large',
	
						'a-active'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.groups.list',
								'active_page'=>(in_array($action, ['adm.groups.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo grupo',
								'url'=>'adm.groups.new',
								'active_page'=>(in_array($action, ['adm.groups.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Permissões
					[
						'permission'=>'adm.menu_created_permissions',
						'label'=>'Permissões',
						'url'=>'#',
						'link_btn'=>'permi_id',
						'icon'=>'fa fa-list',
						'line'=>true,

						'a-active'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.created_permissions.list',
								'active_page'=>(in_array($action, ['adm.created_permissions.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novas permissões',
								'url'=>'adm.created_permissions.new',
								'active_page'=>(in_array($action, ['adm.created_permissions.new'])) ? 'active-page' : '',
							],
						],
					],

					// MENU Site
					[
						'permission'=>'adm.menu_site',
						'name_menu'=>'Site',
					],
					// Arquivos disponíveis
					[
						'permission'=>'adm.files.all_files',
						'label'=>'Arquivos disponíveis',
						'url'=>'adm.files.all_files',
						'icon'=>'fa fa-files-o',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.files.all_files'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.files.all_files'])) ? 'true' : '',
					],
					// Notícias
					[
						'permission'=>'adm.menu_posts',
						'label'=>'Notícias',
						'url'=>'#',
						'link_btn'=>'post_id',
						'icon'=>'fa fa-file-text-o',
	
						'a-active'=>(in_array($action, [
							'adm.posts.list',
							'adm.post.new',
							'adm.post.edit',
							'adm.post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.posts.list',
							'adm.post.new',
							'adm.post.edit',
							'adm.post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.posts.list',
							'adm.post.new',
							'adm.post.edit',
							'adm.post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.posts.list',
								'active_page'=>(in_array($action, ['adm.posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova notícia',
								'url'=>'adm.post.new',
								'active_page'=>(in_array($action, ['adm.post.new'])) ? 'active-page' : '',
							],
							[
								'label'=>'Notícias excluidas',
								'url'=>'adm.posts.excluded_list',
								'active_page'=>(in_array($action, ['adm.posts.excluded_list'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Sliders
					[
						'permission'=>'adm.menu_sliders_site',
						'label'=>'Sliders',
						'url'=>'#',
						'link_btn'=>'slider_site_id',
						'icon'=>'fa fa-sliders',
	
						'a-active'=>(in_array($action, [
							'adm.slider_site.list',
							'adm.slider_site.new',
							'adm.slider_site.edit',
							'adm.slider_site.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.slider_site.list',
							'adm.slider_site.new',
							'adm.slider_site.edit',
							'adm.slider_site.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.slider_site.list',
							'adm.slider_site.new',
							'adm.slider_site.edit',
							'adm.slider_site.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.slider_site.list',
								'active_page'=>(in_array($action, ['adm.slider_site.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo slider',
								'url'=>'adm.slider_site.new',
								'active_page'=>(in_array($action, ['adm.slider_site.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Noticias destacadas
					[
						'permission'=>'adm.menu_featured_post',
						'label'=>'Noticias destacadas',
						'url'=>'#',
						'link_btn'=>'featured_post_id',
						'icon'=>'fa fa-sliders',
						'line'=>true,
	
						'a-active'=>(in_array($action, [
							'adm.featured_post.list',
							'adm.featured_post.new',
							'adm.featured_post.edit',
							'adm.featured_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.featured_post.list',
							'adm.featured_post.new',
							'adm.featured_post.edit',
							'adm.featured_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.featured_post.list',
							'adm.featured_post.new',
							'adm.featured_post.edit',
							'adm.featured_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.featured_post.list',
								'active_page'=>(in_array($action, ['adm.featured_post.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo destaque',
								'url'=>'adm.featured_post.new',
								'active_page'=>(in_array($action, ['adm.featured_post.new'])) ? 'active-page' : '',
							],
						],
					],
					// Categorias
					[
						'permission'=>'adm.menu_category_post',
						'label'=>'Categorias',
						'url'=>'#',
						'link_btn'=>'category_post_id',
						'icon'=>'fa fa-list',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.categories_posts.list',
							'adm.category_post.new',
							'adm.category_post.edit',
							'adm.category_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.categories_posts.list',
							'adm.category_post.new',
							'adm.category_post.edit',
							'adm.category_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.categories_posts.list',
							'adm.category_post.new',
							'adm.category_post.edit',
							'adm.category_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.categories_posts.list',
								'active_page'=>(in_array($action, ['adm.categories_posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova categoria',
								'url'=>'adm.category_post.new',
								'active_page'=>(in_array($action, ['adm.category_post.new'])) ? 'active-page' : '',
							],
						],
					],
					// Tags
					[
						'permission'=>'adm.menu_tag_post',
						'label'=>'Tags',
						'url'=>'#',
						'link_btn'=>'tag_post_id',
						'icon'=>'fa fa-list',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.tags_posts.list',
							'adm.tag_post.new',
							'adm.tag_post.edit',
							'adm.tag_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.tags_posts.list',
							'adm.tag_post.new',
							'adm.tag_post.edit',
							'adm.tag_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.tags_posts.list',
							'adm.tag_post.new',
							'adm.tag_post.edit',
							'adm.tag_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.tags_posts.list',
								'active_page'=>(in_array($action, ['adm.tags_posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova tag',
								'url'=>'adm.tag_post.new',
								'active_page'=>(in_array($action, ['adm.tag_post.new'])) ? 'active-page' : '',
							],
						],
					],
					// Status
					[
						'permission'=>'adm.menu_status_post',
						'label'=>'Status',
						'url'=>'#',
						'link_btn'=>'status_post_id',
						'icon'=>'fa fa-list',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.status_posts.list',
							'adm.status_post.new',
							'adm.status_post.edit',
							'adm.status_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.status_posts.list',
							'adm.status_post.new',
							'adm.status_post.edit',
							'adm.status_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.status_posts.list',
							'adm.status_post.new',
							'adm.status_post.edit',
							'adm.status_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.status_posts.list',
								'active_page'=>(in_array($action, ['adm.status_posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo status',
								'url'=>'adm.status_post.new',
								'active_page'=>(in_array($action, ['adm.status_post.new'])) ? 'active-page' : '',
							],
						],
					],

					// fa fa-newspaper-o
				];

			} elseif (HelpAdmin::IsUserCollaborator())
			{

				return [
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
					// Site
					[
						'permission'=>'#',
						'label'=>'Site',
						'url'=>'site.index',
						'icon'=>'fa fa-globe',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['site.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['site.index'])) ? 'true' : '',
					],

					// MENU Site
					[
						'permission'=>'adm.menu_site',
						'name_menu'=>'Posts / Sliders',
					],
					// Arquivos disponíveis
					[
						'permission'=>'adm.files.all_files',
						'label'=>'Arquivos disponíveis',
						'url'=>'adm.files.all_files',
						'icon'=>'fa fa-files-o',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.files.all_files'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.files.all_files'])) ? 'true' : '',
					],
					// Notícias
					[
						'permission'=>'adm.menu_posts',
						'label'=>'Notícias',
						'url'=>'#',
						'link_btn'=>'post_id',
						'icon'=>'fa fa-file-text-o',
	
						'a-active'=>(in_array($action, [
							'adm.posts.list',
							'adm.post.new',
							'adm.post.edit',
							'adm.post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.posts.list',
							'adm.post.new',
							'adm.post.edit',
							'adm.post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.posts.list',
							'adm.post.new',
							'adm.post.edit',
							'adm.post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.posts.list',
								'active_page'=>(in_array($action, ['adm.posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova notícia',
								'url'=>'adm.post.new',
								'active_page'=>(in_array($action, ['adm.post.new'])) ? 'active-page' : '',
							],
							[
								'label'=>'Notícias excluidas',
								'url'=>'adm.posts.excluded_list',
								'active_page'=>(in_array($action, ['adm.posts.excluded_list'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Noticias destacadas
					[
						'permission'=>'adm.menu_featured_post',
						'label'=>'Noticias destacadas',
						'url'=>'#',
						'link_btn'=>'featured_post_id',
						'icon'=>'fa fa-sliders',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.featured_post.list',
							'adm.featured_post.new',
							'adm.featured_post.edit',
							'adm.featured_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.featured_post.list',
							'adm.featured_post.new',
							'adm.featured_post.edit',
							'adm.featured_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.featured_post.list',
							'adm.featured_post.new',
							'adm.featured_post.edit',
							'adm.featured_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.featured_post.list',
								'active_page'=>(in_array($action, ['adm.featured_post.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo destaque',
								'url'=>'adm.featured_post.new',
								'active_page'=>(in_array($action, ['adm.featured_post.new'])) ? 'active-page' : '',
							],
						],
					],
					// Categorias
					[
						'permission'=>'adm.menu_category_post',
						'label'=>'Categorias',
						'url'=>'#',
						'link_btn'=>'category_post_id',
						'icon'=>'fa fa-list',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.categories_posts.list',
							'adm.category_post.new',
							'adm.category_post.edit',
							'adm.category_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.categories_posts.list',
							'adm.category_post.new',
							'adm.category_post.edit',
							'adm.category_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.categories_posts.list',
							'adm.category_post.new',
							'adm.category_post.edit',
							'adm.category_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.categories_posts.list',
								'active_page'=>(in_array($action, ['adm.categories_posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova categoria',
								'url'=>'adm.category_post.new',
								'active_page'=>(in_array($action, ['adm.category_post.new'])) ? 'active-page' : '',
							],
						],
					],
					// Tags
					[
						'permission'=>'adm.menu_tag_post',
						'label'=>'Tags',
						'url'=>'#',
						'link_btn'=>'tag_post_id',
						'icon'=>'fa fa-list',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.tags_posts.list',
							'adm.tag_post.new',
							'adm.tag_post.edit',
							'adm.tag_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.tags_posts.list',
							'adm.tag_post.new',
							'adm.tag_post.edit',
							'adm.tag_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.tags_posts.list',
							'adm.tag_post.new',
							'adm.tag_post.edit',
							'adm.tag_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.tags_posts.list',
								'active_page'=>(in_array($action, ['adm.tags_posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova tag',
								'url'=>'adm.tag_post.new',
								'active_page'=>(in_array($action, ['adm.tag_post.new'])) ? 'active-page' : '',
							],
						],
					],
					// Status
					[
						'permission'=>'adm.menu_status_post',
						'label'=>'Status',
						'url'=>'#',
						'link_btn'=>'status_post_id',
						'icon'=>'fa fa-list',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.status_posts.list',
							'adm.status_post.new',
							'adm.status_post.edit',
							'adm.status_post.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.status_posts.list',
							'adm.status_post.new',
							'adm.status_post.edit',
							'adm.status_post.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.status_posts.list',
							'adm.status_post.new',
							'adm.status_post.edit',
							'adm.status_post.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.status_posts.list',
								'active_page'=>(in_array($action, ['adm.status_posts.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo status',
								'url'=>'adm.status_post.new',
								'active_page'=>(in_array($action, ['adm.status_post.new'])) ? 'active-page' : '',
							],
						],
					],
					// Sliders
					[
						'permission'=>'adm.menu_sliders_site',
						'label'=>'Sliders',
						'url'=>'#',
						'link_btn'=>'slider_site_id',
						'icon'=>'fa fa-sliders',
						'line'=>false,
	
						'a-active'=>(in_array($action, [
							'adm.slider_site.list',
							'adm.slider_site.new',
							'adm.slider_site.edit',
							'adm.slider_site.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.slider_site.list',
							'adm.slider_site.new',
							'adm.slider_site.edit',
							'adm.slider_site.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.slider_site.list',
							'adm.slider_site.new',
							'adm.slider_site.edit',
							'adm.slider_site.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.slider_site.list',
								'active_page'=>(in_array($action, ['adm.slider_site.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo slider',
								'url'=>'adm.slider_site.new',
								'active_page'=>(in_array($action, ['adm.slider_site.new'])) ? 'active-page' : '',
							],
						],
					],

					// MENU Pesquisas
					[
						'permission'=>'adm.menu_evaluations',
						'name_menu'=>'Pesquisas / Relatórios',
					],
					// Pesquisas
					[
						'permission'=>'adm.menu_evaluations',
						'label'=>'Pesquisas',
						'url'=>'#',
						'link_btn'=>'evaluation_id',
						'icon'=>'fa fa-newspaper-o',
	
						'a-active'=>(in_array($action, [
							'adm.evaluation.list',
							'adm.evaluation.new',
							'adm.evaluation.edit',
							'adm.evaluation.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.evaluation.list',
							'adm.evaluation.new',
							'adm.evaluation.edit',
							'adm.evaluation.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.evaluation.list',
							'adm.evaluation.new',
							'adm.evaluation.edit',
							'adm.evaluation.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.evaluation.list',
								'active_page'=>(in_array($action, ['adm.evaluation.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova pesquisa',
								'url'=>'adm.evaluation.new',
								'active_page'=>(in_array($action, ['adm.evaluation.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],

					// fa fa-newspaper-o
				];

			} else
			{
				return [
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
				];
			}
		}
	}