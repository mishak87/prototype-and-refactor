<?php

namespace App;

use App\Models\IProductAttributeViewModel;
use App\Models\IViewModelFactory;
use Nette;


final class ProductAttributeValuePresenter extends Nette\Application\UI\Presenter
{

	/** @var IViewModelFactory|null */
	private $viewFactory;

	/** @var IProductAttributeViewModel|null */
	private $view;


	/**
	 * @param string
	 * @param string|null
	 */
	public function actionDefault($attribute, $value = NULL)
	{
		try {
			$this->view = $this->viewFactory->create(IProductAttributeViewModel::class, ['attribute' => $attribute, 'value' => $value]);
			$this->view->validate();
		} catch (\RuntimeException $e) {
			$this->error($e->getMessage());
		}
	}


	public function renderDefault()
	{
		$this->template->attribute = $this->view->getAttribute();
		$this->template->value = $this->view->getValue();
	}

}
