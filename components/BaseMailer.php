<?php

namespace app\components;

use \app\models\ScheduledEmailTask;


class BaseMailer extends \Yii\base\Object
{
    public $mail;

    /**
     * Initialise mailer with configuration
     */
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

        $this->mail->Host = \Yii::$app->params['mailHost'];
        $this->mail->Username = \Yii::$app->params['mailUsername'];
        $this->mail->Password = \Yii::$app->params['mailPassword'];
        $this->mail->From = \Yii::$app->params['mailFrom'];
        $this->mail->FromName = \Yii::$app->params['mailFromName'];

        $this->mail->status = ScheduledEmailTask::STATUS_IDLE;
    }

    public function send()
    {
        if(!$this->mail->send())
            die('Unable to send mail.');
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
}
