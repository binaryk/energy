<?php namespace System;

use Mockery\CountValidator\Exception;

trait StdHelper
{
    public function try_($object)
    {
         try {
                throw new Exception(__CLASS__.' :: nu gasim inregistrarea cu id-ul:: '.$object);
            } catch(Exception $e) {
            $log = Log::createRecord(
                [
                    'stack_trace' => $e->getTraceAsString(),
                    'message' => 'Message:'. $e->getMessage() .' Line: '. $e->getTrace()[0]['line'] . ' Code:' . $e->getCode(),
                    "file" => $e->getTrace()[0]['file'],
                    "line" => $e->getTrace()[0]['line'],
                    "function" => $e->getTrace()[0]['function'],
                ]);
            return $log->message;
        }
    }
}