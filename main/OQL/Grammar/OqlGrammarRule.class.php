<?php
/****************************************************************************
 *   Copyright (C) 2009 by Vladlen Y. Koshelev                              *
 *                                                                          *
 *   This program is free software; you can redistribute it and/or modify   *
 *   it under the terms of the GNU Lesser General Public License as         *
 *   published by the Free Software Foundation; either version 3 of the     *
 *   License, or (at your option) any later version.                        *
 *                                                                          *
 ****************************************************************************/

	/**
	 * @ingroup OQL
	**/
	abstract class OqlGrammarRule
	{
		protected $required	= true;
		
		/**
		 * @return OqlGrammarRuleParseStrategy
		**/
		abstract public function getParseStrategy();
		
		public function isRequired()
		{
			return $this->required;
		}
		
		/**
		 * @return OqlGrammarRule
		**/
		public function required()
		{
			$this->required = true;
			
			return $this;
		}
		
		/**
		 * @return OqlGrammarRule
		**/
		public function optional()
		{
			$this->required = false;
			
			return $this;
		}
	}
?>