<?php

namespace App\Models;


interface IProductAttributeViewModelFactory
{

	/**
	 * @param string
	 * @param string
	 * @return ProductAttributeViewModel
	 */
	function create($attribute, $value = NULL);

}
