<?php
    function createQuestion($fileQuestion = 'data/question.txt', $fileOption = 'data/options.txt'){
        $data = file($fileQuestion) or die('Cannot read file');
        array_shift($data); //Hàm bỏ phần tử đầu tiên của mảng
    
        $arrQuestion = array();
        foreach ($data as $key => $value) {
            $tmp        = explode("|", $value);
            $arrQuestion[$tmp[0]] = array('question' => $tmp[1], 'answer' => 'option-'.trim($tmp[2]));
        }
    
        //Get Answer for each question
        $data = file($fileOption) or die('Cannot read file');
        array_shift($data); //Hàm bỏ phần tử đầu tiên của mảng
    
        foreach ($data as $key => $value) {
            $tmp        = explode("|", $value);
            $arrQuestion[$tmp[0]]['option-'.$tmp[1]] = trim($tmp[2]);
        }

        //Random Elements From Array
        shuffle($arrQuestion);  //Trộn ngẫu nhiên
        $arrQuestion = array_slice($arrQuestion, 0, 5); //Lấy ngẫu nhiên 5 câu hỏi

        return $arrQuestion;
    }


    function showAnswer($idQuestion, $valueRadio, $contentAnswer){
        return '<div class="radio">
                    <label><input type="radio" name="'.$idQuestion.'" value="'.$valueRadio.'" >'.$contentAnswer.'</label>
                </div>';
    }

?>