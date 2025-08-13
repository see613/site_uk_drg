<?php

class MailService extends CApplicationComponent {

    public $smtp = array();
    public $host = 'localhost:25';
    public $sender = 'noreply@server.ru';
    public $name_sender = 'Feedback';
    public $pathViews = null;
    public $pathLayouts = null;

    public function send($data = array()) {

        $mailer = Yii::createComponent('application.components.MailService.EMailer');
        $mailer->IsHTML(true);

        if (is_array($this->smtp)) {
            $mailer->IsSMTP();

            if (!empty($this->smtp)) {}
        }

        //$mailer->SMTPDebug = 3;
        $mailer->SMTPAuth   = true;
        //$mailer->SMTPSecure = 'tls';

        $mailer->Host       = "smtp.sendgrid.net";
        $mailer->Port       = 587;
        $mailer->Username   = "apikey";
        $mailer->Password   = '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';

        $mailer->From = 'info@drainrepairguy.co.uk';
        $mailer->FromName = $mailer->From;
        $mailer->AddReplyTo($mailer->From);


        $mailer->Subject = $data['subject'];
        $mailer->CharSet = 'UTF-8';
        $mailer->Body = $data['body'];

        if(!is_array($data['email'])){
            $data['email'] = array( $data['email'] );
        }

        foreach($data['email'] as $email){
            $mailer->AddAddress($email);
        }

        return $mailer->Send();
    }
}
