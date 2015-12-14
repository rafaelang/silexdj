<?php
namespace DJ\View;

class ViewManager implements \ArrayAccess
{
	protected $views = [];

	public function __invoke(&$app)
	{
		foreach($this->views as $view)
		{
			$view($app);
		}
	}

	public function offsetExists($offset)
	{
		return isset($this->views[$offset]);
	}

	public function offsetGet($offset)
	{
		return $this->views[$offset];
	}

	public function offsetSet($offset, $view)
	{
		if(is_null($offset))
		{
			$this->views[] = $view;
		}
		else
		{
			$this->views[$offset] = $view;
		}
	}

	public function offsetUnset($offset)
	{
		unset($this->views[$offset]);
	}
	
}
