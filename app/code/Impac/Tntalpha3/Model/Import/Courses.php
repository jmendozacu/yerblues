<?php
namespace Impac\Tntalpha3\Model\Import;

use Exception;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Json\Helper\Data as JsonHelper;
use Magento\ImportExport\Helper\Data as ImportHelper;
use Magento\ImportExport\Model\Import;
use Magento\ImportExport\Model\Import\Entity\AbstractEntity;
use Magento\ImportExport\Model\Import\ErrorProcessing\ProcessingErrorAggregatorInterface;
use Magento\ImportExport\Model\ResourceModel\Helper;
use Magento\ImportExport\Model\ResourceModel\Import\Data;

class Courses extends AbstractEntity{
    const ENTITY_CODE = 'learning';
    const TABLE = 'oficinatnt';
    const ENTITY_ID_COLUMN = 'idoficina';
    protected $needColumnCheck = true;
    protected $logInHistory = true;
    protected $_permanentAttributes = ['idoficina'];
    protected $validColumnNames = ['idoficina','nombreoficina','direccion','telefono'];
    protected $connection;
    private $resource;

    public function __construct(JsonHelper $jsonHelper,ImportHelper $importExportData,Data $importData,ResourceConnection $resource,Helper $resourceHelper,ProcessingErrorAggregatorInterface $errorAggregator) {
        $this->jsonHelper = $jsonHelper;
        $this->_importExportData = $importExportData;
        $this->_resourceHelper = $resourceHelper;
        $this->_dataSourceModel = $importData;
        $this->resource = $resource;
        $this->connection = $resource->getConnection(ResourceConnection::DEFAULT_CONNECTION);
        $this->errorAggregator = $errorAggregator;
        $this->initMessageTemplates();
    }

    public function getEntityTypeCode(){
        return static::ENTITY_CODE;
    }

    public function getValidColumnNames(): array{
        return $this->validColumnNames;
    }

    public function validateRow(array $rowData,$rowNum): bool{
        $idOficina = (int) $rowData['idoficina'] ?? 0;
        $nombreOficina = $rowData['nombreoficina'] ?? '';
        $Direccion = $rowData['direccion'] ?? '';
        $telefono = $rowData['telefono'] ?? '';
        if (!$idOficina) {
            $this->addRowError('idOficinaIsRequired', $rowNum);
        }
        if (!$nombreOficina) {
            $this->addRowError('nombreOficinaIsRequired', $rowNum);
        }
        if (!$Direccion) {
            $this->addRowError('DireccionIsRequired', $rowNum);
        }
        if (!$telefono) {
            $this->addRowError('telefonoIsRequired', $rowNum);
        }
        if (isset($this->_validatedRows[$rowNum])) {
            return !$this->getErrorAggregator()->isRowInvalid($rowNum);
        }
        $this->_validatedRows[$rowNum] = true;
        return !$this->getErrorAggregator()->isRowInvalid($rowNum);
    }

    protected function _importData(): bool{
        switch ($this->getBehavior()) {
            case Import::BEHAVIOR_DELETE:
                $this->deleteEntity();
                break;
            case Import::BEHAVIOR_REPLACE:
                $this->saveAndReplaceEntity();
                break;
            case Import::BEHAVIOR_APPEND:
                $this->saveAndReplaceEntity();
                break;
        }
        return true;
    }

    private function deleteEntity(): bool{
        $rows = [];
        while ($bunch = $this->_dataSourceModel->getNextBunch()) {
            foreach ($bunch as $rowNum => $rowData) {
                $this->validateRow($rowData, $rowNum);

                if (!$this->getErrorAggregator()->isRowInvalid($rowNum)) {
                    $rowId = $rowData[static::ENTITY_ID_COLUMN];
                    $rows[] = $rowId;
                }
                if ($this->getErrorAggregator()->hasToBeTerminated()) {
                    $this->getErrorAggregator()->addRowToSkip($rowNum);
                }
            }
        }

        if ($rows) {
            return $this->deleteEntityFinish(array_unique($rows));
        }
        return false;
    }
    private function saveAndReplaceEntity(){
        $behavior = $this->getBehavior();
        $rows = [];
        while ($bunch = $this->_dataSourceModel->getNextBunch()) {
            $entityList = [];

            foreach ($bunch as $rowNum => $row) {
                if (!$this->validateRow($row, $rowNum)) {
                    continue;
                }

                if ($this->getErrorAggregator()->hasToBeTerminated()) {
                    $this->getErrorAggregator()->addRowToSkip($rowNum);
                    continue;
                }

                $rowId = $row[static::ENTITY_ID_COLUMN];
                $rows[] = $rowId;
                $columnValues = [];

                foreach ($this->getAvailableColumns() as $columnKey) {
                    $columnValues[$columnKey] = $row[$columnKey];
                }

                $entityList[$rowId][] = $columnValues;
                $this->countItemsCreated += (int) !isset($row[static::ENTITY_ID_COLUMN]);
                $this->countItemsUpdated += (int) isset($row[static::ENTITY_ID_COLUMN]);
            }

            if (Import::BEHAVIOR_REPLACE === $behavior) {
                if ($rows && $this->deleteEntityFinish(array_unique($rows))) {
                    $this->saveEntityFinish($entityList);
                }
            } elseif (Import::BEHAVIOR_APPEND === $behavior) {
                $this->saveEntityFinish($entityList);
            }
        }
    }
    private function saveEntityFinish(array $entityData): bool{
        if ($entityData) {
            $tableName = $this->connection->getTableName(static::TABLE);
            $rows = [];
            foreach ($entityData as $entityRows) {
                foreach ($entityRows as $row) {
                    $rows[] = $row;
                }
            }
            if ($rows) {
                $this->connection->insertOnDuplicate($tableName, $rows, $this->getAvailableColumns());
                return true;
            }
            return false;
        }
    }

    private function deleteEntityFinish(array $entityIds): bool{
        if ($entityIds) {
            try {
                $this->countItemsDeleted += $this->connection->delete(
                    $this->connection->getTableName(static::TABLE),
                    $this->connection->quoteInto(static::ENTITY_ID_COLUMN . ' IN (?)', $entityIds)
                );
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
        return false;
    }

    private function getAvailableColumns(): array{
        return $this->validColumnNames;
    }

    private function initMessageTemplates(){
        $this->addMessageTemplate(
            'idOficinaIsRequired',
            __('The idOficina cannot be empty.')
        );
        $this->addMessageTemplate(
            'DireccionIsRequired',
            __('Direccion should be greater than 0.')
        );
        $this->addMessageTemplate(
            'nombreOficinaIsRequired',
            __('nombreOficina should be greater than 0.')
        );
        $this->addMessageTemplate(
            'telefonoIsRequired',
            __('telefono should be greater than 0.')
        );
    }
}
