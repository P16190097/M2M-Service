<?php
/**
 * loginForm.php
 *
 * Form for authenticating users
 *
 * @author Joshua Mayo, Sophie Hughes, Kieran McCrory
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/login', function (Request $request, Response $response) use ($app) {

    $html_output = $this->view->render($response,
        'loginForm.html.twig',
        [
            'css_path' => CSS_PATH,
            'js_path' => JS_PATH,
            'landing_page' => LANDING_PAGE,
            'sendMessage_page' => 'sendMessage',
            'analytics_page' => 'analytics',
            'auth_page' => isset($_SESSION['user']) ? 'processLogout' : 'login',
            'auth_text' => isset($_SESSION['user']) ? 'Sign out' : 'Sign in',
            'SignUp_page' => 'signUp',
            'method' => 'post',
            'action' => 'performLogin',
            'initial_input_box_value' => null,
            'page_title' => APP_NAME,
            'page_heading_1' => APP_NAME,
            'page_heading_2' => 'Sign In',
            'logo_path' => '/CTEC3110-Coursework/media/android-chrome-512x512.png',
            'error_text' => '',
        ]
    );

    return $html_output;

})->setName('login');