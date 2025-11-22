# instantKOM API - PHP Examples

PHP code examples for the instantKOM API.

## Requirements

- PHP 7.4 or higher
- cURL extension enabled
- Composer (optional, for dependencies)

## Setup

1. Copy `config.example.php` to `config.php`
2. Add your API key to `config.php`
3. Run any example: `php send-message.php`

## Configuration

```php
<?php
// config.php
return [
    'api_key' => 'YOUR_API_KEY_HERE', // 64 characters
    'base_url' => 'https://api.instantkom.app',
];
```

## Available Examples

| File | Description |
|------|-------------|
| `send-message.php` | Send a 1:1 message |
| `list-channels.php` | List all channels |
| `create-broadcast.php` | Create and send a broadcast |
| `list-contacts.php` | List contacts with pagination |
| `create-tag.php` | Create and assign tags |
| `upload-media.php` | Send images/videos/documents |
| `webhook-handler.php` | Handle incoming webhooks |

## Quick Start

```bash
# Copy config
cp config.example.php config.php

# Edit config.php and add your API key

# Run an example
php send-message.php
```

## Using with Composer

For production applications, use Guzzle or similar HTTP client:

```bash
composer require guzzlehttp/guzzle
```

See `send-message-guzzle.php` for an example using Guzzle.
