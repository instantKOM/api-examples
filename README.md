# instantKOM API Examples

Ready-to-use code examples for the instantKOM API in multiple programming languages.

[![API Documentation](https://img.shields.io/badge/API%20Docs-Swagger-orange)](https://api.instantkom.app/api-docs)
[![API Status](https://img.shields.io/badge/API-Operational-success)](https://api.instantkom.app/v1/health)

## Quickstart

### 1. Get Your API Key

1. Sign up at [instantKOM](https://start.instantkom.app)
2. Navigate to Settings > API Keys
3. Create a new API key
4. Copy your API key (format: 64 characters)

### 2. Choose Your Language

| Language | Folder | Prerequisites |
|----------|--------|---------------|
| PHP | [`/php`](./php) | PHP 7.4+ |
| JavaScript/Node.js | [`/javascript`](./javascript) | Node.js 14+ |
| Python | [`/python`](./python) | Python 3.7+ |
| .NET/C# | [`/dotnet`](./dotnet) | .NET 6.0+ |
| cURL | [`/curl`](./curl) | curl |

### 3. Run Your First Example

Each language folder contains:
- `README.md` - Setup instructions
- `send-message.{ext}` - Send a simple message
- `list-channels.{ext}` - List all channels
- `create-broadcast.{ext}` - Create and send a broadcast
- And more...

## Common Examples

### Send a Message

Send a 1:1 message to a contact via WhatsApp, Telegram, etc.

**Quick Example (cURL):**
```bash
curl -X POST https://api.instantkom.app/v1/messages \
  -H "Authorization: Bearer YOUR_API_KEY" \
  -H "Content-Type: application/json" \
  -d '{
    "channelId": 123,
    "to": "+49151234567890",
    "message": "Hello from instantKOM!"
  }'
```

See language-specific examples:
- [PHP Example](./php/send-message.php)
- [JavaScript Example](./javascript/send-message.js)
- [Python Example](./python/send_message.py)
- [.NET Example](./dotnet/SendMessage.cs)

### List Channels

Get all your configured messaging channels.

**Quick Example (cURL):**
```bash
curl -X GET https://api.instantkom.app/v1/channels \
  -H "Authorization: Bearer YOUR_API_KEY"
```

See language-specific examples:
- [PHP Example](./php/list-channels.php)
- [JavaScript Example](./javascript/list-channels.js)
- [Python Example](./python/list_channels.py)
- [.NET Example](./dotnet/ListChannels.cs)

### Create Broadcast

Send a message to multiple contacts at once.

**Quick Example (cURL):**
```bash
curl -X POST https://api.instantkom.app/v1/broadcasts \
  -H "Authorization: Bearer YOUR_API_KEY" \
  -H "Content-Type: application/json" \
  -d '{
    "channelId": 123,
    "name": "Summer Campaign",
    "message": "Check out our summer sale!",
    "recipients": ["+49151...", "+49152..."]
  }'
```

See language-specific examples:
- [PHP Example](./php/create-broadcast.php)
- [JavaScript Example](./javascript/create-broadcast.js)
- [Python Example](./python/create_broadcast.py)
- [.NET Example](./dotnet/CreateBroadcast.cs)

## All Available Examples

### Core Messaging
- ✅ Send Message
- ✅ List Messages
- ✅ Get Message
- ✅ Update Message
- ✅ Delete Message

### Channels
- ✅ List Channels
- ✅ Get Channel
- ✅ Create Channel
- ✅ Update Channel
- ✅ Delete Channel

### Contacts
- ✅ List Contacts
- ✅ Get Contact
- ✅ Create Contact
- ✅ Update Contact
- ✅ Delete Contact
- ✅ Tag Contact
- ✅ Untag Contact

### Broadcasts
- ✅ Create Broadcast
- ✅ List Broadcasts
- ✅ Get Broadcast
- ✅ Send Broadcast
- ✅ Delete Broadcast

### Tags
- ✅ List Tags
- ✅ Create Tag
- ✅ Update Tag
- ✅ Delete Tag
- ✅ Assign Recipients to Tag

### Templates
- ✅ List Templates
- ✅ Create Template
- ✅ Use Template

### Bots
- ✅ List Bots
- ✅ Create Bot
- ✅ Update Bot
- ✅ Delete Bot

### QR Codes
- ✅ Generate QR Code
- ✅ List QR Codes
- ✅ Delete QR Code

### Advanced
- ✅ Webhooks Configuration
- ✅ Rate Limiting Handling
- ✅ Error Handling
- ✅ Pagination
- ✅ File Uploads (Images, Videos, Documents)

## Authentication

All API requests require authentication via API Key:

```http
Authorization: Bearer YOUR_API_KEY
```

The API key is a 64-character string found in your instantKOM dashboard under Settings > API Keys.

## Base URL

**Production:**
```
https://api.instantkom.app
```

**Local Development:**
```
http://localhost:3002
```

## Error Handling

The API uses standard HTTP status codes:

| Status Code | Meaning |
|-------------|---------|
| 200 | Success |
| 201 | Created |
| 400 | Bad Request - Check your request parameters |
| 401 | Unauthorized - Invalid or missing API key |
| 403 | Forbidden - API key lacks required permissions |
| 404 | Not Found - Resource doesn't exist |
| 429 | Too Many Requests - Rate limit exceeded |
| 500 | Server Error - Contact support |

**Error Response Format:**
```json
{
  "code": 400,
  "error": "Bad Request",
  "message": "Field 'message' is required",
  "timestamp": "2025-11-22T12:00:00.000Z"
}
```

## Rate Limits

Default rate limits per API key:
- **100 requests per minute**
- **1000 requests per hour**
- **10000 requests per day**

Enterprise plans have higher limits. Contact sales for custom limits.

## Support

- **API Documentation**: [api.instantkom.app/api-docs](https://api.instantkom.app/api-docs)
- **Email Support**: [hallo@instantkom.app](mailto:hallo@instantkom.app)
- **Website**: [start.instantkom.app](https://start.instantkom.app)

## Contributing

Found a bug or want to add an example? Contributions are welcome!

1. Fork this repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

These examples are provided as-is for use with the instantKOM API.

---

**Developed by [Virtual Art Online](https://github.com/virtualart-online)**
