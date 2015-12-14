<?php
namespace DJ\View;

class ModelView extends GenericView
{
	use WriteView;
	use ReadView;

	public $model_class;

	protected function getUriWithParams($method, $verb='get')
	{
		$model_class = strtolower($this->model_class);
		return '/'.$model_class.parent::getUriWithParams($method, $verb);
	}
}
