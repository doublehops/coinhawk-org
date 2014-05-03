<?php

namespace app\commands;

use app\models\Exchange;
use app\models\Market;
use app\models\EmailRecipient;
use app\models\ScheduledEmailTask;
use yii\console\Controller;

class RunScheduledTasksController extends Controller
{
    public function actionSendNotifications()
    {
        $tasks = ScheduledEmailTask::find()->where(
                            'status=:status && scheduled_at<:current_time',
                                [':status' => ScheduledEmailTask::STATUS_SCHEDULED,
                                 ':current_time' => date('Y-m-d H:i:s'),
                                ]
                            )->all();

        foreach($tasks as $task) {

            $body = $this->renderPartial('//mail/template.php', ['content'=>$task->body], true);

            foreach($task->recipients as $recipient) {

                $mail = \Yii::createObject(['class'=>'app\components\BaseMailer']);
                $mail->addAddress($recipient->email, $recipient->name);
                $mail->addSubject($task->subject);
                $mail->addBody($body);
                $mail->send();
            }

            $task->status = ScheduledEmailTask::STATUS_COMPLETED;
            $task->save();
        }
    }
}

