<?php

namespace App\Models;

use Nette\Application\UI\Presenter;


interface IViewModelFactory
{

	/**
	 * create($presenter, $param1, $param2) or create($presenter, [ 'param1' => $param1, 'param2' => $param2 ])
	 * @param Presenter
	 * @param mixed|null $parameters
	 * @return IViewModel
	 */
	function create(Presenter $presenter, $parameters = NULL);

}
