<?php
    function createQuestion($fileQuestion = 'data/question.txt', $fileOption = 'data/options.txt'){
        //Get Question
        $data = file($fileQuestion) or die('Cannot read file');
        array_shift($data); //Hàm bỏ phần tử đầu tiên của mảng
    
        $arrQuestion = array();
        foreach ($data as $key => $value) {
            $tmp        = explode("|", $value);
            $arrQuestion[$tmp[0]] = array('id' => $tmp[0], 'question' => $tmp[1], 'answer' => 'option-'.trim($tmp[2]));
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
                    <label><input type="radio" name="question-'.$idQuestion.'" value="'.$valueRadio.'" >'.$contentAnswer.'</label>
                </div>';
    }

    function showAnswerCheck($option, $optionUser, $optionCorrect, $contentAnswer){
        $classLabel = '';
        $spanContent = '';
        if($option == $optionUser){
            $classLabel = 'class = "label label-default"';
            if($optionUser == $optionCorrect){
                $spanContent = '&nbsp;<span class="glyphicon glyphicon-ok"></span>';;
            }else{
                $spanContent = '&nbsp;<span class="glyphicon glyphicon-remove"></span>';
            }
        }else{
            if($option == $optionCorrect){
                $classLabel = 'class = "label label-success"';
            }
        }
        $xhtml = '<div class="radio">
                    <label '.$classLabel.'>
                        <input type="radio" name="radio1" disabled="disabled" >'.$contentAnswer.'
                    </label>
                    '.$spanContent.'
                </div>';
        return $xhtml;
    }

    function redirect($fileName){
        if(file_exists($fileName)){
            header("Location: $fileName");
            exit();
        }
    }

?>