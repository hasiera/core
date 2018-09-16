<?php
namespace Hasiera\Component\Core\Container;

use Hasiera\Component\Utils\Bag;
use Hasiera\Component\Utils\BagException;

class Container implements ContainerInterface
{
	private $bag;
	
	private $descoverers;
	
	public function __construct(Bag $discoverers)
	{
		$this->bag = new Bag();
		$this->extensions = $extensions;
		$this->descoverers = $discoverers;
	}
	
	public function get(string $name)
	{
		try
		{
			return $this->bag->get($name);
		}
		catch (BagException $e)
		{
			$new = NULL;
			foreach ($this->descoverers->getIterator() as $discoverer)
				$new->discover($name);
			
			$this->bag->set($name, $new);
			
			return $new;
		}
	}
}

