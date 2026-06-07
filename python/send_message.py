"""
instantKOM API Example: Send Message

Sends a 1:1 text message to a recipient by their internal ID.
To find the recipient ID, use the contacts endpoint:
  GET /v1/contacts?search=<phone_or_name>
"""

import os
import requests
from dotenv import load_dotenv

# Load environment variables
load_dotenv()

API_KEY = os.getenv('API_KEY')
BASE_URL = os.getenv('BASE_URL', 'https://api.instantkom.app')


def send_message():
    """Send a text message via the instantKOM API."""
    url = f'{BASE_URL}/v1/messages'

    headers = {
        'Authorization': f'Bearer {API_KEY}',
        'Content-Type': 'application/json',
    }

    data = {
        'recipientId': 12345,  # Internal instantKOM contact ID (not a phone number)
        'message': 'Hello from instantKOM API!',
        'messageType': 'text',
    }

    try:
        response = requests.post(url, json=data, headers=headers)
        response.raise_for_status()

        result = response.json()
        print('Message sent successfully!')
        print(f'Message ID: {result["id"]}')
        print(result)
    except requests.exceptions.HTTPError as e:
        print(f'Error sending message: {e.response.status_code}')
        print(e.response.json())
    except Exception as e:
        print(f'Error: {e}')


if __name__ == '__main__':
    send_message()
