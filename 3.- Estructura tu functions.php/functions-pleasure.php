<?php

	# CUSTOM DEFINES
	define( "SITE_NAME"  , '' );
	define( "SITE_URL"   , get_bloginfo('url') );
	define( "THEME_URL"  , get_template_directory_uri() );

	# THEME SUPPORT
	add_theme_support( 'menus' );
	add_theme_support( 'widgets' );
	add_theme_support( 'post-thumbnails' );

	# GENERAL
	include( TEMPLATEPATH . "/hooks/wp-init.php" );

	# POST TYPES : Common
	include( TEMPLATEPATH . "/hooks/post-types/_common/metaboxes.php" );
	include( TEMPLATEPATH . "/hooks/post-types/_common/columns.php" );
	include( TEMPLATEPATH . "/hooks/post-types/_common/save.php" );
	include( TEMPLATEPATH . "/hooks/post-types/_common/functions.php" );

	# POST TYPES : News
	include( TEMPLATEPATH . "/hooks/post-types/news/register.php" );
	include( TEMPLATEPATH . "/hooks/post-types/news/permalinks.php" );

	# POST TYPES : Client
	include( TEMPLATEPATH . "/hooks/post-types/client/register.php" );
	include( TEMPLATEPATH . "/hooks/post-types/client/permalinks.php" );
	include( TEMPLATEPATH . "/hooks/post-types/client/metaboxes.php" );
	include( TEMPLATEPATH . "/hooks/post-types/client/order.php" );

	# POST TYPE: Pages
	include( TEMPLATEPATH . "/hooks/post-types/page/init.php" );
	include( TEMPLATEPATH . "/hooks/post-types/page/metaboxes.php" );
	include( TEMPLATEPATH . "/hooks/post-types/page/order.php" );
	include( TEMPLATEPATH . "/hooks/post-types/page/columns.php" );
	include( TEMPLATEPATH . "/hooks/post-types/page/save.php" );


	# UTILS
	include( TEMPLATEPATH . "/hooks/tools/utils.php" );
	include( TEMPLATEPATH . "/hooks/tools/debug.php" );
	include( TEMPLATEPATH . "/hooks/tools/shortcodes.php" );
	include( TEMPLATEPATH . "/hooks/tools/attachments.php" );

	# ADMIN
	include( TEMPLATEPATH . "/hooks/admin/dashboard-setup.php" );
	include( TEMPLATEPATH . "/hooks/admin/menu.php" );
	include( TEMPLATEPATH . "/hooks/admin/login.php" );
	include( TEMPLATEPATH . "/hooks/admin/tinymce.php" );
	include( TEMPLATEPATH . "/hooks/admin/nav-menu-walker.php" );
	include( TEMPLATEPATH . "/hooks/admin/nav-menu.php" );

	# AJAX
	include( TEMPLATEPATH . "/hooks/ajax/newsletter.php" );

	# PLUGINS
	include( TEMPLATEPATH . "/hooks/plugins/yoast.php" );

	# HOOKS - FRONTEND
	include( TEMPLATEPATH . "/hooks/theme/enquescripts.php" );
	include( TEMPLATEPATH . "/hooks/theme/enquestyles.php" );

	# TOOLS
	include( TEMPLATEPATH . "/hooks/tools/wp_bootstrap_navwalker.php" );

	# SETTINGS PAGE
	include( TEMPLATEPATH . "/hooks/settings/icons.php" );


?>