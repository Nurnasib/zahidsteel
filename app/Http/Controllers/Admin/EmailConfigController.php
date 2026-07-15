<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailConfig;
use Illuminate\Http\Request;

class EmailConfigController extends Controller
{
    public function index()
    {

        $data['title'] = ' Email Configuration';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Email Configuration';
        $data['addTitle'] = 'Add New Email Configuration';
        $data['editTitle'] = ' Edit Email Configuration';
        $data['dataInfo'] = EmailConfig::find(1);

        return view('backend.email', $data);

    }

    public function addOrUpdateInfo(Request $request)
    {
        $request->validate([
            'mail_mailer' => 'required|string',
            'mail_host' => 'required|string',
            'port' => 'required|numeric',
            'mail_username' => 'required|string',
            'password' => 'required|string',
            'mail_encryption' => 'required|string',
            'email_name' => 'required|email',
            'mail_name' => 'required|string',

        ]);

        // ✅ Step 1: Save into database
        EmailConfig::updateOrCreate(
            ['id' => 1], // always update row with ID=1 (or use your logic)
            [
                'mail_mailer' => $request->mail_mailer,
                'mail_host' => $request->mail_host,
                'port' => $request->port,
                'mail_username' => $request->mail_username,
                'password' => $request->password,
                'mail_encryption' => $request->mail_encryption,
                'email_name' => $request->email_name,
                'mail_name' => $request->mail_name,
                'status' => $request->status,
            ]
        );

        // ✅ Step 2: Save into .env
        $this->setEnvValue('MAIL_MAILER', $request->mail_mailer);
        $this->setEnvValue('MAIL_HOST', $request->mail_host);
        $this->setEnvValue('MAIL_PORT', $request->port);
        $this->setEnvValue('MAIL_USERNAME', $request->mail_username);
        $this->setEnvValue('MAIL_PASSWORD', $request->password);
        $this->setEnvValue('MAIL_ENCRYPTION', $request->mail_encryption);
        $this->setEnvValue('MAIL_FROM_ADDRESS', $request->email_name);
        $this->setEnvValue('MAIL_FROM_NAME', $request->mail_name);

        return redirect()->back()->with('message', 'Email configuration updated successfully!');
    }

    /**
     * Helper function to update or append .env keys
     */
    /**
     * Helper function to update or append .env keys
     */
    private function setEnvValue($key, $value)
    {
        $path = base_path('.env');

        if (! file_exists($path)) {
            return false;
        }

        $env = file_get_contents($path);

        // Escape special characters and wrap value in quotes if needed
        $value = $this->formatEnvValue($value);

        $pattern = "/^{$key}=.*/m";

        if (preg_match($pattern, $env)) {
            // Update existing key
            $env = preg_replace($pattern, "{$key}={$value}", $env);
        } else {
            // Append new key
            $env .= "\n{$key}={$value}";
        }

        file_put_contents($path, $env);

        // Clear config cache to apply changes immediately
        \Artisan::call('config:clear');
    }

    /**
     * Format value for .env file (add quotes if needed)
     */
    private function formatEnvValue($value)
    {
        // If value is null or empty, return empty quotes
        if ($value === null || $value === '') {
            return '""';
        }

        // Convert to string
        $value = (string) $value;

        // If value contains spaces, special characters, or quotes, wrap in double quotes
        if (preg_match('/\s|[#$&*(){}[\]|\\<>?;]/', $value) || str_contains($value, '"')) {
            // Escape existing double quotes
            $value = str_replace('"', '\\"', $value);

            return "\"{$value}\"";
        }

        return $value;
    }
}
