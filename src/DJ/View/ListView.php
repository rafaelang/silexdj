<?php
namespace DJ\View;

trait ListView {
	public function lists()
	{
		return ' list from model '.$this->model_class;
	}
}
