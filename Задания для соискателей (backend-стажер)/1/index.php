<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1</title>
    <link rel="stylesheet" href="vendor/css/main.css">
</head>
<body>
    <?php
    $data = [
        ['Иванов', 'Математика', 5],
        ['Иванов', 'Математика', 4],
        ['Иванов', 'Математика', 5],
        ['Петров', 'Математика', 5],
        ['Сидоров', 'Физика', 4],
        ['Иванов', 'Физика', 4],
        ['Петров', 'ОБЖ', 4],
    ];

    array_multisort($data);
    
    $sort_data = array();
    $sort_data[] = $data[0]; 
    
    for ($i = 1; $i < count($data); $i++) {
        $prev_row = $data[$i - 1];
        $curr_row = $data[$i];
        if ($prev_row[0] === $curr_row[0] and $prev_row[1] === $curr_row[1]) {
            $sort_data[count($sort_data) - 1][2] += $curr_row[2];
        } else {
            $sort_data[] = $curr_row;
        }
    }//Массив отсортирован без повторений по алфавиту

    
    $subjects = array_unique(array_column($sort_data, 1));
    sort($subjects);
    
    $table_header = '<tr><th></th>';
    foreach ($subjects as $subject) {
        $table_header .= '<th>' . $subject . '</th>';
    }
    $table_header .= '</tr>';
    
    $table_rows = '';
    $surnames = array_unique(array_column($sort_data, 0));
    foreach ($surnames as $surname) {
        $table_row = '<tr><td>' . $surname . '</td>';
        foreach ($subjects as $subject) {
            $grade = '';
            foreach ($sort_data as $data) {
                if ($data[0] == $surname and $data[1] == $subject){
                    $grade = $data[2];
                    break;
                }
            }
            $table_row .= '<td>' . $grade . '</td>';
        }
        $table_row .= '</tr>';
        $table_rows .= $table_row;
    }
    
    
    $html_table = '<table border="1">' . $table_header . $table_rows . '</table>';
    
    echo $html_table;
    
    



    ?>

    
</body>
</html>