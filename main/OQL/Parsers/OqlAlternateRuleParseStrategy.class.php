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
	class OqlAlternateRuleParseStrategy extends OqlGrammarRuleParseStrategy
	{
		/**
		 * @return OqlAlternateRuleParseStrategy
		**/
		public static function me()
		{
			return Singleton::getInstance(__CLASS__);
		}
		
		public function parse(OqlGrammarRule $rule, OqlTokenizer $tokenizer)
		{
			Assert::isInstance($rule, 'OqlAlternateRule');
			
			foreach ($rule->getList() as $ruleItem) {
				if (
					$node
					= $ruleItem->getParseStrategy()->getNode($ruleItem, $tokenizer)
				) {
					return $node;
				}
			}
			
			// FIXME: error message
			if ($rule->isRequired())
				$this->raiseError($tokenizer, 'expected');
			
			return null;
		}
	}
?>