"""
instantKOM API Example: Send Message

This example demonstrates how to send a 1:1 message
to a contact via WhatsApp, Telegram, or any other channel.
"""

import os
import requests
from dotenv import load_dotenv

# Load environment variables
load_dotenv()

API_KEY = os.getenv('API_KEY')
BASE_URL = os.getenv('BASE_URL', 'https://api.instantkom.app')


def send_message():
    """Send a message via the instantKOM API."""
    url = f'{BASE_URL}/v1/messages'

    headers = {
        'Authorization': f'Bearer {API_KEY}',
        'Content-Type': 'application/json',
    }

    data = {
        'channelId': 123,  # Your channel ID
        'to': '+49151234567890',  # Recipient phone number
        'message': 'Hello from instantKOM API!',
    }

    try:
        response = requests.post(url, json=data, headers=headers)
        response.raise_for_status()

        result = response.json()
        print('Message sent successfully!')
        print(f'Message ID: {result["data"]["id"]}')
        print(result)
    except requests.exceptions.HTTPError as e:
        print(f'Error sending message: {e.response.status_code}')
        print(e.response.json())
    except Exception as e:
        print(f'Error: {e}')


if __name__ == '__main__':
    send_message()
