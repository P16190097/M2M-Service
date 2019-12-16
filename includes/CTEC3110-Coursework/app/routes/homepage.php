<?php
/**
 * homepage.php
 *
 * Display the Message application homepage
 *
 * @author Joshua Mayo, Sophie Hughes, Kieran McCrory
 *
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;




$app->get('/', function (Request $request, Response $response) use ($app) {

    $process_message = $app->getContainer()->get('processMessage');

    $fetch_result = $process_message->getMessages($app);
    $message_list = $process_message->returnMessages($app);

    $html_output = $this->view->render($response,
        'homepagetable.html.twig',
        [
            'css_path' => CSS_PATH,
            'js_path' => JS_PATH,
            'landing_page' => LANDING_PAGE,
            'sendMessage_page' => 'sendMessage',
            'analytics_page' => 'analytics',
            'page_title' => APP_NAME,
            'page_heading_1' => APP_NAME,
            'page_heading_2' => 'Messages',
            'message_list' => $message_list,
            'message' => is_string($message_list) ? $message_list : $fetch_result ? $fetch_result : '',
        ]
    );

    return $html_output;

})->setName('homepage');
