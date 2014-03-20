<?php

namespace app\components;

use \app\models\ScheduledEmailTask;
use \yii\base\HttpException;


class BaseMailer extends \Yii\base\Object
{
    public $mail;

    public $host = 'mail.doublehops.com';
    public $username = 'damien@doublehops.com';
    public $password = 'dbSduis_923!1';

    public $from = 'damien@doublehops.com';
    public $fromName = 'Coin Hawk';

    public function init()
    {
        parent::init();

        $this->mail = new \PHPMailer();
        $this->mail->IsSMTP();
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPDebug = 0;
        $this->mail->IsHTML(true);

        $this->mail->Host = $this->host;
        $this->mail->Username = $this->username;
        $this->mail->Password = $this->password;
        $this->mail->From = $this->from;
        $this->mail->FromName = $this->fromName;

        $this->mail->status = ScheduledEmailTask::STATUS_IDLE;
    }

    public function send()
    {
        if(!$this->mail->send())
            throw new Exception(500, 'Unable to send email');
    }    

    public function addAddress($address, $name=null)
    {
        if($name != null)
            $this->mail->addAddress($address, $name);
        else
            $this->mail->addAddress($address);
    }

    public function addSubject($subject)
    {
        $this->mail->Subject = $subject;
    }

    public function addBody($body)
    {
        $this->mail->Body = $body;
    }

    /**
     * @todo: Get renderView to work within the component so body can be called 
     * with, for eg. $mail->addBody('_newMarket', ['market'=>$market]);
     *
     * Add body by passing the view and variables
     */
    public function addBodyNew($view, $params=array())
    {
        $content = \Yii\base\Controller::renderPartial('//mail/'. $view, $params, true);
        $body = \Yii\base\Controller::renderPartial('//mail/template', ['content'=>$content], true);
        $this->mail->Body = $body;
    }
}
