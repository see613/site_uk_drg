
<?php
$submitUrl = Yii::app()->baseUrl.'/contact/submitwidget';
$formId = 'feedback-form';

$form=$this->beginWidget('CActiveForm', array(
    'action'=>$submitUrl,
    'id' => $formId,
    'enableAjaxValidation' => true
)); ?>

    <h3 class="light-grey2 bold font-28 mb-20">
        Get in touch
    </h3>

    <div class="field-wrapper">
        <?php echo $form->textField($model, 'name', array(
            'placeholder'=>'Enter Name*'
        )); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
    <div class="field-wrapper">
        <?php echo $form->textField($model, 'email', array(
            'placeholder'=>'Enter Email*'
        )); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
    <div class="field-wrapper">
        <?php echo $form->textArea($model, 'message', array(
            'placeholder'=>'Type Message*'
        )); ?>
        <?php echo $form->error($model, 'message'); ?>
    </div>

    <div class="flex">
        <div>
            <?=$form->checkBox($model, 'allowance', ['uncheckValue'=>''])?>
        </div>
        <div>
            <label for="Feedback_allowance">By crossing this check box, you give permission to  to store your details for the purpose of contacting you only</label>
            <?=$form->error($model, 'allowance'); ?>
        </div>
        <div>
            <?php $this->widget('ReCaptchaWidget',
                array(
                    'theme'=>ReCaptchaWidget::THEME_LIGHT,
                    'publicKey' => RECAPTCHA_PUBLIC_KEY,
                    'language' => 'en'
                ), false); ?>

            <?php echo CHtml::submitButton(
                'SEND',
                array(
                    'class'=>"tr-2",
                    'id'=>"feedback-submit"
                ));
            ?>
        </div>
    </div>

<?php $this->endWidget(); ?>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="my-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Thank you for contacting us.<br />
                We will respond to you as soon as possible
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>