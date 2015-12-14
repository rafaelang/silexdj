<?php
namespace DJ\View;

trait UpdateView {
	/**
	 * @methods=["put"]
	*/
	public function update($id)
	{
		return 'update with id = '.$id.' from model '.$this->model_class;
	}
}
