<?php
/**
 * deleteUsers.php
 *
 * Route for deleting users from application.
 *
 * @author Joshua Mayo, Sophie Hughes, Kieran McCrory
 *
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->post('/deleteUsers', function (Request $request, Response $response) use ($app) {

    if (isset($_SESSION['PERMISSIONS']) && ($_SESSION['PERMISSIONS'] === '0' || $_SESSION['PERMISSIONS'] === '2')) {

        $error = null;
        $usersToDelete = $request->getParsedBody();

        $database = $app->getContainer()->get('databaseWrapper');
        $db_conf = $app->getContainer()->get('settings');
        $database->setDatabaseConnectionSettings($db_conf['pdo_settings']);

        try {
            foreach ($usersToDelete['users'] as $key => $user_id) {
                $database->deleteUser($user_id);
            }
        } catch (exception $exception) {
            $error = $exception->getMessage();
        }

        if ($error !== null) {
            $html_output = $this->view->render($response,
                'responseView.html.twig',
                [
                    'css_path' => CSS_PATH,
                    'js_path' => JS_PATH,
                    'landing_page' => LANDING_PAGE,
                    'sendMessage_page' => 'sendMessage',
                    'analytics_page' => 'analytics',
                    'auth_page' => isset($_SESSION['user']) ? 'processLogout' : 'login',
                    'auth_text' => isset($_SESSION['user']) ? 'Sign out' : 'Sign in',
                    'admin_dash' => isset($_SESSION['PERMISSIONS']) && ($_SESSION['PERMISSIONS'] === '0' || $_SESSION['PERMISSIONS'] === '2') ? 'adminDash' : null,
                    'SignUp_page' => 'signUp',
                    'page_title' => APP_NAME,
                    'page_heading_1' => APP_NAME,
                    'page_heading_2' => 'An error has occurred',
                    'error_msg' => 'Users could not be deleted',
                ]
            );

            return $html_output;
        }

        $html_output = $this->view->render($response,
            'responseView.html.twig',
            [
                'css_path' => CSS_PATH,
                'js_path' => JS_PATH,
                'landing_page' => LANDING_PAGE,
                'sendMessage_page' => 'sendMessage',
                'analytics_page' => 'analytics',
                'auth_page' => isset($_SESSION['user']) ? 'processLogout' : 'login',
                'auth_text' => isset($_SESSION['user']) ? 'Sign out' : 'Sign in',
                'admin_dash' => isset($_SESSION['PERMISSIONS']) && $_SESSION['PERMISSIONS'] === '0' ? 'adminDash' : null,
                'SignUp_page' => 'signUp',
                'page_title' => APP_NAME,
                'page_heading_1' => APP_NAME,
                'page_heading_2' => 'Delete Successful',
                'error_msg' => 'Users were successfully deleted',
            ]
        );

        return $html_output;

    } else {
        return $response->withRedirect(LANDING_PAGE);
    }

})->setName('deleteUsers');