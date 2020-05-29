<?php require(QCUBED_CONFIG_DIR . '/header.inc.php'); ?>
<?php $this->RenderBegin(); ?>

	<div class="instructions">
        <h1 class="instruction_title">CKEditor: Implementation of the CKEditor HTML editor.</h1>
        <p>
            <b>CKEditor</b> implements the <a href="https://ckeditor.com/ckeditor-4/">CKEditor HTML editor</a>. It allows you
            to create a text editing block with full HTML editing capabilities. The text returned from it is HTML.
        </p>
        <?= _r($this->txtEditor); ?>
        <p><?= _r($this->btnSubmit); ?></p>
        <h3>The HTML you typed:</h3>
        <?= _r($this->pnlResult); ?>
    </div>

<?php $this->RenderEnd(); ?>
<?php require(QCUBED_CONFIG_DIR . '/footer.inc.php'); ?>