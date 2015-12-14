<?php
namespace DJ\View;

use DJ\Common\Annotation;

class BaseView {
	public function __invoke(&$app)
	{
        $this->app = $app;

		$class = new \ReflectionClass(get_class($this));
		$methods = $class->getMethods(\ReflectionMethod::IS_PUBLIC);
		foreach($methods as $method)
		{
			if(substr($method->name, 0, 2) != '__')
			{
				$this->setMethod($app, $method);
			}	
			
		}
	}

	protected function getUriWithParams($method, $verb='get')
	{
        $method2verb = [
            'lists' => 'get',
            'update' => 'put',
            'create' => 'post',
        ];
		$params = $method->getParameters();
		$uri = '/';
		if(!in_array($method->name, array_merge([$verb], array_keys($method2verb))))
        {
            $uri .= $method->name.'/';
        }
        $uri .= implode('/', array_map(function($p){return "{{$p->name}}";}, $params));
		return $uri;
	}

	protected function setMethod(&$app, $method)
	{
		$annotations = Annotation::fromMethod($method);
		if(empty($annotations))
		{
			$app->get($this->getUriWithParams($method), [$this, $method->name]);
		}
		else
		{
			if(array_key_exists('methods', $annotations))
			{
				foreach($annotations['methods'] as $verb)
				{
					$app->{$verb}($this->getUriWithParams($method, $verb), [$this, $method->name]);
				}
			}			
		}
	}
}
