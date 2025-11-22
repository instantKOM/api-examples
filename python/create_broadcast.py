"""
instantKOM API Example: Create and Send Broadcast

This example demonstrates how to create a broadcast campaign
and send it to multiple recipients.
"""

import os
import requests
from dotenv import load_dotenv

# Load environment variables
load_dotenv()

API_KEY = os.getenv('API_KEY')
BASE_URL = os.getenv('BASE_URL', 'https://api.instantkom.app')


def create_and_send_broadcast():
    """Create and send a broadcast campaign."""
    url = f'{BASE_URL}/v1/broadcasts'

    headers = {
        'Authorization': f'Bearer {API_KEY}',
        'Content-Type': 'application/json',
    }

    data = {
        'channelId': 123,  # Your channel ID
        'name': 'Summer Sale 2025',
        'message': 'Check out our amazing summer sale! 50% off on selected items.',
        'recipients': [
            '+49151234567890',
            '+49152345678901',
            '+49153456789012',
        ],
        # Optional: Schedule for later
        # 'scheduledAt': '2025-12-01T10:00:00Z',
    }

    try:
        # Step 1: Create broadcast
        response = requests.post(url, json=data, headers=headers)
        response.raise_for_status()

        result = response.json()
        broadcast_id = result['data']['id']

        print('Broadcast created successfully!')
        print(f'Broadcast ID: {broadcast_id}')
        print(f'Status: {result["data"]["status"]}')
        print(f'Recipients: {len(data["recipients"])}')

        # Step 2: Send broadcast
        send_url = f'{BASE_URL}/v1/broadcasts/{broadcast_id}/send'
        send_response = requests.post(send_url, headers=headers)
        send_response.raise_for_status()

        print('\nBroadcast sent successfully!')
        print(send_response.json())

    except requests.exceptions.HTTPError as e:
        print(f'Error: {e.response.status_code}')
        print(e.response.json())
    except Exception as e:
        print(f'Error: {e}')


if __name__ == '__main__':
    create_and_send_broadcast()
