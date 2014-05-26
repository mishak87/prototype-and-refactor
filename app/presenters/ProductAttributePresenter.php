<?php

namespace App;

use App\Entities\ProductAttribute;
use App\Entities\ProductAttributeValue;
use App\Models\ProductAttributeViewModel;
use App\Models\IProductAttributeViewModelFactory;
use Nette;


final class ProductAttributeValuePresenter extends Nette\Application\UI\Presenter
{

	/** @var IProductAttributeViewModelFactory|null */
	private $viewFactory;

	/** @var ProductAttributeViewModel|null */
	private $view;


	/**
	 * @param string
	 * @param string|null
	 */
	public function actionDefault($attribute, $value = NULL)
	{
		try {
			$this->view = $this->viewFactory->create($attribute, $value);
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
