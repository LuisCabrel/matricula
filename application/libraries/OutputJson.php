<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OutputJson {

    private $outMsj;
    private $outArray;
    private $debug = true;
    private $empty = True;

    const ERROR = 0;
    const WARNING = -2;
    const EXCEPTION = -3;
    const MSJ = 2;
    const SUCCESS = 1;
    const ETIQUETA_NUMROWS = "total";
    const ETIQUETA_DATOS = "datos";
    const MSJ_ERROR_DEVELOP = "Vuelva a intentar, si el error persiste comuniquese con el adminsitrador.";

    public function __construct() {
        $this->out_array = array();
        $this->outMsj = "";
    }

    public function cleanMsj() {
        $this->outMsj = "";
    }

    public function cleanAll() {
        $this->outMsj = "";
        $this->outArray = array();
        $this->empty = True;
    }

    public function isEmpty() {
        return $this->empty;
    }

    public function cleanArray() {
        $this->outArray = array();
    }

    public function pushMsj($msj) {
        $this->outMsj.=$msj;
        $this->empty = False;
    }

    public function pushArray($msj) {
        array_push($this->outArray, $msj);
        $this->empty = False;
    }

    public function writeSelfMsjError() {
        return $this->writeMsjError($this->outMsj);
    }

    public function writeMsjError($msj) {
        return $this->formatResponse(self::ERROR, $msj);
    }

    private function formatResponse($success = self::ERROR, $response = "") {
        return $this->writeJson(array("success" => $success, "response" => $response));
    }

    public function writeRows($total, $rows) {
        return $this->formatResponse(self::SUCCESS, array(self::ETIQUETA_NUMROWS => $total, self::ETIQUETA_DATOS => $rows));
    }

    public function writeStore($total, $rows) {
        return $this->writeJson(array(self::ETIQUETA_NUMROWS => $total, self::ETIQUETA_DATOS => $rows));
    }

    public function writeJson($datos) {
        $toprint = json_encode($datos);
        if (json_last_error() != JSON_ERROR_NONE) {
            $this->writeException(json_last_error_msg(), self::MSJ_ERROR_DEVELOP);
            return false;
        }
        print ($toprint);
        return true;
    }

    public function writeSelfMsj() {
        return $this->writeMsjMensaje($this->outMsj);
    }

    public function writeMsj($msj) {
        return $this->formatResponse(self::MSJ, $msj);
    }

    public function writeSelfWaring() {
        return $this->writeWaring($this->outMsj);
    }

    public function writeWarning($msj) {
        return $this->formatResponse(self::WARNING, $msj);
    }

    public function writeSelfArray() {
        return $this->writeInfo($this->outArray);
    }

    public function writeInfo($datos) {
        $this->formatResponse(self::SUCCESS, $datos);
    }

    public function writeException($exception = "", $error = self::MSJ_ERROR_DEVELOP) {
        if (self::$debug) {
            $this->formatResponse(self::EXCEPTION, $exception);
        } else {
            writeMsjError($error);
        }
    }

    public function writeSession($nombre, $contenido) {
        $_SESSION[$nombre] = $contenido;
    }

    public function writeSessionJson($nombre, $array) {
        $_SESSION[$nombre] = json_encode($array);
    }

}
