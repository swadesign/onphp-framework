<?php
/***************************************************************************
 *   Copyright (C) 2006 by Konstantin V. Arkhipov                          *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License, or     *
 *   (at your option) any later version.                                   *
 *                                                                         *
 ***************************************************************************/
/* $Id$ */

	/**
	 * @see eAcceleratorSegmentHandler
	 * @see ApcSegmentHandler
	 * 
	 * @ingroup DAOs
	**/
	abstract class OptimizerSegmentHandler implements SegmentHandler
	{
		protected $id		= null;
		protected $locker	= null;
		
		abstract protected function getMap();
		abstract protected function storeMap(array $map);

		public function touch($key)
		{
			$map = $this->getMap();
			
			if (!isset($map[$key])) {
				$map[$key] = true;
				return $this->storeMap($map);
			}
			
			$this->locker->free($this->id);
			return true;
		}
		
		public function unlink($key)
		{
			$map = $this->getMap();
			
			if (isset($map[$key])) {
				unset($map[$key]);
				return $this->storeMap($map);
			}
			
			$this->locker->free($this->id);
			return true;
		}
		
		public function ping($key)
		{
			$map = $this->getMap();
			
			$this->locker->free($this->id);
			
			if (isset($map[$key])) {
				return true;
			} else {
				return false;
			}
		}
	}
?>