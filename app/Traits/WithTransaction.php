<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\DB;

trait WithTransaction
{
    public function serveFeature($feature, $arguments = [])
    {
        DB::beginTransaction();
        try {
            $data = $this->serve($feature, $arguments);
            DB::commit();
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            logger()->error('Error occurred in feature.', compact('e'));
            throw $e;
        }
    }
}
