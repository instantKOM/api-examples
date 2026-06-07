# instantKOM API Examples

Ready-to-use code examples for the instantKOM REST API in multiple programming languages.

## Languages

| Language      | Folder                        | Prerequisites   |
|---------------|-------------------------------|-----------------|
| cURL          | [`/curl`](./curl)             | curl            |
| JavaScript    | [`/javascript`](./javascript) | Node.js 14+     |
| PHP           | [`/php`](./php)               | PHP 7.4+        |
| Python        | [`/python`](./python)         | Python 3.7+     |

## Authentication

All API requests require authentication via API Key:

```http
Authorization: Bearer YOUR_API_KEY
```

The API key is found in your instantKOM dashboard under Settings > API Keys.

## Examples

### Send a Message

Send a 1:1 text message to a contact by their internal `recipientId`.
Use `GET /v1/contacts` to look up the recipient ID.

- [cURL](./curl/send-message.sh)
- [JavaScript](./javascript/send-message.js)
- [PHP](./php/send-message.php)
- [Python](./python/send_message.py)

### List Channels

List all configured messaging channels.

- [cURL](./curl/list-channels.sh)
- [JavaScript](./javascript/list-channels.js)
- [PHP](./php/list-channels.php)
- [Python](./python/list_channels.py)

### Create Broadcast

Send a message to all contacts in a channel (or a segment).
Broadcasts target stored contacts — not raw phone numbers.
Use `segmentId` to restrict the audience.

- [JavaScript](./javascript/create-broadcast.js)
- [PHP](./php/create-broadcast.php)
- [Python](./python/create_broadcast.py)

## Base URL

```
https://api.instantkom.app
```

## API Documentation

Full API reference: [api.instantkom.app/api-docs](https://api.instantkom.app/api-docs)

## Public Repository

These examples are also available at:
[github.com/instantKOM/api-examples](https://github.com/instantKOM/api-examples)

## License

MIT License - see [LICENSE](./LICENSE)
