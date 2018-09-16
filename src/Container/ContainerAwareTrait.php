<?php
namespace Hasiera\Component\Core\Container;

trait ContainerAwareTrait
{
	private $container;
	
	public function setContainer(ContainerInterface $container)
	{
		$this->container = $container;
	}
}

