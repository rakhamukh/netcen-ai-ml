<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Phpml\Classification\NaiveBayes;

class NaiveBayesController extends Controller {
    public function index() {
        return view('main');
    }

    // public function exec(Request $request) {
    //     // READ DATA TRAIN
    //     $filenameTrain = $request->file('train')->getClientOriginalName();
    //     $request->file('train')->move(public_path('/'), $filenameTrain);
    //     $ftrain = fopen($filenameTrain, "r");
    //     $samples = [];
    //     $labels = [];
    //     while (!feof($ftrain)) {
    //         $sample = fgetcsv($ftrain);
    //         array_shift($sample);
    //         $label = array_pop($sample);
    //         array_push($samples, $sample);
    //         array_push($labels, $label);
    //     }
    //     fclose($ftrain);
    //     array_shift($samples);
    //     array_shift($labels);
    //     // print_r($samples[0]);
    //     // print_r($labels[0]);

    //     // NAIVE BAYES TRAIN
    //     $classifier = new NaiveBayes();
    //     $classifier->train($samples, $labels);

    //     // READ DATA TEST
    //     $filenameTest = $request->file('test')->getClientOriginalName();
    //     $request->file('test')->move(public_path('/'), $filenameTest);
    //     $ftest = fopen($filenameTest, "r");
    //     $tests = [];
    //     while (!feof($ftest)) {
    //         $test = fgetcsv($ftest);
    //         array_pop($test);
    //         array_push($tests, $test);
    //     }
    //     fclose($ftest);
    //     array_shift($tests);
    //     // print_r($tests[0]);

    //     // CLASSIFICATION
    //     $data = [];
    //     foreach($tests as $test) {
    //         $id = array_shift($test);
    //         array_push($data, [
    //             'id' => $id,
    //             'result' => $classifier->predict($test),
    //         ]);
    //     }

    //     return view('main', [
    //         'data' => $data
    //     ]);
    // }

    public function execTrain(Request $request) {
        // READ DATA TRAIN
        $filenameTrain = $request->file('train')->getClientOriginalName();
        $request->file('train')->move(public_path('/'), $filenameTrain);
        $ftrain = fopen($filenameTrain, "r");
        $samples = [];
        $labels = [];
        $column = [];
        $columnName = [];
        while (!feof($ftrain)) {
            $sample = fgetcsv($ftrain);
            array_shift($sample);
            $label = array_pop($sample);
            array_push($samples, $sample);
            array_push($labels, $label);

            foreach ($sample as $key => $value) {
                if (!isset($column[$key])) {
                    $column[$key] = [];
                    array_push($columnName, $value);
                } else if (!in_array($value, $column[$key])) {
                    array_push($column[$key], $value);
                }
            }
        }
        fclose($ftrain);
        array_shift($samples);
        array_shift($labels);
        // var_dump($column);

        // return ;
        
        $classifier = new NaiveBayes();
        $classifier->train($samples, $labels);

        $request->session()->put('classifier', $classifier);

        return view('exec', [
            'columns' => array_combine($columnName, $column),
        ]);
    }

    public function execTest(Request $request) {
        $classifier = $request->session()->get('classifier');
        $result = $classifier->predict($request->all());

        return view('result', [
            'result' => $result,
        ]);
    }
}
