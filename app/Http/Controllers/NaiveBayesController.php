<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Phpml\Classification\NaiveBayes;

class NaiveBayesController extends Controller
{
    public function index(Request $request) {
        // READ DATA TRAIN
        $filenameTrain = $request->file('train')->getClientOriginalName();
        $request->file('train')->move(public_path('/'), $filenameTrain);
        $ftrain = fopen($filenameTrain, "r");
        $samples = [];
        $labels = [];
        while (!feof($ftrain)) {
            $sample = fgetcsv($ftrain);
            array_shift($sample);
            $label = array_pop($sample);
            array_push($samples, $sample);
            array_push($labels, $label);
        }
        fclose($ftrain);
        array_shift($samples);
        array_shift($labels);
        // print_r($samples[0]);
        // print_r($labels[0]);

        // NAIVE BAYES TRAIN
        $classifier = new NaiveBayes();
        $classifier->train($samples, $labels);

        // READ DATA TEST
        $filenameTest = $request->file('test')->getClientOriginalName();
        $request->file('test')->move(public_path('/'), $filenameTest);
        $ftest = fopen($filenameTest, "r");
        $tests = [];
        while (!feof($ftest)) {
            $test = fgetcsv($ftest);
            array_shift($test);
            array_pop($test);
            array_push($tests, $test);
        }
        fclose($ftest);
        array_shift($tests);
        // print_r($tests[0]);

        // CLASSIFICATION
        foreach($tests as $test) {
            echo $classifier->predict($test);
            echo "<br>";
        }
    }
}
