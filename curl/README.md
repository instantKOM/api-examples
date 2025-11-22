# instantKOM API - cURL Examples

Pure cURL examples for the instantKOM API - no programming language required!

## Requirements

- cURL (pre-installed on most systems)
- Bash shell (Linux/Mac) or Git Bash (Windows)

## Setup

1. Copy `config.example.sh` to `config.sh`
2. Add your API key to `config.sh`
3. Source the config: `source config.sh`
4. Run any example: `./send-message.sh`

## Configuration

Create `config.sh`:

```bash
#!/bin/bash

# Your API Key
export API_KEY="YOUR_API_KEY_HERE"

# API Base URL
export BASE_URL="https://api.instantkom.app"

# Your Channel ID
export CHANNEL_ID="123"
```

## Available Examples

| File | Description |
|------|-------------|
| `send-message.sh` | Send a 1:1 message |
| `list-channels.sh` | List all channels |
| `create-broadcast.sh` | Create and send a broadcast |
| `list-contacts.sh` | List contacts with pagination |
| `health-check.sh` | Check API health status |

## Quick Start

```bash
# Copy and configure
cp config.example.sh config.sh
# Edit config.sh and add your API key

# Source configuration
source config.sh

# Run an example
./send-message.sh

# Or run directly with cURL
curl -X GET https://api.instantkom.app/v1/health
```

## One-Liners

### Health Check
```bash
curl https://api.instantkom.app/v1/health
```

### Send Message
```bash
curl -X POST https://api.instantkom.app/v1/messages \
  -H "Authorization: Bearer YOUR_API_KEY" \
  -H "Content-Type: application/json" \
  -d '{
    "channelId": 123,
    "to": "+49151234567890",
    "message": "Hello!"
  }'
```

### List Channels
```bash
curl -X GET https://api.instantkom.app/v1/channels \
  -H "Authorization: Bearer YOUR_API_KEY"
```

### Create Broadcast
```bash
curl -X POST https://api.instantkom.app/v1/broadcasts \
  -H "Authorization: Bearer YOUR_API_KEY" \
  -H "Content-Type: application/json" \
  -d '{
    "channelId": 123,
    "name": "Test Campaign",
    "message": "Hello everyone!",
    "recipients": ["+49151...", "+49152..."]
  }'
```
