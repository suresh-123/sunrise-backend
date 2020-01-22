<?php 
/**
 * Get URI path.
 * @return string $uri  Sanitized URI
 */
function getUri(): string {
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $splitUri = explode('/', $uri);
    array_shift($splitUri);
    return implode('/', $splitUri);
}

/**
 * Loads a view file
 * @param  string $view Example: 'index', 'about'
 * @param  array  $data Passing vars to the view
 * @return void
 */
function view(string $view, array $data = []) : void {   
  $file = APPLICATION_PATH . '/src/views/' . $view . '.php';
  // Check for view file
  if (is_readable($file)) {
    require_once $file;
  } else {
    // View does not exist
    die('<h1> 404 Page not found </h1>');
  }
}