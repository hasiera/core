<?php
namespace Hasiera\Component\Core\Container\Discovery;

use Hasiera\Component\Core\Container\ContainerAwareInterface;

interface DiscoveryInterface extends ContainerAwareInterface
{
	function discover($name);
	
	function configure($name);
}

