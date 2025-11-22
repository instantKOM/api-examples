/**
 * instantKOM API Example: Send Message
 *
 * This example demonstrates how to send a 1:1 message
 * to a contact via WhatsApp, Telegram, or any other channel.
 */

require('dotenv').config();
const axios = require('axios');

const API_KEY = process.env.API_KEY;
const BASE_URL = process.env.BASE_URL || 'https://api.instantkom.app';

async function sendMessage() {
  try {
    const response = await axios.post(
      `${BASE_URL}/v1/messages`,
      {
        channelId: 123, // Your channel ID
        to: '+49151234567890', // Recipient phone number
        message: 'Hello from instantKOM API!',
      },
      {
        headers: {
          'Authorization': `Bearer ${API_KEY}`,
          'Content-Type': 'application/json',
        },
      }
    );

    console.log('Message sent successfully!');
    console.log('Message ID:', response.data.data.id);
    console.log(response.data);
  } catch (error) {
    if (error.response) {
      console.error('Error sending message:', error.response.status);
      console.error(error.response.data);
    } else {
      console.error('Error:', error.message);
    }
  }
}

// Run the example
sendMessage();
