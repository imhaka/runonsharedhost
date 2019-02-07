<?php

class Operation
{
    function run($cmd)
    {
        $date = new DateTime();
        $timeStamp = $date->getTimestamp();
        if (!file_exists('log')) {
            mkdir('log', 0777, true);
        }
        $cmd = "$cmd >log/log$timeStamp.txt 2>&1 & echo $!";
        $pid = exec($cmd);

        /** wait two seconds for write and other operations*/
        sleep(2);
        if ($this->processExists($pid)) {
            /**  pid  add to pidlist file */
            file_put_contents("pidlist", "$pid  : $cmd\n", FILE_APPEND);
        }
        $output = file_get_contents("log/log$timeStamp.txt");
        $jsonModel = ["pid" => $pid, "output" => $output];

        return json_encode($jsonModel);
    }

    function kill($pid)
    {
        exec("kill -9 $pid 2>&1 & echo $!", $output);
        /**pid remove from pid list */
        $lines = file("pidlist", FILE_IGNORE_NEW_LINES);
        foreach ($lines as $key => $line) {
            if (strpos($line, $pid) === 0) unset($lines[$key]);
        }
        $data = implode(PHP_EOL, $lines);
        file_put_contents("pidlist", $data);
        $jsonModel = ["pid" => $pid, "output" => $output[1]];
        return json_encode($jsonModel);
    }

    function getPids()
    {
        $pids = ["pids" => ""];
        $lines = file("pidlist", FILE_IGNORE_NEW_LINES);
        $pids["pids"] = $lines;
        return json_encode($pids);
    }

    function processExists($pid)
    {
        return file_exists("/proc/{$pid}");
    }

}