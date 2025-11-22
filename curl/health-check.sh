#!/bin/bash

# instantKOM API Example: Health Check
# Usage: ./health-check.sh

# Base URL
BASE_URL=${BASE_URL:-"https://api.instantkom.app"}

# Check API health (no authentication required)
echo "Checking API health at ${BASE_URL}..."
curl -X GET "${BASE_URL}/v1/health" | json_pp

echo -e "\nHealth check complete!"
