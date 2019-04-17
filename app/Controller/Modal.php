<?php
/**
 * Controller class for views.
 *
 * @copyright YetiForce Sp. z o.o.
 * @license   YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author    Tomasz Kur <t.kur@yetiforce.com>
 */

namespace App\Controller;

abstract class Modal extends View
{
	protected function getTitle()
	{
		return \App\Language::translateModule($this->request->getModule());
	}

	protected function getModalSize()
	{
		return 'modal-lg';
	}

	public function preProcessAjax()
	{
		$viewer = $this->getViewer();
		$viewer->assign('MODAL_SIZE', $this->getModalSize());
		$viewer->assign('MODAL_CSS', $this->getModalCss());
		$viewer->assign('MODAL_JS', $this->getModalJs());
		$viewer->assign('MODAL_TITLE', $this->getTitle());
		$viewer->assign('VIEW', $this->request->getAction());
		$viewer->view('Modal/Header.tpl');
	}

	public function postProcessAjax()
	{
		$viewer = $this->getViewer();
		$viewer->view('Modal/Footer.tpl');
	}

	protected function getModalCss()
	{
		$cssFileNames = [];
		return $this->convertScripts($cssFileNames, 'css');
	}

	protected function getModalJs()
	{
		$action = $this->request->getAction();
		$jsFileNames = [
			YF_ROOT_WWW . 'layouts/' . \App\Viewer::getLayoutName() . "/modules/Base/resources/$action.js",
		];
		return $this->convertScripts($jsFileNames, 'js');
	}
}
