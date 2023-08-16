<?php

namespace AvegaCms\Models\Admin;

use CodeIgniter\Model;
use AvegaCms\Entities\SettingsEntity;

class SettingsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = SettingsEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'entity',
        'slug',
        'key',
        'value',
        'default_value',
        'return_type',
        'label',
        'context',
        'rules',
        'sort',
        'created_by_id',
        'updated_by_id',
        'created_at',
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['setCreatedById'];
    protected $afterInsert    = ['dropSettingsCache'];
    protected $beforeUpdate   = ['setUpdatedById'];
    protected $afterUpdate    = ['dropSettingsCache'];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * @param  string  $entity
     * @return array
     */
    public function getSettings(string $entity): array
    {
        $this->builder()->select(
            [
                'slug',
                'key',
                'value',
                'return_type'
            ]
        )->where('entity', $entity)
            ->orderBy('sort', 'ASC')
            ->orderBy('slug', 'ASC');

        $settings = [];

        if ( ! empty($result = $this->asArray()->findAll())) {
            foreach ($result as $item) {
                if ( ! empty($item['slug']) && ! empty($item['key'])) {
                    $settings[$item['slug']][$item['key']] = [
                        'value'       => $item['value'],
                        'return_type' => $item['return_type']
                    ];
                } else {
                    $settings[$item['slug']] = [
                        'value'       => $item['value'],
                        'return_type' => $item['return_type']
                    ];
                }
            }
            unset($result);
        }

        return $settings;
    }

    /**
     * @param  string  $entity
     * @param  string|null  $slug
     * @param  string|null  $property
     * @return int
     */
    public function getId(string $entity, string $slug = null, string $property = null): int
    {
        $this->builder()->where('entity', $entity);
        if ( ! empty($slug)) {
            $this->builder()->where('slug', $slug);
            if ( ! empty($property)) {
                $this->builder()->where('key', $property);
            }
        }

        return $this->asArray()->findColumn('id')[0] ?? 0;
    }

    /**
     * @param  array  $data
     * @return void
     */
    protected function dropSettingsCache(array $data): void
    {
        if ($data['result']) {
            cache()->delete('settings_' . $data['data']['entity']);
        }
    }

    /**
     * @param  array  $data
     * @return array
     */
    protected function setCreatedById(array $data): array
    {
        $data['data']['updated_by_id'] = $data['data']['created_by_id'] = $data['data']['created_by_id'] ?? 1;

        return $data;
    }

    /**
     * @param  array  $data
     * @return array
     */
    protected function setUpdatedById(array $data): array
    {
        $data['data']['updated_by_id'] = $data['data']['updated_by_id'] ?? 2;

        return $data;
    }
}
