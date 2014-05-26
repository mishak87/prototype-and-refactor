<?php

namespace App\Models;

use Kdyby\Doctrine\EntityManager;
use Nette;


class ProductAttributeViewModel extends Nette\Object
{

	/** @var EntityManager */
	private $entityManager;

	/** @var string */
	private $attributeCode;

	/** @var string|null */
	private $valueCode;

	/** @var ProductAttribute|null */
	private $attribute;


	/** @var ProductAttributeValue|null */
	private $value;


	/**
	 * @param EntityManager
	 * @param string
	 * @param string|null
	 */
	public function __construct(EntityManager $entityManager, $attributeCode, $valueCode = NULL)
	{
		$this->entityManager = $entityManager;
		$this->attributeCode = $attributeCode;
		$this->valueCode = $valueCode;
	}


	public function validate()
	{
		if ($this->getAttribute() === NULL) {
			throw new \RuntimeException('Unknown attribute code');
		} elseif ($this->value !== NULL && $this->getValue() === NULL) {
			throw new \RuntimeException('Unknown value code ');
		}
	}


	/** @return ProductAttribute|null */
	public function getAttribute()
	{
		if ($this->attribute === NULL) {
			$repository = $this->entityManager->getRepository(ProductAttribute::class);
			$this->attribute = $repository->findOneBy(['code' => $this->attributeCode]) ?: FALSE;
		}
		return $this->attribute ?: NULL;
	}


	/** @return ProductAttributeValue|null */
	public function getValue()
	{
		if ($this->value !== NULL) {
			foreach ($this->attribute->getValues() as $value) {
				if ($value->getCode() === $this->valueCode) {
					$this->value = $value;
					break;
				}
			}
		}
		return $this->value;
	}

}
