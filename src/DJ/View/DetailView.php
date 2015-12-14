<?php
namespace DJ\View;

trait DetailView {
	public function get($id)
	{
		return $this->app->escape(' get with id = '.$id.' from model '.$this->model_class);
	}
}
