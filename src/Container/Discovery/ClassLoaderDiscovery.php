<?php
namespace Hasiera\Component\Core\Container\Discovery;

use Composer\Autoload\ClassLoader;
use Hasiera\Component\Utils\StringUtils;
use Hasiera\Component\Core\Container\ContainerAwareTrait;

class ClassLoaderDiscovery implements DiscoveryInterface
{
	use ContainerAwareTrait;
	
	private $classloaderPrefixes;
	
	public function __construct(ClassLoader $classloader)
	{
		$this->classloaderPrefixes = $classloader->getPrefixesPsr4();
	}

	public function discover($name)
	{
		foreach ($this->classloaderPrefixes as $prefix => $paths)
			if (StringUtils::startsWith($name, $prefix))
				foreach ($paths as $path)
					if (file_exists($path . '/Resources/config/hasiera.json'))
					{}
		
		try {
			$class = new \ReflectionClass($name);
			$constructor = $class->getConstructor();
			$instance = NULL;
			
			if ($constructor)
			{
				$params = $constructor->getParameters();
				$paramsInstance = [];
				
				foreach ($params as $param)
				{
					$paramType = $param->getType();
					if (!$paramType->isBuiltin())
						$paramsInstance[] = $this->container->get($paramType);
				}
				
				$instance = $class->newInstanceArgs($paramsInstance);
			}
			else
			{
				$instance = $class->newInstanceArgs();
			}
			return $instance;
		}
		catch (\ReflectionException $e)
		{
			return null;
		}
	}

	public function configure($name)
	{}
}

