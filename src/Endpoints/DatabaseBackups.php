<?php

namespace AcquiaCloudApi\Endpoints;

use AcquiaCloudApi\Connector\ClientInterface;
use AcquiaCloudApi\Response\BackupsResponse;
use AcquiaCloudApi\Response\BackupResponse;
use AcquiaCloudApi\Response\OperationResponse;

/**
 * Class DatabaseBackups
 * @package AcquiaCloudApi\CloudApi
 */
class DatabaseBackups extends CloudApiBase implements CloudApiInterface
{

    /**
     * Backup a database.
     *
     * @param string $environmentUuid
     * @param string $dbName
     * @return OperationResponse
     */
    public function create($environmentUuid, $dbName)
    {
        return new OperationResponse(
            $this->client->request(
                'post',
                "/environments/${environmentUuid}/databases/${dbName}/backups"
            )
        );
    }

    /**
     * Shows all database backups in an environment.
     *
     * @param string $environmentUuid
     * @param string $dbName
     * @return BackupsResponse
     */
    public function getAll($environmentUuid, $dbName)
    {
        return new BackupsResponse(
            $this->client->request(
                'get',
                "/environments/${environmentUuid}/databases/${dbName}/backups"
            )
        );
    }

    /**
     * Gets information about a database backup.
     *
     * @param string $environmentUuid
     * @param string $dbName
     * @param int    $backupId
     * @return BackupResponse
     */
    public function get($environmentUuid, $dbName, $backupId)
    {
        return new BackupResponse(
            $this->client->request(
                'get',
                "/environments/${environmentUuid}/databases/${dbName}/backups/${backupId}"
            )
        );
    }

    /**
     * Restores a database backup to a database in an environment.
     *
     * @param string $environmentUuid
     * @param string $dbName
     * @param int    $backupId
     * @return OperationResponse
     */
    public function restore($environmentUuid, $dbName, $backupId)
    {
        return new OperationResponse(
            $this->client->request(
                'post',
                "/environments/${environmentUuid}/databases/${dbName}/backups/${backupId}/actions/restore"
            )
        );
    }
}