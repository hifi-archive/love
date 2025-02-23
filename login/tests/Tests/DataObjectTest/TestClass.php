<?php
/**
 * Dataobject test
 *
 * @category   LoveMachine
 * @package    UnitTests
 * @subpackage Core
 * @author     LoveMachine Inc. <all@lovemachineinc.com>
 * @license    Copyright (c) 2009-2010, LoveMachine Inc. All Rights Reserved
 * @version    SVN: $Id: TestClass.php 5 2010-05-05 18:35:12Z seong $
 * @link       http://www.lovemachineinc.com
 */
/**
 * Dataobject test testclass
 *
 * @category   LoveMachine
 * @package    UnitTests
 * @subpackage Core
 * @author     LoveMachine Inc. <all@lovemachineinc.com>
 * @license    Copyright (c) 2009-2010, LoveMachine Inc. All Rights Reserved
 * @link       http://www.lovemachineinc.com
 * @group      Core
 */
class DataObjectTest_TestClass extends DataObject
{
    public static $properties = array(
        'propertyOne',
        'propertyTwo',
        'propertyInt',
        'propertyString',
        'longPropertyNameToMakeItAnnoying'
    );

    protected $propertyOne;
    protected $propertyTwo;
    protected $propertyInt;
    protected $propertyString;
    protected $longPropertyNameToMakeItAnnoying;
    protected $ignoreMe;

    public function __construct()
    {
        parent::registerIgnoreProps(array('ignoreMe'));
        parent::__construct();
    }

    public function setPropertyInt($int)
    {
        $this->propertyInt = (int)$int;
        return $this;
    }

    public function setPropertyString($string)
    {
        $this->propertyString = (string)$string;
        return $this;
    }
}
