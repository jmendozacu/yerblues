<?php
namespace Impac\SUPERtntALPHA3\Setup;

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

        $tabla = $installer->getConnection()->newTable(
            $installer->getTable('valoresOficina')
            )->addColumn(
                'idOficina',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'id de la oficina'
            )->addColumn(
                'pesoMaximo',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                null,
                ['nullable' => false],
                'Peso volumetrico maximo total'
            )->addColumn(
                'costoA',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Costo si es menor a 100KG'
            )->addColumn(
                 'costoB',
                 \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                 null,
                 ['nullable' => false],
                 'Costo si es mayor a 100KG'
            )->setComment(
                'Base de Datos de los costos de envío a las oficinas de TNT'
            );
        $installer->getConnection()->createTable($table);
        $installer->getConnection()->createTable($tabla);
        $installer->endSetup();
    }
}