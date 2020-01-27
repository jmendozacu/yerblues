<?php
namespace Impac\baseDeDatos\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
		$installer = $setup;
		$installer->startSetup();
		$table = $installer->getConnection()->newTable(
			$installer->getTable('oficinaTnt')
		)->addColumn(
			'idOficina',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			null,
			['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
			'id de la oficina'
		)->addColumn(
			'nombreOficina',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => true],
			'Nombre de la Oficina'
		)->addColumn(
			'Direccion',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => true],
			'Direccion de la oficina'
		)->addColumn(
			'telefono',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => true],
			'Status'
		)->setComment(
            'Base de Datos de las oficinas TNT en el país'
        );
		$installer->getConnection()->createTable($table);
		$installer->endSetup();
	}
}