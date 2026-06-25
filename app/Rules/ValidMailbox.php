<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class ValidMailbox implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_string($value) || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return; // handled by 'email' rule
        }

        $domain = substr(strrchr($value, "@"), 1);
        if (!$domain) return;

        getmxrr($domain, $mxhosts);
        if (empty($mxhosts)) {
            $fail('This email does not exist.');
            return;
        }

        $mx = $mxhosts[0];
        // Timeout 3 seconds
        $connect = @fsockopen($mx, 25, $errno, $errstr, 3);

        if ($connect) {
            fgets($connect, 1024); // read welcome
            fputs($connect, "HELO localhost\r\n");
            fgets($connect, 1024); // read helo response

            fputs($connect, "MAIL FROM: <no-reply@example.com>\r\n");
            fgets($connect, 1024); // read mail from response

            fputs($connect, "RCPT TO: <$value>\r\n");
            $response = fgets($connect, 1024); // read rcpt to response

            fputs($connect, "QUIT\r\n");
            fclose($connect);

            // If the server rejects the RCPT TO command (e.g. 550 error)
            if (strpos($response, '250') !== 0) {
                $fail('This email does not exist or cannot receive messages.');
            }
        }
    }
}
