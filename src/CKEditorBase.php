<?php
/**
 * This file contains the QCKEditor Class.
 */

namespace QCubed\Plugin;

use QCubed as Q;
use QCubed\Exception\Caller;
use QCubed\Exception\InvalidCast;
use QCubed\Project\Control\ControlBase;
use QCubed\Project\Control\FormBase;
use QCubed\Project\Control\TextBox;
use QCubed\Control\TextBoxBase;
use QCubed\Project\Application;
use QCubed\Type;

/**
 * Class CKEditorBase: For creating a Rich text editor with CKEditor
 *
 * @package QCubed\Plugin
 *
 * @property-write string $ReadyFunction JS function to pass to the ckeditor creation instance
 * @property-write string $Configuration Configuration options to pass to the ckeditor instance
 */
class CKEditorBase extends TextBoxBase {

	protected $strJsReadyFunc = 'function(){}';
	protected $strConfiguration = '{}';

	public function __construct($objParentObject, $strControlId = null) {
		parent::__construct($objParentObject, $strControlId);
		$this->registerFiles();

		$this->strCrossScripting = TextBox::XSS_ALLOW;
		$this->strTextMode = TextBoxBase::MULTI_LINE;
	}

	protected function registerFiles() {

		$this->AddJavascriptFile(QCUBED_CKEDITOR_ASSETS_URL . "/php/QCKSetup.js.php");
		$this->AddJavascriptFile(QCUBED_VENDOR_URL . "/ckeditor/ckeditor/ckeditor.js");
		$this->AddJavascriptFile(QCUBED_VENDOR_URL . "/ckeditor/ckeditor/adapters/jquery.js");
	}

	protected function makeJqWidget() {
		return null;
	}

	public function getControlJavaScript() {
		$strFormId = $this->Form->FormId;
		$strControlId = $this->ControlId;
		$strReadyFunc = 'null';
		if ($this->strJsReadyFunc) {
			$strReadyFunc = $this->strJsReadyFunc;
		}
		$strCtrlJs = "function() {qcubed.qckeditor(this, '{$strFormId}', '{$strControlId}', {$strReadyFunc});}";
		return sprintf('jQuery("#%s").%s(%s, %s)', $this->getJqControlId(), $this->getJqSetupFunction(), $strCtrlJs, $this->strConfiguration);
	}

	public function getEndScript() {
		return  $this->getControlJavaScript() . '; ' . parent::getEndScript();
	}

	public function getJqSetupFunction() {
		return 'ckeditor';
	}

	public function __set($strName, $mixValue) {

		//$this->blnModified = true;
		switch ($strName) {
			case "ReadyFunction":
				// The name of a javascript function to call after the CKEditor instance is ready, so that you can do further initialization
				// This function will receive the formId and controlId as parameters, and "this" will be the ckeditor instance.
				try {
					$this->strJsReadyFunc = Type::Cast($mixValue, Type::STRING);
					break;
				} catch (InvalidCast $objExc) {
					$objExc->incrementOffset();
					throw $objExc;
				}
				break;

			case "Configuration":
				// The configuration string. Could be a name of an object, or a javascript object (sourrounded by braces {})
				try {
					$this->strConfiguration = Type::Cast($mixValue, Type::STRING);
					break;
				} catch (InvalidCast $objExc) {
					$objExc->incrementOffset();
					throw $objExc;
				}
				break;


			default:
				try {
					parent::__set($strName, $mixValue);
				} catch (Caller $objExc) {
					$objExc->incrementOffset();
					throw $objExc;
				}
				break;

		}
	}


}
