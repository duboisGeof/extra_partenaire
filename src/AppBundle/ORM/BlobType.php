<?php
namespace AppBundle\ORM;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
* Type that maps an Blog SQL to php objects
*/
class BlobType extends Type
{
	const BLOB = 'blob';

	public function getName()
	{
		return self::BLOB;
	}

	public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
	{
		return $platform->getDoctrineTypeMapping('blob');
	}

	public function convertToDatabaseValue($value, AbstractPlatform $platform)
	{
		return ($value === null) ? null : base64_encode($value);
	}

	public function convertToPHPValue($value, AbstractPlatform $platform)
	{
		return ($value === null) ? null : base64_decode($value);
	}
}