<?php

use Orhanerday\OpenAi\OpenAi;

// READ PDF
include 'read-pdf/vendor/autoload.php';
$parser = new \Smalot\PdfParser\Parser();

// OPENAI
include 'openai/vendor/autoload.php';
$open_ai = new OpenAi('API_KEY');

// PARSE FILE
$filePath = 'pdf/accountstatment.pdf';
$pdf = $parser->parseFile($filePath);
$text = $pdf->getText();
if(strlen($text)) {

   // OPENAI COMPLETION
   $prompt = $text.'
   I will inquire about some details related to biodata:
   {
      "trainingInstituteName" : "Training Institute name?",
      "trainingLocation" : "Training Location?",
      "trainingYear" : "Training Year?",
      "trainingDuration" : "Training Duration?",
      "EmailAddress" : "Email address?"
   }
   Please respond with JSON, and avoid providing any information outside of the JSON format. If there is no answer available, please leave the corresponding field blank.
   ';
   // echo nl2br($prompt);exit();

   $response = $open_ai->completion([
      'model' => 'gpt-3.5-turbo-instruct',
      'prompt' => $prompt,
      'temperature' => 0.5,
      'max_tokens' => 150,
      'frequency_penalty' => 0,
      'presence_penalty' => 0,
   ]);
   $result = json_decode($response);
   $data = $result->choices[0]->text;

   // echo $data;

   $manage = json_decode($data, true);
   echo '<pre>';
   print_r($manage);
   // print_r($manage['trainingInstituteName']);

} else 
   echo 'File is not readable.';

?>