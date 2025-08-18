<?php

class DefaultController extends Controller {

    public function init(){
        parent::init();
    }

    public function actionIndex() {
        $this->activePage = 'index';

        $cs = Yii::app()->getClientScript();

        $cs->registerScriptFile('/js/pages/home.js?3');

        $this->render('index', []);
    }

    public function actionError()
    {
        $this->activePage = 'error';

        $error = Yii::app()->errorHandler->error;

        if($error['code'] == 404)
        {
            $this->render( 'error404' );
        }
        else {
            $this->render( 'error', array( 'error' => $error ) );
        }
    }

}

