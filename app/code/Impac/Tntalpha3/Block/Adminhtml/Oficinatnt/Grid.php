<?php
namespace Impac\Tntalpha3\Block\Adminhtml\Oficinatnt;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Impac\Tntalpha3\Model\oficinatntFactory
     */
    protected $_oficinatntFactory;

    /**
     * @var \Impac\Tntalpha3\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Impac\Tntalpha3\Model\oficinatntFactory $oficinatntFactory
     * @param \Impac\Tntalpha3\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Impac\Tntalpha3\Model\OficinatntFactory $OficinatntFactory,
        \Impac\Tntalpha3\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_oficinatntFactory = $OficinatntFactory;
        $this->_status = $status;
        $this->moduleManager = $moduleManager;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('postGrid');
        $this->setDefaultSort('idoficina');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(false);
        $this->setVarNameFilter('post_filter');
    }

    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
        $collection = $this->_oficinatntFactory->create()->getCollection();
        $this->setCollection($collection);

        parent::_prepareCollection();

        return $this;
    }

    /**
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'idoficina',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'idoficina',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );

        $this->addColumn(
                    'direccion',
                    [
                        'header' => __('Dirección'),
                        'index' => 'direccion',
                    ]
                );

        $this->addColumn(
                    'telefono',
                    [
                        'header' => __('Teléfono'),
                        'index' => 'telefono',
                    ]
                );

        $this->addColumn(
                    'nombreoficina',
                    [
                        'header' => __('Nombre Oficina'),
                        'index' => 'nombreoficina',
                    ]
                );

        //$this->addColumn(
        //'edit',
        //[
        //'header' => __('Edit'),
        //'type' => 'action',
        //'getter' => 'getId',
        //'actions' => [
        //[
        //'caption' => __('Edit'),
        //'url' => [
        //'base' => '*/*/edit'
        //],
        //'field' => 'idoficina'
        //]
        //],
        //'filter' => false,
        //'sortable' => false,
        //'index' => 'stores',
        //'header_css_class' => 'col-action',
        //'column_css_class' => 'col-action'
        //]
        //);

        $this->addExportType($this->getUrl('tntalpha3/*/exportCsv', ['_current' => true]), __('CSV'));
        $this->addExportType($this->getUrl('tntalpha3/*/exportExcel', ['_current' => true]), __('Excel XML'));

        $block = $this->getLayout()->getBlock('grid.bottom.links');
        if ($block) {
            $this->setChild('grid.bottom.links', $block);
        }

        return parent::_prepareColumns();
    }

    /**
     * @return $this
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('idoficina');
        //$this->getMassactionBlock()->setTemplate('Impac_Tntalpha3::oficinatnt/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('oficinatnt');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('tntalpha3/*/massDelete'),
                'confirm' => __('¿Está Seguro?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('tntalpha3/*/massStatus', ['_current' => true]),
                'additional' => [
                    'visibility' => [
                        'name' => 'status',
                        'type' => 'select',
                        'class' => 'required-entry',
                        'label' => __('Status'),
                        'values' => $statuses
                    ]
                ]
            ]
        );

        return $this;
    }

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('tntalpha3/*/index', ['_current' => true]);
    }

    /**
     * @param \Impac\Tntalpha3\Model\oficinatnt|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl(
            'tntalpha3/*/edit',
            ['idoficina' => $row->getId()]
        );
    }
}
