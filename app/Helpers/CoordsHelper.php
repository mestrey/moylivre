<?php

namespace App\Helpers;

class CoordsHelper
{
    private function haversineGreatCircleDistance(
        $latitudeFrom,
        $longitudeFrom,
        $latitudeTo,
        $longitudeTo,
        $earthRadius = 6371000
    ) {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

        return $angle * $earthRadius;
    }

    public function getDistanceInMeters($latFrom, $lonFrom, $latTo, $lonTo)
    {
        return $this->haversineGreatCircleDistance($latFrom, $lonFrom, $latTo, $lonTo);
    }

    public function getDistanceInMetersFromAuthUser($latTo, $lonTo)
    {
        return $this->getDistanceInMeters(auth()->user()->latitude, auth()->user()->longitude, $latTo, $lonTo);
    }

    public function getDisplayDistanceFromAuthUser($latTo, $lonTo)
    {
        $distance = $this->getDistanceInMetersFromAuthUser($latTo, $lonTo);

        if ($distance < 1000) {
            return round($distance) . ' m';
        }

        return round($distance / 1000, 2) . ' km';
    }
}
