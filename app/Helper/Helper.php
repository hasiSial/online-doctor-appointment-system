<?php
namespace App\Helper;

use Illuminate\Support\Facades\Log;
class Helper
{
    public static function logMessage($endpoint, $input, $exception)
    {
        Log::info("Endpoint: = " . $endpoint);
        Log::info($input);
        Log::info("Exception: = " . $exception);
    }
}
