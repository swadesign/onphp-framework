<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1.master at 2012-11-09 13:43:08                    *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	namespace Onphp\NsConverter;
	
	abstract class AutoProtoNsFunction extends \Onphp\AbstractProtoClass
	{
		protected function makePropertyList()
		{
			return array(
				'name' => \Onphp\LightMetaProperty::fill(new \Onphp\LightMetaProperty(), 'name', null, 'string', null, 256, true, true, false, null, null),
				'namespace' => \Onphp\LightMetaProperty::fill(new \Onphp\LightMetaProperty(), 'namespace', null, 'string', null, 256, true, true, false, null, null),
				'newNamespace' => \Onphp\LightMetaProperty::fill(new \Onphp\LightMetaProperty(), 'newNamespace', 'new_namespace', 'string', null, 256, true, true, false, null, null)
			);
		}
	}
?>