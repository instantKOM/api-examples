#!/bin/bash

# instantKOM API Example: Send Message
# Usage: ./send-message.sh
#
# Sends a 1:1 text message to a recipient by their internal ID.
# To find the recipient ID, use the contacts endpoint:
#   GET /v1/contacts?search=<phone_or_name>

# Load configuration
source config.sh 2>/dev/null || { echo "Error: config.sh not found. Copy config.example.sh to config.sh"; exit 1; }

# Recipient ID (internal instantKOM contact ID, not a phone number)
RECIPIENT_ID=${1:-12345}

# Send message
curl -X POST "${BASE_URL}/v1/messages" \
  -H "Authorization: Bearer ${API_KEY}" \
  -H "Content-Type: application/json" \
  -d "{
    \"recipientId\": ${RECIPIENT_ID},
    \"message\": \"Hello from instantKOM API via cURL!\",
    \"messageType\": \"text\"
  }" \
  | json_pp

echo -e "\nMessage sent!"
