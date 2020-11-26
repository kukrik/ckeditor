<?php require(QCUBED_CONFIG_DIR . '/header.inc.php'); ?>
	<script>
		ckConfig = {
			skin: 'moono'//,
			//language: 'fr',
			//uiColor: '#9AB8F3'
			/*toolbar: [
				{ name: 'clipboard', items: [ 'PasteFromWord', '-', 'Undo', 'Redo' ] },
				{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'Subscript', 'Superscript' ] },
				{ name: 'links', items: [ 'Link', 'Unlink' ] },
				{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
				{ name: 'insert', items: [ 'Image', 'Table' ] },
				{ name: 'editing', items: [ 'Scayt' ] },
				'/',

				{ name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
				{ name: 'colors', items: [ 'TextColor', 'BGColor', 'CopyFormatting' ] },
				{ name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
				{ name: 'document', items: [ 'Print', 'Source' ] }
			],

			// Enabling extra plugins, available in the full-all preset: https://ckeditor.com/cke4/presets
			extraPlugins: 'colorbutton,font,justify,print,tableresize,pastefromword,liststyle',
			removeButtons: '',

			// Make the editing area bigger than default.
			height: 350//,
			//width: 940*/
		};


	</script>
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


<?php

// https://ckeditor.com/cke4/addon/btquicktable
// https://ckeditor.com/cke4/addon/filebrowser
// https://ckeditor.com/cke4/addon/templates

// https://ckeditor.com/docs/ckeditor4/latest/guide/widget_sdk_tutorial_1.html
// https://ckeditor.com/docs/ckeditor4/latest/guide/widget_sdk_tutorial_2.html
// https://ckeditor.com/cke4/addon/stylesheetparser


?>
