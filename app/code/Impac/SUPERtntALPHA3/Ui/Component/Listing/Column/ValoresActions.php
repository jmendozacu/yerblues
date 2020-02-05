<?php

namespace Impac\SUPERtntALPHA3\Ui\Component\Listing\Column;

class ValoresActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    const URL_PATH_EDIT = 'impac_supertntalpha3/valores/edit';
    protected $_urlBuilder;

    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    )
    {
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $this->_urlBuilder->getUrl(
                            static::URL_PATH_EDIT,
                            [
                                'id' => $item['idOficina']
                            ]
                        ),
                        'label' => __('Edit')
                    ],
                ];
            }
        }
        return $dataSource;
    }
}