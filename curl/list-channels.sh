#!/bin/bash

# instantKOM API Example: List Channels
# Usage: ./list-channels.sh [page] [limit]

# Load configuration
source config.sh 2>/dev/null || { echo "Error: config.sh not found. Copy config.example.sh to config.sh"; exit 1; }

# Parameters
PAGE=${1:-1}
LIMIT=${2:-10}

# List channels
curl -X GET "${BASE_URL}/v1/channels?page=${PAGE}&limit=${LIMIT}" \
  -H "Authorization: Bearer ${API_KEY}" \
  | json_pp

echo -e "\nChannels listed (page ${PAGE}, limit ${LIMIT})"
