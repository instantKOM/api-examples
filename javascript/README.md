# instantKOM API - JavaScript/Node.js Examples

JavaScript/Node.js code examples for the instantKOM API.

## Requirements

- Node.js 14 or higher
- npm or yarn

## Setup

1. Install dependencies: `npm install`
2. Copy `.env.example` to `.env`
3. Add your API key to `.env`
4. Run any example: `node send-message.js`

## Installation

```bash
npm install
# or
yarn install
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
| `send-message.js` | Send a 1:1 message |
| `list-channels.js` | List all channels |
| `create-broadcast.js` | Create and send a broadcast |
| `list-contacts.js` | List contacts with pagination |
| `create-tag.js` | Create and assign tags |
| `upload-media.js` | Send images/videos/documents |
| `webhook-server.js` | Express.js webhook server |

## Quick Start

```bash
# Install dependencies
npm install

# Copy environment file
cp .env.example .env

# Edit .env and add your API key

# Run an example
node send-message.js
```

## Using with TypeScript

TypeScript examples are available in the `typescript/` subdirectory.

```bash
cd typescript
npm install
npx ts-node send-message.ts
```
