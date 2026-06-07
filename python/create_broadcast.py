"""
instantKOM API Example: Create and Send Broadcast

Creates a broadcast campaign for all contacts in a channel (or a segment)
and sends it immediately.

Broadcasts target contacts already stored in instantKOM, not raw phone numbers.
Use segment_id to restrict the audience to a specific contact segment.
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
    headers = {
        'Authorization': f'Bearer {API_KEY}',
        'Content-Type': 'application/json',
    }

    # Step 1: Create broadcast
    data = {
        'channelId': 505,  # Your channel ID
        'message': 'Check out our amazing summer sale! 50% off on selected items.',
        # Optional: restrict to a contact segment
        # 'segmentId': 123,
        # Optional: schedule for future send (Unix timestamp in seconds)
        # 'scheduledAt': 1735000000,
    }

    try:
        response = requests.post(f'{BASE_URL}/v1/broadcasts', json=data, headers=headers)
        response.raise_for_status()

        result = response.json()
        broadcast_id = result['id']

        print('Broadcast created successfully!')
        print(f'Broadcast ID: {broadcast_id}')
        print(f'Send status: {result.get("sendStatus")}')

        # Step 2: Send broadcast
        send_response = requests.post(
            f'{BASE_URL}/v1/broadcasts/{broadcast_id}/send',
            headers=headers,
        )
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
