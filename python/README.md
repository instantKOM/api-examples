# instantKOM API - Python Examples

Python code examples for the instantKOM API.

## Requirements

- Python 3.7 or higher
- pip

## Setup

1. Install dependencies: `pip install -r requirements.txt`
2. Copy `.env.example` to `.env`
3. Add your API key to `.env`
4. Run any example: `python send_message.py`

## Installation

```bash
# Create virtual environment (recommended)
python -m venv venv
source venv/bin/activate  # On Windows: venv\Scripts\activate

# Install dependencies
pip install -r requirements.txt
```

## Configuration

Create a `.env` file:

```env
API_KEY=YOUR_API_KEY_HERE
BASE_URL=https://api.instantkom.app
```

## Available Examples

| File | Description |
|------|-------------|
| `send_message.py` | Send a 1:1 message |
| `list_channels.py` | List all channels |
| `create_broadcast.py` | Create and send a broadcast |
| `list_contacts.py` | List contacts with pagination |
| `create_tag.py` | Create and assign tags |
| `upload_media.py` | Send images/videos/documents |
| `webhook_server.py` | Flask webhook server |

## Quick Start

```bash
# Install dependencies
pip install -r requirements.txt

# Copy environment file
cp .env.example .env

# Edit .env and add your API key

# Run an example
python send_message.py
```
