"""
instantKOM API Example: List Channels

This example demonstrates how to retrieve all your messaging channels.
"""

import os
import requests
from dotenv import load_dotenv

# Load environment variables
load_dotenv()

API_KEY = os.getenv('API_KEY')
BASE_URL = os.getenv('BASE_URL', 'https://api.instantkom.app')


def list_channels(page=1, limit=10):
    """List all messaging channels with pagination."""
    url = f'{BASE_URL}/v1/channels'

    headers = {
        'Authorization': f'Bearer {API_KEY}',
    }

    params = {
        'page': page,
        'limit': limit,
    }

    try:
        response = requests.get(url, headers=headers, params=params)
        response.raise_for_status()

        result = response.json()

        print(f'Channels (Page {page}):')
        print('=' * 50)

        for channel in result['data']:
            print(f'ID: {channel["id"]}')
            print(f'Name: {channel["name"]}')
            print(f'Type: {channel["type"]}')
            print(f'Status: {"Active" if channel["status"] else "Inactive"}')
            print('-' * 50)

        # Pagination info
        if 'meta' in result:
            print(f'\nTotal: {result["meta"]["total"]}')
            print(f'Pages: {result["meta"]["totalPages"]}')

    except requests.exceptions.HTTPError as e:
        print(f'Error retrieving channels: {e.response.status_code}')
        print(e.response.json())
    except Exception as e:
        print(f'Error: {e}')


if __name__ == '__main__':
    list_channels()
