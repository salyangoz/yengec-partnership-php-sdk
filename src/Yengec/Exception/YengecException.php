<?php


namespace Yengec\Exception;

use Laminas\Diactoros\Exception\ExceptionInterface;
use Exception;

abstract class YengecException extends Exception implements ExceptionInterface
{

}