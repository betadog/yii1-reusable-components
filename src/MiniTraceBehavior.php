<?php

namespace betadog\yii1;

/**
 * Class MiniTrace
 *
 * Usage:
 * Add those to ./protected/config/main.php
<pre>
    'behaviors'         => [
        'miniTrace' => [
            'class' => 'betadog\\yii1\\MiniTraceBehavior',
        ],
    ],
</pre>
 *
 * And now u can use it anywhere like:
 * echo Yii:app()->miniTrace();
 *
 */
class MiniTraceBehavior extends \CBehavior
{
    public function getMiniTrace(): string
    {
        $result = [];
        $trace  = debug_backtrace();
        array_shift($trace);
        foreach ($trace as $one) {
            if (!isset($one['file']))
                $result [] = 'unknown';
            else
                $result [] = sprintf('%s -- %s:%d', $one['function'], $one['file'], $one["line"]);
        }

        return implode("\n", $result);
    }
}