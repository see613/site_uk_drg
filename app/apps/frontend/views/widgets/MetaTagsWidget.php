<?php

class MetaTagsWidget extends CWidget
{
    public $currentPage;

    public $name = 'Drain Repair Guy Limited';
    private $tags = array(
        'default'=>'index',

        'index'=>array(
            'title'=>'Blocked Drains Specialists in Essex and Kent',
            'description'=>'Unblock Drains Fast. No Clear, No Fee. 24/7 Emergency Callout. CCTV drain surveys, no-dig excavations. Free no-obligation quotes. Call today 07498 291 675',
            'keywords'=>''
        ),
        'contact'=>array(
            'title'=>'',
            'description'=>'',
            'keywords'=>''
        ),
    );


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (empty($this->currentPage)) {
            throw new Exception('the current page isn\'t specified');
        }

        if (isset($this->tags[$this->currentPage])) {
            $content = $this->tags[$this->currentPage];
        }
        else {
            $page = $this->tags['default'];
            $content = $this->tags[$page];
        }

        $this->render('meta', array(
            'content'=>$content
        ));
    }

}
?>