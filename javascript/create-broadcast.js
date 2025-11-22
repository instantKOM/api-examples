/**
 * instantKOM API Example: Create and Send Broadcast
 *
 * This example demonstrates how to create a broadcast campaign
 * and send it to multiple recipients.
 */

require('dotenv').config();
const axios = require('axios');

const API_KEY = process.env.API_KEY;
const BASE_URL = process.env.BASE_URL || 'https://api.instantkom.app';

async function createAndSendBroadcast() {
  try {
    // Step 1: Create broadcast
    const createResponse = await axios.post(
      `${BASE_URL}/v1/broadcasts`,
      {
        channelId: 123, // Your channel ID
        name: 'Summer Sale 2025',
        message: 'Check out our amazing summer sale! 50% off on selected items.',
        recipients: [
          '+49151234567890',
          '+49152345678901',
          '+49153456789012',
        ],
        // Optional: Schedule for later
        // scheduledAt: '2025-12-01T10:00:00Z',
      },
      {
        headers: {
          'Authorization': `Bearer ${API_KEY}`,
          'Content-Type': 'application/json',
        },
      }
    );

    console.log('Broadcast created successfully!');
    console.log('Broadcast ID:', createResponse.data.data.id);
    console.log('Status:', createResponse.data.data.status);
    console.log('Recipients:', createResponse.data.data.recipients?.length || 0);

    // Step 2: Send broadcast
    const broadcastId = createResponse.data.data.id;
    const sendResponse = await axios.post(
      `${BASE_URL}/v1/broadcasts/${broadcastId}/send`,
      {},
      {
        headers: {
          'Authorization': `Bearer ${API_KEY}`,
        },
      }
    );

    console.log('\nBroadcast sent successfully!');
    console.log(sendResponse.data);
  } catch (error) {
    if (error.response) {
      console.error('Error:', error.response.status);
      console.error(error.response.data);
    } else {
      console.error('Error:', error.message);
    }
  }
}

// Run the example
createAndSendBroadcast();
