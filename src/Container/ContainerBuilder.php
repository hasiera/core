<?php
namespace Hasiera\Component\Core\Container;

use Hasiera\Component\Core\Container\Discovery\DiscoveryInterface;
use Hasiera\Component\Utils\Bag;

class ContainerBuilder
{
	private $discoverers;
	
	public function __construct()
	{
		$this->extensions = new Bag();
	}
	
	public function addDiscoverer(DiscoveryInterface $discoverer)
	{
		$this->discoverers->set(get_class($discoverer), $discoverer);
		
		return $this;
	}
	
	public function createContainer()
	{
		return new Container($this->discoverers);
	}
}