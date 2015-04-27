<?php
/**
 * direct_action functions and definitions
 *
 * @package direct_action
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'anarchy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function anarchy_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on direct_action, use a find and replace
	 * to change 'anarchy' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'anarchy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'anarchy' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'anarchy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // anarchy_setup
add_action( 'after_setup_theme', 'anarchy_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function anarchy_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'anarchy' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'anarchy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function anarchy_scripts() {
	wp_enqueue_style( 'anarchy-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap',  get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );

	wp_enqueue_style( 'commons',  get_template_directory_uri() . '/css/commons.css', array( 'bootstrap' ) );

	wp_enqueue_script( 'anarchy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'anarchy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), '1.11.1' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array() );

	wp_enqueue_script( 'commons', get_template_directory_uri() . '/js/commons.js', array('jquery', 'bootstrap') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'anarchy_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  
  $first_img = $matches [1] [0];

// Если изображение отсутствует, то выводим изображение по умолчанию (указать путь к изображению)
  if(empty($first_img)){
    $first_img = get_bloginfo("template_url")."/images/rot-front.png";
    $first_img = false;
  }
  return $first_img;
}

/* Обрезка текста - excerpt
maxchar = количество символов.
text = какой текст обрезать (по умолчанию берется excerpt поста, если его нету, то content, если есть тег <!--more-->, то maxchar игнорируется и берется все, что до него, с сохранением HTML тегов )
save_format = Сохранять перенос строк или нет. По умолчанию сохраняется. Если в параметр указать определенные теги, то они НЕ будут вырезаться из обрезанного текста (пример: save_format=<strong><a> )
echo = выводить на экран или возвращать (return) для обработки.
П.с. Шоткоды вырезаются. Минимальное значение maxchar может быть 22.
*/
function kama_excerpt($args=''){
	global $post;
		parse_str($args, $i);
		$maxchar 	 = isset($i['maxchar']) ?  (int)trim($i['maxchar'])		: 350;
		$text 		 = isset($i['text']) ? 			trim($i['text'])		: '';
		$save_format = isset($i['save_format']) ?	trim($i['save_format'])	: false;
		$echo		 = isset($i['echo']) ? 			false		 			: true;

	if (!$text){
		$out = $post->post_excerpt ? $post->post_excerpt : $post->post_content;
		$out = preg_replace ("!\[/?.*\]!U", '', $out ); //убираем шоткоды, например:[singlepic id=3]
		// для тега <!--more-->
		if( !$post->post_excerpt && strpos($post->post_content, '<!--more-->') ){
			preg_match ('/(.*)<!--more-->/s', $out, $match);
			$out = str_replace("\r", '', trim($match[1], "\n"));
			$out = preg_replace( "!\n\n+!s", "</p><p>", $out );
			$out = '<p>'. str_replace( "\n", '<br />', $out ) .' <a href="'. get_permalink($post->ID) .'#more-'. $post->ID.'">Читать дальше...</a></p>';
			if ($echo)
				return print $out;
			return $out;
		}
	}

	$out = $text.$out;
	if (!$post->post_excerpt)
		$out = strip_tags($out, $save_format);

	if ( iconv_strlen($out, 'utf-8') > $maxchar ){
		$out = iconv_substr( $out, 0, $maxchar, 'utf-8' );
		$out = preg_replace('@(.*)\s[^\s]*$@s', '\\1 ...', $out); //убираем последнее слово, ибо оно в 99% случаев неполное
	}

	if($save_format){
		$out = str_replace( "\r", '', $out );
		$out = preg_replace( "!\n\n+!", "</p><p>", $out );
		$out = "<p>". str_replace ( "\n", "<br />", trim($out) ) ."</p>";
	}

	if($echo) return print $out;
	return $out;
}
// Панель навигации
function wp_corenavi() {
	global $wp_query;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	$a['total'] = $max;
	$a['current'] = $current;

	$total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
	$a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
	$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
	$a['prev_text'] = '<span class="glyphicon glyphicon-chevron-left"></span>'; //текст ссылки "Предыдущая страница"
	$a['next_text'] = '<span class="glyphicon glyphicon-chevron-right"></span>'; //текст ссылки "Следующая страница"

	if ($max > 1) echo '<div class="navigation">';
	// if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
	echo $pages . paginate_links($a);
	if ($max > 1) echo '</div>';
}



/*** ДОБАВЛение meta robots noindex,nofollow ДЛЯ СТРАНИЦ ***/
// function my_meta_noindex () {

// if (is_paged()){ // Все и страницы навигации
// 	echo «».'<meta name=»robots» content=»noindex,nofollow» />'.»\n»;
// }
// }

// add_action('wp_head', 'my_meta_noindex', 3); // добавляем noindex,nofollow в head