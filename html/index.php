<?php

// Load up our projects config file
include_once('../application/config/config.php');

// Identify this projects root web directory
$currentDirectory = substr($_SERVER['PHP_SELF'], 0 , strrpos($_SERVER['PHP_SELF'], 'index.php'));

// Assign the root web directory to a named constant so it can be referenced in project HTML links if needed.
defined('PROJECT_WEB_ROOT')
or define('PROJECT_WEB_ROOT', $currentDirectory);

// The controller should contain your business logic, and is processed first.
// You can inject the controllers variables into the view. We set it in the 'router' below, if needed.
$CONTROLLER = null;

// The view is page specific content. It's set it in the 'router' below.
$VIEW = null;

// The rendered view is injected into the layout last. It's set it in the 'router' below.
$LAYOUT = null;

// This is your web page's default title if you don't override it below
$title = null;

// Get the user's requested URL and put the folder paths into an array
$url = str_replace('?' . $_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);
$r = explode("/", $url);

// Route the requested URL
switch ($r[3])
{
    case '':
        $CONTROLLER = null;
        $VIEW = 'home';
        $LAYOUT = 'page';
        $title = 'My Awesome Web App';
        break;

    case 'about':
        $CONTROLLER = 'about';
        $VIEW = 'about';
        $LAYOUT = 'page';
        $title = 'About My Awesome Web App';
        break;

    default:
        default404();
}

function default404()
{
    global $CONTROLLER, $VIEW, $LAYOUT, $title;

    header('HTTP/1.0 404 Not Found');
    $title = "404 Page Not Found";
    $CONTROLLER = null;
    $VIEW = "404";
    $LAYOUT = "page";
}

// THIS IS WHERE THE MAGIC HAPPENS!
// 1st load controller
$vars = $renderedView = null;
if (!empty($CONTROLLER))
    include_once(APPLICATION_PATH . "/controllers/$CONTROLLER.php");
// 2nd render view
$renderedView = null;
if (!empty($VIEW))
    $renderedView = RenderPhpToString(APPLICATION_PATH . "/views/$VIEW.php", $vars);
// 3rd inject into layout
if (!empty($LAYOUT))
    $renderedView = RenderPhpToString(APPLICATION_PATH . "/views/layouts/$LAYOUT.php", array('content' => $renderedView, 'title' => $title));

// Display the final rendered page
echo $renderedView;

// used for layouts/views
// This renders a PHP file (our view) into a string so we can inject it into our layout
function RenderPhpToString($file, $vars = null)
{
    if (is_array($vars) && !empty($vars))
    {
        extract($vars);
    }
    ob_start();
    include $file;
    return ob_get_clean();
}

