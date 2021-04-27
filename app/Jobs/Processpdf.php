<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Processpdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($pdfPath)
    {
        $this->pdfPath = $pdfPath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      require __DIR__.'/vendor/autoload.php';
      use Spatie\PdfToText\Pdf;

      function getEmailsByString($string) {
        $pattern = '/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]+)(?:\.[a-z]{2})?/i';
        preg_match_all($pattern, $string, $matches);
        return array_unique($matches[0]);
      }

      function getUrlsByString($string) {
        $pattern = '/((https?):\/\/)?[-a-zA-Z0-9:%._\+~#]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9():%_\+.~#?&=]*)/i';
        preg_match_all($pattern, $string, $matches);
        return array_unique($matches[0]);
      }

      function getPhonesNumbersByString($string) {
        $pattern1 = '/^[0-9\-\(\)\/\+\s]*$/i';
        preg_match_all($pattern1, $string, $search1);
        return array_unique($search1[0]);
      };

      $fileUrl = $this->pdfPath;

      $pdfString = (new Pdf())
          ->setPdf($fileUrl)
          ->text();


      if ($pdfString === '') {
        $tempImage = sys_get_temp_dir().'\tempFile.pdf';
        copy($fileUrl, $tempImage);
        exec('ocrmypdf '.$tempImage.' '.sys_get_temp_dir().'\processedTempFile.pdf', $output, $result_code);
        $pdfString = (new Pdf())
            ->setPdf(sys_get_temp_dir().'\processedTempFile.pdf')
            ->text();
        unlink(sys_get_temp_dir().'\processedTempFile.pdf');
        unlink($tempImage);
      };

      $data = array('emails' => getEmailsByString($pdfString),
                    'urls' => getUrlsByString($pdfString),
                    'phones' => getPhonesNumbersByString($pdfString),
                    );
      var_dump($data);
      echo($pdfString);
    }
}
