<?php
namespace DJ\View;

trait DeleteView {
    /**
     * @methods=["delete"]
     */
	public function delete($id)
	{
		return 'delete with id = '.$id.' from model '.$this->model_class;
	}
}
