# campaignmonitor
wrapper of campaign monitor php package

Laravel wrapper for CampaignMonitor APIs support Laravel 5 and 6

## Installation

Pull in the package through Composer;
```
composer require svikramjeet/campaignmonitor
```

If you have auto-discover for Laravel packages, please skip this.
Add the service provider to `config/app.php`
```php
Svikramjeet\CampaignMonitor\Providers\CampaignMonitorServiceProvider::class,
```

This package has a Laravel facade. You can register it in the `aliases` array in the `config/app.php` file
```php
'CampaignMonitor' => Svikramjeet\CampaignMonitor\Facades\CampaignMonitor::class,
```

Publish the config file if you want to modify it.
```
$ php artisan vendor:publish --provider="Svikramjeet\CampaignMonitor\Providers\CampaignMonitorServiceProvider"
```

And set your own API key and Client ID via .env or similar to match these.
```
CAMPAIGNMONITOR_API_KEY=YourKey
CAMPAIGNMONITOR_CLIENT_ID=123456789
```

## Usage

You can find all the methods in their package [campaignmonitor/createsend-php package](https://github.com/campaignmonitor/createsend-php).

Some examples;
```php
// Add a subscriber to a list
$result = CampaignMonitor::subscribers('LIST_ID')->add([
    'EmailAddress' => 'email@example.com',
    'Name' => 'Ben',
    'ConsentToTrack' => 'No', // Yes, No, or Unchanged - now required by API v3.2
]);
```
```php
// Create a list for your client
$result = CampaignMonitor::lists()->create(config('campaignmonitor.client_id'), [
    'Title' => 'List name',
]);
```

To send classic transactional emails
```php
$data = [
    'From' => 'from@example.org',
    'To' => 'to@example.org',
    'ReplyTo' => 'replyto@example.org',
    'CC' => 'cc@example.org',
    'BCC' => 'bcc@example.org',
    'HTML' => '<p>Hello there!</p>',
    'Text' => 'Hello there!',
    'ConsentToTrack' => 'No', // Yes, No, or Unchanged - now required by API v3.2
];

CampaignMonitor::classicSend('CLIENT_ID')->send($data);
```
