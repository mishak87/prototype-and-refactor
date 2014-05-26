<?php

namespace App\Models;

use Rixxi\ViewModel\Annotations as ViewModel;


interface IProductAttributeViewModel extends IViewModel
{

	/**
	 * Either constructor can be generated with all dependencies or they can be public and set in factory after construction.
	 * I am not sure which approach has more benefits and less disadvantages.
	 */
	function __construct($attributeCode, $valueCode = NULL);

	/**
	 * Target entity defaults to return annotation.
	 * findBy property can be guessed from constructors parameter name  <attribute>[<Property>]
	 * @ViewMode\EntityAttribute(targetEntity="ProductAttribute", findBy="code"))
	 * @return ProductAttribute
	 */
	function getAttribute();

	/**
	 * Optional property can be detected from return annotation (if contains null is optional) or constructors parameter.
	 * from attribute and findBy can be guessed from constructor parameter also attribute=inflector::plural(<name>), findBy=<Parameter>
	 * @ViewMode\EntityAttribute(from={parent="attribute", attribute="values", findBy="code"))
	 * @return ProductAttributeValue|null
	 */
	function getValue();

}
