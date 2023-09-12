<?php

declare(strict_types=1);

namespace AvegaCms\Controllers;

use AvegaCms\Models\Frontend\MetaDataModel;
use AvegaCms\Enums\MetaDataTypes;

use function _PHPStan_7711bdf39\RingCentral\Psr7\str;

class Content extends AvegaCmsFrontendController
{
    protected MetaDataModel $MDM;

    public function __construct()
    {
        parent::__construct();
        $this->MDM = model(MetaDataModel::class);
    }

    public function index()
    {
        $settings = settings('core.env');

        $segments = $this->request->uri->getSegments();

        if ($settings['useMultiLocales']) {
            unset($segments[0]); // Удаляем языковой сегмент
        }

        $locale = session()->get('avegacms.client.locale.id');

        $segment = empty($segments) ? '' : array_reverse($segments)[0];

        if (($meta = $this->MDM->getContentMetaData($locale, $segment)) === null) {
            return $this->error404();
        }

        // Проверяем цепочку записей
        if ($meta->meta_type !== MetaDataTypes::Main->value) {
            array_pop($segments);
            $parentMeta = match ($meta->meta_type) {
                MetaDataTypes::Page->value,
                MetaDataTypes::Rubric->value => $this->MDM->getContentMetaMap($locale, $segments),
                MetaDataTypes::Post->value   => []
            };
            //dd((string) $this->MDM->getLastQuery());
        }

        dd($meta, $parentMeta);

        /*switch ($meta->meta_type) {
            case MetaDataTypes::Main->value:
                break;
            case MetaDataTypes::Page->value:
                break;
            case MetaDataTypes::Rubric->value:
                break;
            case MetaDataTypes::Post->value:
                break;
        }*/

        // TODO 1. Последний сегмент проверяется в slug
        // TODO 1.1 если нет, то 404 (согласно локали)
        // TODO 2. проверяем тип записи (главная|страница|рубрика|пост)
        // TODO 2.1 Проверяем цепочку по parent (если указана страница)
        // TODO 2.2 В случае, если цепочка не активна, то 404
        // TODO 3.1 Формируем мета и breadcrumbs
        // TODO 3.2 Отправляем на вывод
        //dd($segments);

        return $this->render([]);
    }
}