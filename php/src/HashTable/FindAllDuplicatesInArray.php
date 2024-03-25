<?php

namespace swkberlin\HashTable;

class FindAllDuplicatesInArray
{
    public function findDuplicates($nums): array
    {
        $duplicates = [];

        foreach ($nums as $num) {
            $index = abs($num) - 1;
            if ($nums[$index] < 0) {
                $duplicates[] = abs($num);
            } else {
                $nums[$index] *= -1;
            }
        }

        return $duplicates;
    }
}