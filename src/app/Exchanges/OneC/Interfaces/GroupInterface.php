<?php

namespace App\Exchanges\OneC\Interfaces;

use App\Exchanges\OneC\Commerce\Model\Group;

interface GroupInterface
{
    /**
     * Создание дерева групп
     * в параметр передаётся массив всех групп (import.xml > Классификатор > Группы)
     * $groups[0]->parent - родительская группа
     * $groups[0]->children - дочерние группы.
     *
     * @param Group[] $groups
     * @param string $source_id
     *
     * @return void
     */
    public static function createTree1c($groups, $source_id);
}