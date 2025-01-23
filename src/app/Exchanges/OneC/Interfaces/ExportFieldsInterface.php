<?php

namespace App\Exchanges\OneC\Interfaces;

interface ExportFieldsInterface
{
    /**
     * @param mixed|null $context
     *
     * @return array
     */
    public function getExportFields1c($context = null);
}