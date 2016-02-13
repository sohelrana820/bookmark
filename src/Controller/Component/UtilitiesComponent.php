<?php
/**
 * @Author: Preview ICT Ltd.
 * @URI: http://previewict.com
 * @description: This component is creating doing the some extra work.
 */
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

class UtilitiesComponent extends Component
{
    public $name = 'Utilities';

    /**
     * @param null $query
     * @return array
     */
    public function buildUsesrListConditions($query = null)
    {
        $conditions = [];

        if(isset($query['gender']) && $query['gender']){
            if($query['gender'] == 'male'){
                $conditions = array_merge($conditions, ['Profiles.gender' => 1]);
            }
            else{
                $conditions = array_merge($conditions, ['Profiles.gender' => 2]);
            }
        }

        return $conditions;
    }

    /**
     * @param $data
     * @param $code
     */
    public function signupConfirmEmail($data, $code)
    {
        $app = new AppController();
        $subject = 'Create Account Confirmation - '.$app->appsName;
        $email = new Email('mandril');
        $link = $app->baseUrl.'/users/verify_email?code='.$code;

        $user = array(
            'to' => $data['username'],
            'name' => $data['profile']['first_name']. ' '.$data['profile']['last_name']
        );

        $data = array(
            'user' => $user,
            'appName'=> $app->appsName,
            'link'=> $link
        );

        $email->from([$app->emailFrom => $app->appsName])
            ->to($user['to'])
            ->subject($subject)
            ->theme($app->currentTheme)
            ->template('signup_confirmation')
            ->emailFormat('html')
            ->set(['data' => $data])
            ->send();
    }

    /**
     * @param $data
     * @param $code
     */
    public function forgotPassEmail($data, $code)
    {
        $app = new AppController();
        $subject = 'Forgot Password Link - '.$app->appsName;
        $email = new Email('mandril');
        $link = $app->baseUrl.'/users/reset_password?code='.$code;

        $user = array(
            'to' => $data['username'],
            'name' => $data['profile']['first_name']. ' '.$data['profile']['last_name']
        );

        $data = array(
            'user' => $user,
            'appName'=> $app->appsName,
            'link'=> $link
        );

        $email->from([$app->emailFrom => $app->appsName])
            ->to($user['to'])
            ->subject($subject)
            ->theme($app->currentTheme)
            ->template('forgot_password')
            ->emailFormat('html')
            ->set(['data' => $data])
            ->send();
    }

    /**
     * @param $data
     */
    public function passwordChangedEmail($data)
    {
        $app = new AppController();
        $subject = 'Password Changed - '.$app->appsName;
        $email = new Email('mandril');

        $user = array(
            'to' => $data['username'],
            'name' => $data['profile']['first_name']. ' '.$data['profile']['last_name']
        );

        $data = array(
            'user' => $user,
            'appName'=> $app->appsName,
        );

        $email->from([$app->emailFrom => $app->appsName])
            ->to($user['to'])
            ->subject($subject)
            ->theme($app->currentTheme)
            ->template('changed_password')
            ->emailFormat('html')
            ->set(['data' => $data])
            ->send();
    }

    public function uploadProfilePhoto($path, $documents)
    {
        $uploadFile = $path . '/' . $documents['name'];
        $fileName = $documents['name'];
        if (move_uploaded_file($documents['tmp_name'], $uploadFile)) {
            return $fileName;
        }
        return false;
    }
}
