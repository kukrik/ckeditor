<?php
require('qcubed.inc.php');

use QCubed as Q;
use QCubed\Project\Control\ControlBase;
use QCubed\Project\Control\FormBase as Form;
use QCubed\Project\Control\Button;
use QCubed\Control\Panel;
use QCubed\Event\Click;
use QCubed\Action\Ajax;
use QCubed\Js;

class SampleForm extends Form
{
	protected $txtEditor;
	protected $btnSubmit;
	protected $pnlResult;

	protected function formCreate()
	{
		$this->txtEditor = new Q\Plugin\CKEditor($this);
		$this->txtEditor->Text = '<b>Something</b> to start with.';

		$this->btnSubmit = new Button($this);
		$this->btnSubmit->Text = "Submit";
		$this->btnSubmit->AddAction(new Click(), new Ajax('submit_click'));

		$this->pnlResult = new Panel($this);
		$this->pnlResult->HtmlEntities = true;
	}

	protected function submit_click($strFormId, $strControlId, $param) {
		$this->pnlResult->Text = $this->txtEditor->Text;
	}
}

SampleForm::Run('SampleForm');
