<?php

date_default_timezone_set('Asia/Tokyo');

while (true) {
    echo '番号を選んでください(1,2,9)' . PHP_EOL;
    echo '1.作業時間を記録する'. PHP_EOL;
    echo '2.作業時間を表示する'. PHP_EOL;
    echo '9.アプリケーションを終了する'. PHP_EOL;
    $num = trim(fgets(STDIN));
    echo PHP_EOL . PHP_EOL;
    
    if ($num === '1') {
        echo '作業時間を記録します' . PHP_EOL;
        echo '作業内容を入力してください：';
        $work = trim(fgets(STDIN));
        echo PHP_EOL . PHP_EOL;
        
        $date = new DateTime();
        
        while (true) {
            echo '番号を選んでください(1,2)' . PHP_EOL;
            echo '1.作業を開始する' . PHP_EOL;
            echo '2.作業を終了する' . PHP_EOL;
            $number = trim(fgets(STDIN));
            echo PHP_EOL;
            
            if ($number === '1') {
                $start = new Datetime();
                echo $start->format('Y-m-d H:i:s') . PHP_EOL;
                echo PHP_EOL;
                
            } elseif ($number === '2') {
                $finish = new DateTime();
                echo $finish->format('Y-m-d H:i:s') . PHP_EOL;
                echo PHP_EOL . PHP_EOL;
                
                $interval = $start->diff($finish);
                echo $interval->format('%H:%I:%S') . PHP_EOL;
                echo PHP_EOL . PHP_EOL;
                
                echo '作業時間を記録しました' . PHP_EOL;
                echo '作業内容：' . $work . PHP_EOL;
                echo '作業日：' . $date->format('Y-m-d') . PHP_EOL;
                echo '作業時間：' . $interval->format('%H:%I:%S') . PHP_EOL;
                echo PHP_EOL . PHP_EOL;
                
                $timeRecords[] = [
                    'work' => $work,
                    'date' => $date,
                    'interval' => $interval,
                ];
                
                break;
            }
        }
        
    } elseif ($num === '2') {

        echo '作業時間一覧を表示します' . PHP_EOL . PHP_EOL;

        foreach ($timeRecords as $timeRecord) {
            echo '作業内容：' . $timeRecord['work'] . PHP_EOL;
            echo '作業日：' . $timeRecord['date']->format('Y-m-d') . PHP_EOL;
            echo '作業時間：' . $timeRecord['interval']->format('%H:%I:%S') . PHP_EOL . PHP_EOL;
        }

    } elseif ($num === '9') {
        break;
    }
}



