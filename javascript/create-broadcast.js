/**
 * instantKOM API Example: Create and Send Broadcast
 *
 * Creates a broadcast campaign for all contacts in a channel (or a segment)
 * and sends it immediately.
 *
 * Broadcasts target contacts already stored in instantKOM, not raw phone numbers.
 * Use segmentId to restrict the audience to a specific contact segment.
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
        channelId: 505, // Your channel ID
        message: 'Check out our amazing summer sale! 50% off on selected items.',
        // Optional: restrict to a contact segment
        // segmentId: 123,
        // Optional: schedule for future send (Unix timestamp in seconds)
        // scheduledAt: 1735000000,
      },
      {
        headers: {
          'Authorization': `Bearer ${API_KEY}`,
          'Content-Type': 'application/json',
        },
      }
    );

    console.log('Broadcast created successfully!');
    console.log('Broadcast ID:', createResponse.data.id);
    console.log('Send status:', createResponse.data.sendStatus);

    // Step 2: Send broadcast
    const broadcastId = createResponse.data.id;
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
