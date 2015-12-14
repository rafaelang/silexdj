<?php
namespace DJ\View;

trait CreateView {
    /**
     * @methods=["post"]
     */
	public function create()
	{
		return $this->app->escape(' create from model '.$this->model_class);
	}
}
