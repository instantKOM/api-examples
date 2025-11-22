#!/bin/bash

# instantKOM API Example: Send Message
# Usage: ./send-message.sh

# Load configuration
source config.sh 2>/dev/null || { echo "Error: config.sh not found. Copy config.example.sh to config.sh"; exit 1; }

# Send message
curl -X POST "${BASE_URL}/v1/messages" \
  -H "Authorization: Bearer ${API_KEY}" \
  -H "Content-Type: application/json" \
  -d "{
    \"channelId\": ${CHANNEL_ID},
    \"to\": \"${TEST_RECIPIENT}\",
    \"message\": \"Hello from instantKOM API via cURL!\"
  }" \
  | json_pp

echo -e "\nMessage sent!"
