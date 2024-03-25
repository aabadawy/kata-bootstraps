<?php

namespace swkberlin\Graph;

//https://leetcode.com/problems/keys-and-rooms/?envType=study-plan-v2&envId=leetcode-75
class KeysAndRooms
{

    /**
     * @param integer [][] $rooms
     * @return bool
     */
    public function canVisitAllRooms(array $rooms): bool
    {
        $visited_rooms = [];

        $this->visitNextRoom(0,$rooms,$visited_rooms);

        return count($visited_rooms) == count($rooms);
    }

    protected function visitNextRoom($currentRoom, $rooms,&$visitedRooms): void
    {
        if(in_array($currentRoom, $visitedRooms)) {
            return ;
        }

        $visitedRooms[] = $currentRoom;

        foreach ($rooms[$currentRoom] as $nextRoomKey) {
            $this->visitNextRoom($nextRoomKey,$rooms,$visitedRooms);
        }
    }
}