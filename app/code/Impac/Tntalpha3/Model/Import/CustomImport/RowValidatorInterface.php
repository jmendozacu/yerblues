<?php
namespace Impac\Tntalpha3\Model\Import\CustomImport;

interface RowValidatorInterface extends \Magento\Framework\Validator\ValidatorInterface{
    const ERROR_INVALID_TITLE = 'InvalidValueTITLE';
    const ERROR_ID_IS_EMPTY = 'Empty';

    public function init($context);
}
