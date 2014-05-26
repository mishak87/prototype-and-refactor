<?php

namespace App;

use Nette;
use App\Entities\ProductAttribute;
use App\Entities\ProductAttributeValue;


final class ProductAttributeValuePresenter extends Nette\Application\UI\Presenter
{

	/** @var \Kdyby\Doctrine\EntityManager @inject */
	public $entityManager;

	/** @var ProductAttribute|null */
	private $attribute;

	/** @var ProductAttributeValue|null */
	private $value;


	/**
	 * @param string
	 * @param string|null
	 */
	public function actionDefault($attribute, $value = NULL)
	{
		$repo = $this->entityManager->getRepository(ProductAttribute::class);
		if (!$this->attribute = $repo->findOneBy(['code' => $attribute])) {
			$this->error('Unknown attribute code.');
		}

		if ($value !== NULL) {
			/** @var ProductAttribute $attr */
			foreach ($this->attribute->getValues() as $val) {
				if ($val->getCode() === $value) {
					$this->value = $val;
					break;
				}
			}
			if ($this->value === NULL) {
				$this->error('Unknown value code.');
			}
		}
	}


	public function renderDefault()
	{
		$this->template->attribute = $this->attribute;
		$this->template->value = $this->value;
	}

}
